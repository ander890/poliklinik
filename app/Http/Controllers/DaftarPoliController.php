<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDaftarPoliRequest;
use App\Http\Requests\UpdateDaftarPoliRequest;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use App\Models\Pasien;

use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDaftarPoliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dps = DaftarPoli::whereDate("created_at", date("Y-m-d"))->where("id_jadwal", $request->jadwal)->count();

        $dp = new DaftarPoli;
        $dp->id_pasien = $request->id;
        $dp->id_jadwal = $request->jadwal;
        $dp->keluhan = $request->keluhan;
        $dp->no_antrian = $dps+1;
        $dp->save();

        return view("page.pasien.sukses", [
            "keluhan" => $request->keluhan, 
            "p" => Pasien::find($request->id),
            "dp" => $dp, 
            "jadwal" => JadwalPeriksa::select("dokter.nama", "jadwal_periksa.*")->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")->where("jadwal_periksa.id", $request->jadwal)->first(),
            "poli" => Poli::find($request->poli)
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarPoli  $daftarPoli
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarPoli $daftarPoli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarPoli  $daftarPoli
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarPoli $daftarPoli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaftarPoliRequest  $request
     * @param  \App\Models\DaftarPoli  $daftarPoli
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDaftarPoliRequest $request, DaftarPoli $daftarPoli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarPoli  $daftarPoli
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarPoli $daftarPoli)
    {
        //
    }
}
