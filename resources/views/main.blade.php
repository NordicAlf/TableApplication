@extends('layouts.layout')

@section('content')
    <div class="container">
        @guest
            <div class="welcome">
                <h1 align="center">Добро пожаловать на сайт заявок</h1>
            </div>
        @else
            <div class="table-app">
                <!-- Добавление заявки для юзера -->
                @if (Auth::user()->role === 'user')
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
                        @if(session('danger'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{ session()->get('danger') }}
                            </div>
                    @endif
                        <a href="{{ route('tableapp.create') }}" type="button" class="btn btn-outline-secondary">Добавить заявку</a>
                </div>
                @endif
                <!-- конец -->

                <!-- Админская часть -->
                @if (Auth::user()->role === 'admin')
                    <h3 align="center">Заявки пользователей</h3>
                @endif
                <!-- Конец -->

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" width="150px">Тема</th>
                        <th scope="col">Сообщение</th>
                        <th scope="col" width="200px">Ответ</th>
                        <th scope="col" width="50px">Статус</th>

                        @if (Auth::user()->role === 'user')
                            <th scope="col" width="50px">Закрыть</th>
                        @else
                        <th scope="col" width="50px">Ответить</th>
                        @endif

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($userRequests as $request)
                    <tr>
                        <th scope="row">{{ $request->theme }}</th>
                        <td>{{ $request->message }}</td>
                        <td>
                            @if($request->response)
                                {{ $request->response }}
                            @endif
                        </td>
                        <td>{{ $request->status }}</td>
                        <td align="center">
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('tableapp.answer', $request->id) }}" class="btn btn-outline-info btn-sm">x</a>
                            @else
                                <form action="{{ route('tableapp.close', $request->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="sumbit" class="btn btn-outline-danger btn-sm">x</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endguest
    </div>

@endsection