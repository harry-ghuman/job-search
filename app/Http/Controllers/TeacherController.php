<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherRequest;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all()->sortBy('id');

        return View::make('teacher.index')->with('teachers', $teachers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $teacher = Teacher::findOrFail($teacher->id);

        return View::make('teacher.show')->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $teacher = Teacher::findOrFail($teacher)->first();

        return View::make('teacher.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher_name                   = User::find($teacher->user_id);
        $teacher_name->name             = Input::get('name');
        $teacher_name->save();

        $teacher                        = Teacher::find($teacher)->first();
        $teacher->job_title             = Input::get('job_title');
        $teacher->special_designation   = Input::get('special_designation');
        $teacher->department            = Input::get('department');
        $teacher->phone                 = Input::get('phone');
        $teacher->office_address        = Input::get('office_address');
        $teacher->save();

        return redirect('/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::find($teacher)->first()->delete();
        User::find($teacher->user_id)->delete();

        return redirect('/teacher');
    }
}
