<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hospital::all();
    }

    public function orderedIndex($orderBy)
    {
        return Hospital::orderBy($orderBy)->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this.validate($request, [
            'name' => 'required'
        ]);

        $hospital = new Hospital;
        $hospital->name = $request.input('name');
        $hospital->occupancy = $request.input('occupancy');
        $hospital->corona_occupancy = $request.input('corona_occupancy');
        $hospital->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Hospital::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        this.validate($request, [
            'name' => 'required'
        ]);

        $hospital = Hospital::find($id);
        $hospital->name = $request.input('name');
        $hospital->occupancy = $request.input('occupancy');
        $hospital->corona_occupancy = $request.input('corona_occupancy');
        $hospital->save();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();
        return true;
    }
}
