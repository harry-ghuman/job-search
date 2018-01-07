<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\JobApplication;
use App\Student;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Job::class);

        $jobs = Job::all()->sortBy('id');

        return View::make('job.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Job::class);

        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJobRequest $request)
    {
        $this->authorize('store', Job::class);

        Job::create(request(['teacher_id', 'job_title','description','credits','responsibilities','requirements']));

        flash('Job has been created successfully.')->success()->important();

        if(Auth::user()->hasRole('teacher')){
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->value('id');
            return redirect(route('job.viewPostedJobs', $teacher_id));
        }
        else{
            return redirect(route('jobs.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $job = Job::findOrFail($job->id);

        $this->authorize('show', $job);

        if(Auth::user()->hasRole('student')){
            $student_id = Student::where('user_id', Auth::user()->id)->value('id');
            $job_application = JobApplication::where('student_id', $student_id)->where('teacher_id', $job->teacher_id)->first();

            if(isset($job_application)){
                return view('job.show', ['job' => $job, 'application_status' => $job_application->status]);
            }
        }

        return view('job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $job = Job::findOrFail($job)->first();

        $this->authorize('edit', $job);

        return View::make('job.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $job                    = Job::find($job)->first();

        $this->authorize('update', $job);

        $job->job_title         = Input::get('job_title');
        $job->description       = Input::get('description');
        $job->credits           = Input::get('credits');
        $job->responsibilities  = Input::get('responsibilities');
        $job->requirements      = Input::get('requirements');
        $job->save();

        flash('Job information has been updated successfully.')->success()->important();

        if(Auth::user()->hasRole('teacher')){
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->value('id');
            return redirect(route('job.viewPostedJobs', $teacher_id));
        }
        else{
            return redirect(route('jobs.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $this->authorize('destroy', $job);

        Job::find($job->id)->delete();

        flash('Job information has been deleted successfully.')->success()->important();

        if(Auth::user()->hasRole('teacher')){
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->value('id');
            return redirect(route('job.viewPostedJobs', $teacher_id));
        }
        else{
            return redirect(route('jobs.index'));
        }
    }

    public function jobsPostedByTeacher($id)
    {
        $this->authorize('index', Job::class);

        $jobs = Job::where('teacher_id', $id)->get();

        return View::make('job.index')->with('jobs', $jobs);
    }

    public function viewJobApplications($job_id)
    {
        $this->authorize('viewJobApplications', Job::class);

        $job_applications = JobApplication::where('teacher_id', $job_id)->get()->map(function($item, $key){
            return $item->student_id;
        })->toArray();
        $student_ids = array_values($job_applications);

        $students = Student::whereIn('id', $student_ids)->get()->sortBy('id');

        return view('student.index', compact('students', 'job_id'));
    }

    public function updateJobApplicationStatus($student_id, $job_id, $status)
    {
        $job_application = JobApplication::where('job_id', $job_id)->where('student_id', $student_id)->first();

        $job_application->status    = ($status == 1)? 'accepted': 'rejected';
        $job_application->save();

        flash('Job application status has been updated successfully.')->success()->important();

        return redirect(route('jobs.viewJobApplications', $job_id));
    }
}
