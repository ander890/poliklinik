<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePoliRequest;
use App\Models\Poli;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->id){
            $selected = Poli::find($request->id)->toArray();
        }else{
            $selected = [];
        }

        $ret = [
            "poli" => Poli::get(),
            "selected" => $selected
        ];

        return view('page.admin.poli', $ret);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePoliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            $poli = Poli::find($request->id);
            toastr()->success("Edit poli sukses");
        }else{
            $poli = new Poli;
            toastr()->success("Tambah poli sukses");
        }

        $poli->nama_poli = $request->nama_poli;
        $poli->keterangan = $request->keterangan;

        $poli->save();

        return redirect('/admin/poli');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(Poli $poli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePoliRequest  $request
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatePoliRequest $request, Poli $poli)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poli = Poli::find($id);
        $poli->delete();

        toastr()->success("Hapus poli sukses");
        return redirect()->back();
    }
}
