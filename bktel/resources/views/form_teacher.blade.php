@extends('layouts.app')

@section('content')
<template>

<form_teacher-component></form_teacher-component>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</template>
@endsection