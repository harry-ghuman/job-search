<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherRequest;
use App\Teacher;

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

        $teachers = Teacher::select('teachers.*')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->orderBy('users.name')
            ->get();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Display the specified resource.
     *
     * @param Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $this->authorize('show', $teacher);

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
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
        $teacher->teacherInfo()->update(['name'=>$request->get('name')]);
        $teacher->save();

        flash('Teacher information has been updated successfully.')->success()->important();

        return redirect(route('teachers.show', $teacher->id));
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

        $teacher->postedJobs()->delete();
        $teacher->teacherInfo()->delete(); // Soft deleted

        flash('Teacher information has been deleted successfully.')->success()->important();

        return redirect(route('teachers.index'));
    }
}
