<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.joblists.joblists', [
            'jobs' => Job::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.joblists.create-job');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:jobs',
            'job_details' => 'required|max:255'
        ]);

        Job::create($validatedData);

        return redirect('/dashboard/jobs')->with('success', 'Job has been added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('dashboard.joblists.edit-job', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $rules = [
            'job_details' => 'required|max:255'
        ];

        if($request->input('title') != $job->title) {
            $rules['title'] = 'required|unique:jobs';
        };

        $validatedData = $request->validate($rules);

        try {
            $job->update($validatedData);

            return redirect()->route('jobs.index')
                ->with('success', 'Job has been Updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors('Failed to update employee data. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        Job::destroy($job->id);

        return redirect()->route('jobs.index')
                ->with('success', 'Selected Job has been deleted successfully.');
    }
}
