@extends('layouts.layout')

@section('content')
    <div class="text-center">
        <div class="container">
            <form class="auth" method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

                <input type="text" name="name" id="inputName" class="form-control" placeholder="Ваше имя" required autofocus>

                <input type="email" name="email" id="inputEmail" class="form-control @error('name') is-invalid @enderror" placeholder="Электронная почта" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input type="password" name="password" id="inputPassword" class="form-control form-control @error('password') is-invalid @enderror" placeholder="Пароль" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input type="password" name="password_confirmation" id="password-confrm" class="form-control" placeholder="Введите пароль ещё раз" required>

                <button class="btn btn-lg btn-secondary btn-block" type="submit">Регистрация</button>
            </form>
        </div>
    </div>
@endsection