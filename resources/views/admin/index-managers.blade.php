@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manager List</div>

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
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>

                        @forelse($managers as $manager)
                            <tr>
                                <td><a href="/admin/{{ $manager->id }}">
                                        {{ $manager->name }}
                                    </a>
                                </td>
                                <td>{{ $manager->number }}</td>
                                <td>{{ $manager->email }}</td>
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
