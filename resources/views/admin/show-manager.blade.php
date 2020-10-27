@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div>

                    </div>
                    <div class="card-header">{{ $manager->name }}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <p><strong>Name: </strong>{{ $manager->name }}</p>
                                <p><strong>Email: </strong>{{ $manager->email }}</p>
                                <p><strong>Number: </strong>{{ $manager->number }}</p>
                            </div>
                        </div>

                        <hr>
                        @if ($manager->companies->isEmpty() != true)

                            <table class="table">
                                <caption>{{ $manager->name }}'s companies</caption>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Contact Email</th>
                                        <th scope="col">Website</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($manager->companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->website }}</td>
                                        </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                            <hr>
                        @endif



                        <a href="{{ route('admin.dashboard') }}"
                           class="btn btn-primary">
                            Admin Dashboard
                        </a>
                        <a href="{{ route('admin.managers') }}"
                           class="btn btn-primary">
                            All managers
                        </a>
                        <a href="/admin/{{ $manager->id }}/delete/attempt"
                           class="btn btn-danger">
                            Delete Company Manager
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
