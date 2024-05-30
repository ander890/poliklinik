<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDaftarPoliRequest;
use App\Http\Requests\UpdateDaftarPoliRequest;
use App\Models\DaftarPoli;

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
    public function store(StoreDaftarPoliRequest $request)
    {
        //
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
