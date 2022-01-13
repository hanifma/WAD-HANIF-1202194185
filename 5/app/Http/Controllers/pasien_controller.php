<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Vaksin;
use Illuminate\Http\Request;

class pasien_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();
        $vaksin = Vaksin::all();
        return view('patient', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaksin = Vaksin::all();
        return view('pick_vaccine', compact('vaksin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_ktp = time().'.'.$request->image_ktp->extension();
        $request->image_ktp->move(public_path('images/upload'), $image_ktp);

        $pasien = new Pasien();

        $pasien->vaccine_id = $request->vaccine_id;
        $pasien->name = $request->name;
        $pasien->nik = $request->nik;
        $pasien->alamat = $request->alamat;
        $pasien->image_ktp = $request->image_ktp;
        $pasien->no_hp = $request->no_hp;
        $pasien->save();

        return redirect('/pasien');
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaksin_id = Vaksin::find($id);
        return view('input_patient', compact('vaksin_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('edit_patient', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);

        $image_ktp = time().'.'.$request->image_ktp->extension();
        $request->image_ktp->move(public_path('images/upload'), $image_ktp);

        $pasien->vaccine_id = $request->vaccine_id;
        $pasien->name = $request->name;
        $pasien->nik = $request->nik;
        $pasien->alamat = $request->alamat;
        $pasien->image_ktp = $request->image_ktp;
        $pasien->no_hp = $request->no_hp;
        $pasien->save();

        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);

        $pasien->delete();

        return redirect('/pasien');
    }
}
