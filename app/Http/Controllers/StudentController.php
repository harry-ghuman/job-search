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

        $students = Student::select('students.*')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->orderBy('users.name')
            ->get();

        return view('students.index', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $this->authorize('show', $student);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $this->authorize('edit', $student);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentRequest $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->authorize('update', $student);

        $student->fill($request->only($student->getFillable()));
        $student->user()->update(['name'=>$request->get('name')]);
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

        flash('Student information has been updated successfully.')->success()->important();

        return redirect(route('students.show'.$student->id));
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
        JobApplication::where('student_id','=', $student->id)->delete();
        Student::find($student)->first()->delete();
        User::find($student->user_id)->delete();

        flash('Student information has been deleted successfully.')->success()->important();

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

        flash('Successfully applied to job. Your application status has been updated.')->success()->important();

        return redirect('/job/'.$job_id);
    }
}
