<?php

namespace App\Http\Controllers;

use App\Models\{
    Tagihan,
    Pembayaran,
    Pelanggan,
    Penggunaan,
    User
};
use Illuminate\Http\Request;
use Auth;
use Validator;
use Session;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //cek pelanggan
        $cekPel = Pelanggan::where('user_id', Auth::user()->id)->first();
        if ($cekPel) {
            //cek pengguanaan sebelumnya
            $cek = Penggunaan::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            if ($cek) {
                //jika sudah ada cek penggunaan bulan ini
                if ($cek->bulan == (int)date('m') && $cek->tahun == (int)date('Y')) {
                    $status = "sudah";
                    $data = "";
                    return view('user/tagihan/tagihan', [
                        'status' => $status,
                        'data' => $data
                    ]);
                }else{
                    //jika penggunaan bulan ini belum ada
                    if ($cek->bulan == date('m', strtotime('-1 month', time()))) {
                        $status = "belum";
                        $data = $cek->meter_akhir;
                        return view('user/tagihan/tagihan', [
                            'status' => $status,
                            'data' => $data
                        ]);
                    }
                    
                }
            } else {
                //penggunaan belum ada
                $status = "tidak ada";
                $data = '';
                return view('user/tagihan/tagihan', [
                    'status' => $status,
                    'data' => $data
                ]);
            }
        } else {
            //user tidak ditemukan
            $status = "No profil";
            $data = '';
            return view('user/tagihan/tagihan', [
                'status' => $status,
                'data' => $data
            ]);
        }
    }

    public function cek(Request $request)
    {
        //membutuhkan meteran awal dan akhir
        $rules = array(
            "meteran_awal"=>"required",
            "meteran_akhir"=>"required"
        );

        $cek = Validator::make($request->all(),$rules);
        Session::put('meteran_awal', $request->meteran_awal);
        Session::put('meteran_akhir', $request->meteran_akhir);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('cekTagihan')->with('warning',$errorString);
        }else{
            return redirect()->route('bayar');
        }
    }

    public function bayar()
    {
        //ambil data user yang ingin membayar
        $cek = Penggunaan::where('user_id', Auth::user()->id)->first();
        //jika bulan dan tahunnya sama dengan sekarang maka return sudah
        if ($cek) {
            if ($cek->bulan == date('m') && $cek->tahun == date('Y')) {
                $status = "sudah";
                $data = "";
                return view('user/tagihan/tagihan', [
                    'status' => $status,
                    'data' => $data
                ]);
            }
        }
        
        //jika meteran awal dan meteran akhir terinput
        if (Session::has('meteran_awal') && Session::has('meteran_akhir')) {
            //menetapkan harga dengan selisih meterah awal dengan meteran akhir * tarif daya
            $dataPel = Pelanggan::where('user_id', Auth::user()->id)->with('tarif')->first();
            $jumlah_meteran = Session::get('meteran_akhir') - Session::get('meteran_awal');
            $harga = $dataPel->tarif->tarifperkwh * $jumlah_meteran;
            Session::put('harga',$harga);
            Session::put('jumlah_meteran',$jumlah_meteran);
            $bulan = date('m');
            $tahun = date('Y');
            return view('user/tagihan/cekHarga', [
                'harga' => $harga,
                'bulan' => $bulan,
                'tahun' => $tahun
            ]);
        }
        else{
            return redirect()->route('dashboardUser');
        }
    }

    public function detailPembayaran()
    {
        $cek = Penggunaan::where('user_id', Auth::user()->id)->first();
        if ($cek) {
            if ($cek->bulan == date('m') && $cek->tahun == date('Y')) {
                $status = "sudah";
                $data = "";
                return view('user/tagihan/tagihan', [
                    'status' => $status,
                    'data' => $data
                ]);
            }
        }
        $data = Pelanggan::where('user_id', Auth::user()->id)->with('User')->with('tarif')->first();
        
        $pengguna = Penggunaan::create([
            'user_id' => Auth::user()->id,
            'bulan' => Date('m'),
            'tahun' => Date('Y'),
            'meter_awal' => Session::get('meteran_awal'),
            'meter_akhir' => Session::get('meteran_akhir')
        ]);

        if ($pengguna) {
            $tagihan = Tagihan::create([
                'penggunaan_id' => $pengguna->id,
                'user_id' => Auth::user()->id,
                'bulan' => Date('m'),
                'tahun' => Date('Y'),
                'jumlah_meter' => Session::get('jumlah_meteran')
            ]);

            if ($tagihan) {
                $totbar = Session::get('harga') + 2500;

                $bayar = Pembayaran::create([
                    'tagihan_id' => $tagihan->id,
                    'user_id' => Auth::user()->id,
                    'tanggal_pembayaran' => now(),
                    'bulan_bayar' => Date('m'),
                    'biaya_bayar' => Session::get('harga'),
                    'total_bayar' => $totbar
                ]);

                $awal = Session::get('meteran_awal');
                $akhir = Session::get('meteran_akhir');
                $hr = Session::get('harga');

                Session::forget('meteran_awal');
                Session::forget('meteran_akhir');
                Session::forget('harga');
                Session::forget('jumlah_meteran');

                return view('user/tagihan/inv', [
                    'noMeter' => $data->nomor_meteran,
                    'nama' => $data->user->name,
                    'daya' => $data->tarif->daya,
                    'blnThn' => Date('m') . " - " . Date('Y'),
                    'stdMeter' => $awal . " - " . $akhir,
                    'harga' => $hr,
                    'adm' => "2500",
                    'totbar' => $totbar
                ]);
            }
        }else{
            return redirect()->route('dashboardUser');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        //
    }
}
