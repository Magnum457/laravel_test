<?php

namespace App\Http\Controllers;

use App\Models\School as School;
use App\Models\Course as Course;
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

        $course = Course::findOrFail($request->input('course_id'));

        if ($student->save()) {
            if ($course) {
                $student->courses()->attach($course);
            }

            return new StudentResource($student);
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
        if ($student) {
            return new StudentResource($student);
        }
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
        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->telephone = $request->input('telephone');
        $student->email = $request->input('email');
        $student->birth_date = $request->input('birth_date');
        $student->gender = $request->input('gender');

        if ($student->save()) {
            return new StudentResource($student);
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
