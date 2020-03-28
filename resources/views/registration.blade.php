@extends('layouts.layout')

@section('content')
    <div class="text-center">
        <div class="container">
            <form class="auth">
                <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
                <input type="text" name="name" id="inputName" class="form-control" placeholder="Ваше имя" required>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Электронная почта" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
                <button class="btn btn-lg btn-secondary btn-block" type="submit">Регистрация</button>
            </form>
        </div>
    </div>
@endsection