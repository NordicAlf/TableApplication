@extends('layouts.layout')

@section('content')
    <div class="text-center">
        <div class="container">
            <form class="auth">
                <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
                <input type="email" id="inputEmail" class="form-control" placeholder="Электронная почта" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
                <button class="btn btn-lg btn-secondary btn-block" type="submit">Вход</button>
            </form>
        </div>
    </div>
@endsection