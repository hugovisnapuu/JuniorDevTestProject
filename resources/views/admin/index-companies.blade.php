@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All companies</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company</th>
                                <th scope="col">Manager</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($companies as $company)
                                <tr>
                                    <td>
                                        <a href="/admin/{{ $company->manager->id }}/{{ $company->name }}">
                                            {{ $company->name }}
                                        </a>
                                    </td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->manager->name }}</td>
                                </tr>
                            @empty
                                <p class="alert-danger">
                                    At the moment there are no company managers
                                </p>
                            @endforelse

                            </tbody>
                        </table>

                        <hr>

                            <a href="{{ route('admin.dashboard') }}"
                                class="btn btn-primary">
                                Admin dashboard
                            </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
