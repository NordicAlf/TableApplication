@extends('layouts.layout')

@section('content')
    <div class="text-center">
        <div class="container">
            <form class="auth" method="POST" type="{{ route('login') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>

                <input type="email" name="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Электронная почта" required autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button class="btn btn-lg btn-secondary btn-block" type="submit">Вход</button>
            </form>
        </div>
    </div>
@endsection