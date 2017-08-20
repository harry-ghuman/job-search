<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all()->sortBy('id');

        return View::make('student.index')->with('students', $students);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student = Student::findOrFail($student->id);

        $student_education = $student->education;
        $student_work_experience = $student->workExperience;
        $student_skills = $student->skills;

        return view('student.show', compact('student','student_education','student_work_experience', 'student_skills'));
//        return View::make('student.show')->with('student', $student, 'student_education', $student_education);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $student = Student::findOrFail($student)->first();

        return View::make('student.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student_name               = User::find($student->user_id);
        $student_name->name         = Input::get('name');
        $student_name->save();

        $student                    = Student::find($student)->first();
        $student->student_id        = Input::get('student_id');
        $student->semester          = Input::get('semester');
        $student->year              = Input::get('year');
        $student->phone             = Input::get('phone');
        $student->residency_status  = Input::get('residency_status');
        $student->country           = Input::get('country');
        $student->gender            = Input::get('gender');
        $student->save();

        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::find($student)->first()->delete();
        User::find($student->user_id)->delete();

        return redirect('/student');
    }
}
