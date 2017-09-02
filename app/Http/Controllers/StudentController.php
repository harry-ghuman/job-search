<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\JobApplication;
use App\Student;
use App\StudentEducation;
use App\StudentWorkExperience;
use App\StudentSkill;
use App\User;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Student::class);

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

        $this->authorize('show', $student);

        $student_education = $student->education;
        $student_work_experience = $student->workExperience;
        $student_skills = $student->skills;

        return view('student.show', compact('student','student_education','student_work_experience', 'student_skills'));
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
        $user    = User::find($student->user_id);


        $this->authorize('edit', [$student, $user]);

        $student_education = $student->education;
        $student_work_experience = $student->workExperience;
        $student_skills = $student->skills;

        return view('student.edit', compact('student','student_education','student_work_experience', 'student_skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
//    public function update(UpdateStudentRequest $request, Student $student)
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student_name               = User::find($student->user_id);

        $this->authorize('update', [$student, $student_name]);

        $student_name->name         = Input::get('name');
        $student_name->save();

        $student                    = Student::find($student)->first();
        $student->student_id        = Input::get('student_id');
        $student->semester          = Input::get('semester');
        $student->year              = Input::get('student_year');
        $student->phone             = Input::get('phone');
        $student->residency_status  = Input::get('residency_status');
        $student->country           = Input::get('student_country');
        $student->gender            = Input::get('gender');
        $student->save();

        $input = $request->all();

        StudentEducation::where('user_id','=', $student->user_id)->delete();
        if(isset($input['program'])){
            for($i=0; $i<count($input['program']); $i++) {
                StudentEducation::create([
                    'user_id'       => $student->user_id,
                    'program'       => $input['program'][$i],
                    'university'    => $input['university'][$i],
                    'gpa'           => $input['gpa'][$i],
                    'year'          => $input['year'][$i],
                    'country'       => $input['country'][$i],
                ]);
            }
        }

        StudentWorkExperience::where('user_id','=', $student->user_id)->delete();
        if(isset($input['job_title'])){
            for($i=0; $i<count($input['job_title']); $i++) {
                StudentWorkExperience::create([
                    'user_id'       => $student->user_id,
                    'job_title'     => $input['job_title'][$i],
                    'company'       => $input['company'][$i],
                    'duties'        => $input['duties'][$i],
                    'start_date'    => $input['start_date'][$i],
                    'end_date'      => $input['end_date'][$i],
                ]);
            }
        }

        StudentSkill::where('user_id','=', $student->user_id)->delete();
        if(isset($input['skill_name'])){
            for($i=0; $i<count($input['skill_name']); $i++) {
                StudentSkill::create([
                    'user_id'       => $student->user_id,
                    'skill_name'    => $input['skill_name'][$i],
                ]);
            }
        }

        return redirect('/student/'.$student->id.'#title');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $this->authorize('destroy', Student::class);

        StudentEducation::where('user_id','=', $student->user_id)->delete();
        StudentWorkExperience::where('user_id','=', $student->user_id)->delete();
        StudentSkill::where('user_id','=', $student->user_id)->delete();
        Student::find($student)->first()->delete();
        User::find($student->user_id)->delete();

        return redirect('/student');
    }

    public function applyJob($student_id, $job_id)
    {
        $this->authorize('applyJob', Student::class);

        $teacher_id = Job::where('id', $job_id)->first()->teacher_id;

        JobApplication::create([
            'job_id'        => $job_id,
            'teacher_id'    => $teacher_id,
            'student_id'    => $student_id,
            'status'        => 'applied',
        ]);

        return redirect('/job/'.$job_id);
    }
}
