@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add your company details</div>

                    <div class="card-body">

                        <form action="/manager/{{ $manager->id }}/company" method="post"
                              autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Company name</label>
                                <input type="text" class="form-control"
                                       id="name"
                                       name="name"
                                       aria-describedby="nameHelp"
                                       placeholder="Enter your company name"
                                       value="{{ old('name') }}">
                                <small class="alert-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control"
                                       id="email"
                                       name="email"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter your company email"
                                       value="{{ old('email') }}">
                                <small class="alert-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="website">Company website</label>
                                <input type="text" class="form-control"
                                       id="website"
                                       name="website"
                                       aria-describedby="websiteHelp"
                                       placeholder="Enter your company website"
                                       value="{{ old('website') }}">
                                <small class="alert-danger">
                                    @error('website')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="logo">Company logo</label>
                                <input type="file" class="form-control"
                                       id="logo"
                                       name="logo">
                                <small class="alert-danger">
                                    @error('logo')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            @csrf
                            <button class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
