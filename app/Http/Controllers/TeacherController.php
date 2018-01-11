<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherRequest;
use App\Teacher;
use App\User;

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

        // This makes sorting by 'name' column easier. Its more work from 'Teacher' model.
        $users = User::all()->sortBy('name')->filter(function ($user) {
            return $user->teacher;
        });

        return view('teachers.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param $teacherId
     * @return \Illuminate\Http\Response
     */
    public function show($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $this->authorize('show', $teacher);

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $teacherId
     * @return \Illuminate\Http\Response
     */
    public function edit($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $this->authorize('edit', $teacher);

        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTeacherRequest $request
     * @param Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->authorize('update', $teacher);

        $teacher->fill($request->only($teacher->getFillable()));
        $teacher->user()->update(['name'=>$request->get('name')]);
        $teacher->save();

        flash('Teacher information has been updated successfully.')->success()->important();

        return redirect(route('teachers.show', $teacher->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * Todo: Update front end to use Bootstrap Dialog and test this method
     *
     * @param $teacherId
     * @return \Illuminate\Http\Response
     */
    public function destroy($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $this->authorize('destroy', $teacher);

        $teacher->postedJobs()->delete();
        $teacher->user()->delete(); // Soft deleted

        flash('Teacher information has been deleted successfully.')->success()->important();

        return redirect(route('teachers.index'));
    }
}
