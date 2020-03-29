@extends('layouts.layout')

@section('content')
    <div class="container">
        @guest
            <div class="welcome">
                <h1 align="center">Добро пожаловать на сайт заявок</h1>
            </div>
        @else
            <div class="welcome">
                <h1 align="center">Добро пожаловать {{ Auth::user()->name }} на сайт заявок</h1>
            </div>
        @endguest
    </div>

@endsection