@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Create New Job</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Job List</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card col-lg-8">
        <div class="card-body">
            <h5 class="card-title">Form To Create New Job Title</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" action="/dashboard/jobs">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="floatingJobtitle" placeholder="title of Jobs" name="title" value="{{ old('title') }}"
                            required>
                        <label for="floatingJobtitle">Job title</label>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('job_details') is-invalid @enderror"
                            id="floatingDetails" placeholder="Job Details" name="job_details" required>
                        <label for="floatingDetails">Job Details</label>
                        @error('job_details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <a href="/dashboard/jobs" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
