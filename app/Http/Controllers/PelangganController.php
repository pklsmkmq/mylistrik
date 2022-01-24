<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Pelanggan,
    User,
    Pembayaran,
    Tarif
};
use Auth;
use Validator;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::with('user')->with('tarif')->get();
        return view('admin/pelanggan', ["data" => $data]);
    }

    public function ds()
    {
        $cek = Pelanggan::where('user_id', Auth::user()->id)->first();
        if ($cek) {
            $data = true;
        } else {
            $data = false;
        }
        return view('user/isiDashboard', [
            'data' => $data
        ]);
    }

    public function profil()
    {
        $cek = Pelanggan::where('user_id', Auth::user()->id)->first();
        $daya = Tarif::get();
        if ($cek) {
            $data = $cek;
            $cek = true;
        } else {
            $cek = false;
            $data = null;
        }
        return view('user/profil/profil', [
            'cek' => $cek,
            'data' => $data,
            'daya' => $daya
        ]);
    }

    public function saveProfil(Request $request)
    {
        $rules = array(
            "alamat"=>"required",
            "nomor_meteran"=>"required",
            "tarif_id"=>"required"
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('profil')->with('warning',$errorString);
        }else{
            $cek = Pelanggan::where('user_id', Auth::user()->id)->first();
            if($cek){
                $cek->alamat = $request->alamat;
                $cek->nomor_meteran = $request->nomor_meteran;
                $cek->tarif_id = $request->tarif_id;
                $cek->user_id = Auth::user()->id;
                $resultPelanggan = $cek->save();
            }else{
                $pelanggan = new Pelanggan();
                $pelanggan->alamat = $request->alamat;
                $pelanggan->nomor_meteran = $request->nomor_meteran;
                $pelanggan->tarif_id = $request->tarif_id;
                $pelanggan->user_id = Auth::user()->id;
                $resultPelanggan = $pelanggan->save();
            }
            
            if ($resultPelanggan) {
                return redirect()->route('profil')->with('success',"Data Berhasil Tersimpan"); 
            }else{
                return redirect()->route('profil')->with('error',"Data Gagal Tersimpan");
            }
        }
    }

    public function dsAdmin()
    {
        $data1 = Pelanggan::count();
        $data2 = Pembayaran::count();

        return view('layout/dashboardV',[
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }
}
