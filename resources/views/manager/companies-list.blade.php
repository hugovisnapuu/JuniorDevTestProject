@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your companies</div>

                    <div class="card-body">

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Company name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Logo</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($managers->companies as $company)
                                <tr>
                                    <td><a href="/manager/{{ $managers->id }}/{{ $company->name }}">{{ $company->name }}</a></td>
                                    <td>{{ $company->email }}</td>
                                    <td><a href="#">{{ $company->website }}</a></td>
                                    <td>...</td>
                                </tr>
                            @empty
                                <p class="alert-danger">You do not have any companies registered</p>

                            @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
