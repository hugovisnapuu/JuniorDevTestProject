@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">You are logged in to Manager Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/manager/{{ $managerId }}/company/add" class="btn btn-secondary">Add Company</a>
                            <a href="/manager/{{ $managerId }}/companies/list" class="btn btn-secondary">Your Companies</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
