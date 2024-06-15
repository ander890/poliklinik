<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\JadwalPeriksa;

class PasienController extends Controller
{
    public function JadwalDokter(Request $request){
        $jadwal = JadwalPeriksa::select("dokter.nama", "jadwal_periksa.*")->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")->where("dokter.id_poli", $request->id_poli)->where("jadwal_periksa.aktif", "Y")->get();

        return response()->json($jadwal);
    }

    public function loginPage(Request $request){
        return view("page.pasien.login");
    }

    public function loginPasien(Request $request){
        $pasien = Pasien::where("no_ktp", $request->no_ktp)->first();

        if(!$pasien){
            $pasien = new Pasien;

            $pasien->nama = $request->nama;
            $pasien->alamat = $request->alamat;
            $pasien->no_ktp = $request->no_ktp;
            $pasien->no_hp = $request->no_hp;
            $pasien->no_rm = date('Ym')."-".Pasien::count() + 1;

            $pasien->save();
        }

        return view("page.pasien.daftar", ["pasien" => $pasien, "poli" => Poli::get()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->id){
            $selected = Pasien::find($request->id)->toArray();
        }else{
            $selected = ["no_rm" => date("Ym")."-".Pasien::count() + 1];
        }

        $ret = [
            "pasien" => Pasien::get(),
            "selected" => $selected,
        ];

        return view('page.admin.pasien', $ret);
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
     * @param  \App\Http\Requests\StorePasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            $pasien = Pasien::find($request->id);
            toastr()->success("Edit pasien sukses");
        }else{
            $pasien = new Pasien;
            toastr()->success("Tambah pasien sukses");
        }

        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->no_ktp = $request->no_ktp;
        $pasien->no_hp = $request->no_hp;
        $pasien->no_rm = $request->no_rm;

        $pasien->save();

        return redirect('/admin/dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasienRequest  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatePasienRequest $request, Pasien $pasien)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        toastr()->success("Hapus pasien sukses");
        return redirect()->back();
    }
}
