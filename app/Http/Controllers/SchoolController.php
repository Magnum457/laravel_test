<?php

namespace App\Http\Controllers;

use App\Models\School as School;
use App\Http\Resources\School as SchoolResource;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::paginate(15);
        return SchoolResource::collection($schools);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School;
        $school->name = $request->input('name');
        $school->address = $request->input('address');

        if ($school->save()) {
            return new SchoolResource($school);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);
        return new SchoolResource($school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $school = School::findOrFail($request->id);
        $school->name = $request->input('name');
        $school->address = $request->input('address');

        if ($school->save()) {
            return new SchoolResource($school);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);

        if ($school->delete()) {
            return new SchoolResource($school);
        }
    }
}
