@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Add New Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Employees</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card col-lg-8">
        <div class="card-body">
            <h5 class="card-title">Form To Add New Employee</h5>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" action="/dashboard/employees" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="floatingNik"
                            placeholder="Number ID" name="nik" value="{{ old('nik') }}" required>
                        <label for="floatingNik">NIK</label>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName"
                            placeholder="Real Name" name="name" value="{{ old('name') }}" required>
                        <label for="floatingName">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-floating">
                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                            id="floatingDate" name="birth_date" value="{{ old('birth_date') }}">
                        <label for="floatingDate">Birth Date</label>
                        @error('birth_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select @error('gender') is-invalid @enderror" id="floatingGender"
                            aria-label="Role" name="gender">
                            <option selected>Choose</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <label for="floatingGender">Gender</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail"
                            placeholder="User Email" name="email" value="{{ old('email') }}" required>
                        <label for="floatingEmail">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="floatingPhone"
                            placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                        <label for="floatingPhone">Phone Number</label>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                id="floatingAddress" placeholder="Address" name="address" value="{{ old('address') }}"
                                required>
                            <label for="floatingAddress">Address</label>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="jobTitle" name="job_id">
                            @foreach ($jobs as $job)
                                @if (old('job_id') == $job->id)
                                    <option value="{{ $job->id }}" selected>{{ $job->title }}</option>
                                @else
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">Job Title</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <label for="photo">Photos</label>
                        </div>
                        <div class="col-md-11">
                            <img class="img-preview img-fluid mb-2 col-sm-3">
                            <input type="file" name="photo"
                                class="form-control @error('photo') is-invalid @enderror" id="photo"
                                placeholder="Photo" onchange="previewImage()">
                        </div>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <a href="/dashboard/employees" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
