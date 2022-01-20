<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;
use Validator;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tarif::get();
        return view('admin/tarif/tarif',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tarif/addTarif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            "daya"=>"required",
            "tarif"=>"required"
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('addTarif')->with('warning',$errorString);
        }else{
            $dataTarif = new Tarif;
            $dataTarif->daya = $request->daya;
            $dataTarif->tarifperkwh = $request->tarif;
            $resultTarif = $dataTarif->save();
            if ($resultTarif) {
                return redirect()->route('tarif')->with('success',"Data Berhasil Tersimpan"); 
            }else{
                return redirect()->route('tarif')->with('error',"Data Gagal Tersimpan");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = tarif::where('id',$id)->first();
        if ($data) {
            return view('admin/tarif/editTarif',[
                'data'=>$data
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarif $tarif)
    {
        // Edit 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            "daya"=>"required",
            "tarif"=>"required"
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('editTarif')->with('warning',$errorString);
        }else{
            $dataTarif = Tarif::where('id',$id)->first();
            if (!$dataTarif) {
                return redirect()->route('tarif')->with('error',"Data Tidak Ditemukan");
            } else {
                $dataTarif->daya = $request->daya;
                $dataTarif->tarifperkwh = $request->tarif;
                $resultTarif = $dataTarif->save();

                if ($resultTarif) {
                    return redirect()->route('tarif')->with('success',"Data Berhasil Terubah"); 
                }else{
                    return redirect()->route('tarif')->with('error',"Data Gagal Terubah");
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tarif::where('id',$id)->first();
        
        if($data){
            if($data->delete()){
                return redirect()->route('tarif')->with('success',"Berhasil Menghapus Data");
            }else{
                return redirect()->route('tarif')->with('error',"Gagal Menghapus Data");
            }
        }else{
            return abort(404);
        }
    }
}
