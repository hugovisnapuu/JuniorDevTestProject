@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">You are logged in to Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.managers') }}" class="btn btn-secondary">View All Managers</a>
                            <a href="{{ route('admin.companies') }}" class="btn btn-secondary">View All Companies</a>
                        </div>

                            <hr>

                        <div>
                            <a href="{{ route('admin.add.manager') }}" class="btn btn-primary">Add New Manager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
