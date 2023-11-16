@extends('layouts.app')

@section('content')
<template>
<div class="logout-button">
 <button>

        <a href="{{ route('logout') }}" style="font-size: 20px; color: aliceblue;" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" >Logout</a>
        </button> 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          @csrf
      </form>

  
</div>

<form_student-component></form_student-component>

</template>
@endsection