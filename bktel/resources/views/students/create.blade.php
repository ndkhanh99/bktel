@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                </div>
                <form class="login100-form validate-form" method="POST" action="{{ route('students.create') }}">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection