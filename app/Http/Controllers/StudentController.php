<?php

namespace App\Http\Controllers;

use App\Models\Student as Student;
use App\Http\Resources\Student as StudentResource;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(15);
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->telephone = $request->input('telephone');
        $student->email = $request->input('email');
        $student->birth_date = $request->input('birth_date');
        $student->gender = $request->input('gender');

        if ($student->save()) {
            return new ArtigoResource($student);
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
        $student = Student::findOrFail($id);
        return new StudentResource($student);
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
        $student = Student::findOrFail($request->id);
        $student->name = $request->input('name');
        $student->telephone = $request->input('telephone');
        $student->email = $request->input('email');
        $student->birth_date = $request->input('birth_date');
        $student->gender = $request->input('gender');

        if ($student->save()) {
            return new ArtigoResource($student);
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
        $student = Student::findOrFail($id);

        if ($student->delete()) {
            return new StudentResource($student);
        }
    }
}
