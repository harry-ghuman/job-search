<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherRequest;
use App\Teacher;
use App\User;
use App\Job;
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
        $this->authorize('index', Teacher::class);

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

        $this->authorize('show', $teacher);

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

        $this->authorize('edit', $teacher);

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
        $this->authorize('update', $teacher);

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

        flash('Teacher information has been updated successfully.')->success()->important();

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
        $this->authorize('destroy', $teacher);

        Job::where('teacher_id','=', $teacher->id)->delete();
        Teacher::find($teacher)->first()->delete();
        User::find($teacher->user_id)->delete();

        flash('Teacher information has been deleted successfully.')->success()->important();

        return redirect('/teacher');
    }
}
