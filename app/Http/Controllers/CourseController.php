<?php

namespace App\Http\Controllers;

use App\Models\Course as Course;
use App\Http\Resources\Course as CourseResouce;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(15);
        return CourseResouce::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course;
        $course->year = $request->input('year');
        $course->series = $request->input('series');
        $course->level = $request->input('level');
        $course->shift = $request->input('shift');

        if ($course->save()) {
            return new CourseResource($course);
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
        $course = Course::findOrFail($id);
        return new CourseResouce($course);
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
        $course = Course::findOrFail($request->id);
        $course->year = $request->input('year');
        $course->series = $request->input('series');
        $course->level = $request->input('level');
        $course->shift = $request->input('shift');

        if ($course->save()) {
            return new CourseResource($course);
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
        $course = Course::findOrFail($id);

        if ($course->delete()) {
            return new CourseResource($course);
        }
    }
}
