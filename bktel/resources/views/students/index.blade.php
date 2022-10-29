@extends('layouts.app')
@section('title', 'All Students')
@section('content')
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                </div>
                <form class="login100-form validate-form" method="GET" action="{{ route('students.index') }}">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection