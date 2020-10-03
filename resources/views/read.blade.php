@extends('layouts.main')
@section('title')Книга@endsection
@section('content')
@include('include/header')


@foreach($datas as $data)
@if($data->profile_id == Auth::user()->id)
<a class="btn btn-outline-primary" href="{{ route('change', ['id' => $data->id, 'userId' => $data->profile_id]) }}">Изменить</a><br>
<div class="form-group">
  <label for="exampleFormControlInput1">Ссылка для незарегистрированного пользователя(не забудте скопировать, прежде чем, поделится)</label>
  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="http://127.0.0.1:8000/library/book/{{ $hslink }}">
</div>
<a class="btn btn-outline-primary" href="{{ route('share', ['link' => $hslink]) }}">Поделиться книгой</a><br>
@endif
<div class="card" style="width: 100%;">
  <div class="card-header">{{ $data->title }}</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $data->text }}</li>
  </ul>
</div>
@endforeach
@endsection
