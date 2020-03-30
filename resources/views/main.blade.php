@extends('layouts.layout')

@section('content')
    <div class="container">
        @guest
            <div class="welcome">
                <h1 align="center">Добро пожаловать на сайт заявок</h1>
            </div>
        @else
            <div class="table-app">
                <h3 align="center">Ваши заявки</h3>

                <div class="actions">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <a href="{{ route('tableapp.create') }}" type="button" class="btn btn-outline-secondary">Добавить заявку</a>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" width="150px">Тема</th>
                        <th scope="col">Сообщение</th>
                        <th scope="col" width="50px">Статус</th>
                        <th scope="col" width="50px">Закрыть</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Помогите</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td align="center">
                            <button type="button" class="btn btn-outline-danger btn-sm">x</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Помогите</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td align="center">
                            <button type="button" class="btn btn-outline-danger btn-sm">x</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @endguest
    </div>

@endsection