<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateDokterRequest;
use App\Models\Dokter;
use App\Models\Poli;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->id){
            $selected = Dokter::where('dokter.id', $request->id)->select("dokter.*", "poli.nama_poli")->join('poli', 'dokter.id_poli', '=', 'poli.id')->first()->toArray();
        }else{
            $selected = [];
        }

        $ret = [
            "dokter" => Dokter::select("dokter.*", "poli.nama_poli")->join('poli', 'dokter.id_poli', '=', 'poli.id')->get(),
            "poli" => Poli::get(),
            "selected" => $selected
        ];

        return view('page.admin.dokter', $ret);
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
     * @param  \App\Http\Requests\StoreDokterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            $dokter = Dokter::find($request->id);
            toastr()->success("Edit dokter sukses");
        }else{
            $dokter = new Dokter;
            toastr()->success("Tambah dokter sukses");
        }

        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->id_poli = $request->poli;

        $dokter->save();

        return redirect('/admin/dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDokterRequest  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDokterRequest $request, Dokter $dokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete();

        toastr()->success("Hapus dokter sukses");
        return redirect()->back();
    }
}
