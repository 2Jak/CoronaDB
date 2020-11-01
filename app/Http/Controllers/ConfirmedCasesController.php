<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfirmedCase;

class ConfirmedCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ConfirmedCase::all();
    }

    public function indexWithFilter($filter)
    {
        return ConfirmedCase::where($filter)->get();
    }

    public function orderedIndex($orderBy)
    {
        return ConfirmedCase::orderBy($orderBy)->get();
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
        $this->validate($request, [
            'severity' => 'required',
            'age' => 'required',
            'residance' => 'required',
            'recovering_at' => 'required'
        ]);

        $confirmedCase = new ConfirmedCase;
        $confirmedCase->severity = $request->input('severity');
        $confirmedCase->age = $request->input('age');
        $confirmedCase->male = $request->input('gender');
        $confirmedCase->residance = $request->input('residance');
        $confirmedCase->recovering_at = $request->input('recovering_at');
        $confirmedCase->save();
        return redirect('/confirmed_cases/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ConfirmedCase::find($id);
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
        $this->validate($request, [
            'severity' => 'required',
            'age' => 'required',
            'male' => 'required',
            'residance' => 'required',
            'recovering_at' => 'required'
        ]);

        $confirmedCase = ConfirmedCase::find($id);
        $confirmedCase->severity = $request->input('severity');
        $confirmedCase->age = $request->input('age');
        $confirmedCase->male = $request->input('male');
        $confirmedCase->residance = $request->input('residance');
        $confirmedCase->recovering_at = $request->input('recovering_at');
        $confirmedCase->save();
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
        $confirmedCase = ConfirmedCase::find($id);
        $confirmedCase->delete();
        return redirect('/confirmed_cases/admin');
    }
}
