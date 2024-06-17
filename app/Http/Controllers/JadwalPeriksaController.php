<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalPeriksaRequest;
use App\Http\Requests\UpdateJadwalPeriksaRequest;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ret = [
            "jadwal" => JadwalPeriksa::where("id_dokter", $request->session()->get("id"))->get(),
        ];

        return view('page.dokter.jadwal_periksa', $ret);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('page.dokter.jadwal_periksa_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJadwalPeriksaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            $obat = JadwalPeriksa::find($request->id);
            toastr()->success("Edit jadwal periksa sukses");
        }else{
            $obat = new JadwalPeriksa;
            toastr()->success("Tambah jadwal periksa sukses");
        }

        $obat->id_dokter = $request->session()->get("id");
        $obat->hari = $request->hari;
        $obat->jam_mulai = $request->jam_mulai;
        $obat->jam_selesai = $request->jam_selesai;

        $obat->save();

        return redirect('/dokter/jadwal_periksa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalPeriksa $jadwalPeriksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $ret = [
            "selected" => JadwalPeriksa::find($request->id)
        ];

        return view('page.dokter.jadwal_periksa_add', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJadwalPeriksaRequest  $request
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJadwalPeriksaRequest $request, JadwalPeriksa $jadwalPeriksa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = JadwalPeriksa::find($id);
        $dokter->delete();

        toastr()->success("Hapus jadwal periksa sukses");
        return redirect()->back();
    }
}
