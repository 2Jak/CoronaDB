<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalWorker;

class MedicalWorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicalWorker::all();
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
            'name' => 'require',
            'hospital_id' => 'require',
            'job_title' => 'require',
            'isolated' => 'require'
        ]);

        $medicalWorker = new MedicalWorker;
        $medicalWorker->name = $request.input('name');
        $medicalWorker->hospital_id = $request.input('hospital_id');
        $medicalWorker->job_title = $request.input('job_title');
        $medicalWorker->isolated = $request.input('isolated');
        $medicalWorker->save();
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
        return MedicalWorker::find($id);
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
        $this.validate($request, [
            'name' => 'require',
            'hospital_id' => 'require',
            'job_title' => 'require',
            'isolated' => 'require'
        ]);

        $medicalWorker = MedicalWorker::find($id);
        $medicalWorker->name = $request.input('name');
        $medicalWorker->hospital_id = $request.input('hospital_id');
        $medicalWorker->job_title = $request.input('job_title');
        $medicalWorker->isolated = $request.input('isolated');
        $medicalWorker->save();
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
        $medicalWorker = MedicalWorker::find($id);
        $medicalWorker->delete();
        return true;
    }
}
