@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $company->name }}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <p><strong>Company name: </strong>
                                    {{ $company->name }}
                                </p>
                                <p><strong>Email: </strong>
                                    {{ $company->email }}
                                </p>
                                <p><strong>Website: </strong>
                                    {{ $company->website }}
                                </p>
                                <p><strong>Manager: </strong>
                                    <a href="/admin/{{ $manager->id.'/'.$company->name.'/'.'edit' }}">
                                        {{ $company->manager->name }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <hr>
{{--                        Check if compant's employees collection is empty--}}
{{--                        @if ($company->users->isEmpty() != true)--}}

{{--                            <table class="table">--}}
{{--                                <caption>{{ $manager->name }}'s companies</caption>--}}
{{--                                <thead class="thead-dark">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">Company Name</th>--}}
{{--                                    <th scope="col">Contact Email</th>--}}
{{--                                    <th scope="col">Website</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}

{{--                                <tbody>--}}
{{--                                @foreach ($manager->companies as $company)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $company->name }}</td>--}}
{{--                                        <td>{{ $company->email }}</td>--}}
{{--                                        <td>{{ $company->website }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach()--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        <hr>--}}
{{--                        @endif--}}

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Admin Dashboard</a>
                        <a href="{{ route('admin.companies') }}" class="btn btn-primary">All companies</a>
                        <a href="" class="btn btn-danger">Delete Company</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
