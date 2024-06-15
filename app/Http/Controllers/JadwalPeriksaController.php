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
            $jadwal = JadwalPeriksa::find($request->id);
            toastr()->success("Edit jadwal periksa sukses");
        }else{
            $jadwal = new JadwalPeriksa;

            toastr()->success("Tambah jadwal periksa sukses");
        }

        if(JadwalPeriksa::where("id_dokter", $request->session()->get("id"))->where("aktif", "Y")->first() && $request->aktif == "Y"){
            JadwalPeriksa::where("id_dokter", $request->session()->get("id"))->update(["aktif" => "T"]);
        }

        $jadwal->id_dokter = $request->session()->get("id");
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->aktif = $request->aktif;
        $jadwal->save();

        return redirect('/dokter/jadwal_periksa');
        // return redirect()->back();

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
    // public function update(UpdateJadwalPeriksaRequest $request, JadwalPeriksa $jadwalPeriksa)
    // {
    //     //
    // }

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
