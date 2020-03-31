@extends('layouts.layout')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{ $requestData->theme }}</h1>

                <!-- Author -->
                <p>
                    <b>Автор: </b>{{ $requestData->user->name }}  ||
                    <b>Email: </b>{{ $requestData->user->email }}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><b>Дата заявки:</b> {{ $requestData->created_at }}</p>
                <hr>

                <!-- Preview Image -->
                @if ($requestData->file_name !== null)
                <img class="img-fluid rounded" src="{{ asset('/storage/' . $requestData->file_name) }}" alt="">

                <hr>
                @endif

                <!-- Post Content -->
                <p class="lead">
                    {{ $requestData->message }}
                </p>
                <hr>

                <div class="card my-4">
                    <h5 class="card-header">Ответить на заявку</h5>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tableapp.response') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea name="response" class="form-control" rows="3"></textarea>
                                <input type="text" name="id" hidden value="{{ $requestData->id }}">
                            </div>
                            <button type="submit" class="btn btn-info">Отправить</button>
                        </form>
                    </div>
                </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection