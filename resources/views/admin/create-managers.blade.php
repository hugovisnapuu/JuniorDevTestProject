@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Company Manager</div>

                    <div class="card-body">

                        <form action="/admin/manager/store" method="post"
                              autocomplete="off">
                            <div class="form-group">
                                <label for="name">Manager name</label>
                                <input type="text" class="form-control"
                                       id="name"
                                       name="name"
                                       aria-describedby="nameHelp"
                                       placeholder="Enter Manager's Name">
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
                                       placeholder="Enter Manager's email">
                                <small class="alert-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="website">Manager's phone number</label>
                                <input type="text" class="form-control"
                                       id="number"
                                       name="number"
                                       aria-describedby="numberHelp"
                                       placeholder="Enter Manager's contact number">
                                <small class="alert-danger">
                                    @error('number')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control"
                                       id="password"
                                       name="password"
                                       aria-describedby="passwordHelp"
                                       placeholder="Password">
                                <small class="alert-danger">
                                    @error('password')
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
