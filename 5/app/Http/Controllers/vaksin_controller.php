<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaksin;

class vaksin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaksin = Vaksin::all();
        return view('vaccine', compact('vaksin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('input_vaccine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/upload'), $image);

        $Vaksin = new Vaksin();
        $Vaksin->name = $request->name;
        $Vaksin->price = $request->price;
        $Vaksin->description = $request->description;
        $Vaksin->image = $image;
        $Vaksin->save();

        return redirect('/vaksin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaksin = Vaksin::find($id);
        return view('edit_vaccine', compact('vaksin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vaksin = Vaksin::find($id);

        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/upload'), $image);


        $vaksin->name = $request->name;
        $vaksin->price = $request->price;
        $vaksin->description = $request->description;
        $vaksin->image = $image;
        $vaksin->save();

        return redirect('/vaksin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaksin = Vaksin::find($id);

        $vaksin->delete();

        return redirect('/vaksin');
    }
}
