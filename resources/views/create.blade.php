@extends('layouts.layout')

@section('content')
    <form class="form-request" method="POST" action="{{ route('tableapp.store') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="formGroupExampleInput">Тема</label>
            <input type="text" name="theme" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Сообщение</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Загрузите файл</label>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg btn-block">Добавить заявку</button>
    </form>
@endsection