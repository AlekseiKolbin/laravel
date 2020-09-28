@extends('layouts.main')
@section('title')Мои коментарии@endsection

@section('content')
@include('include/header')
@if(!$datas->count())
  <h3>Нет коментариев</h3>
@else
  @foreach($datas as $data)
  <div class="card" style="width: -webkit-fill-available;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="{{ route('profile', ['id' => $data->user_id]) }}">Пользователь №: {{$data->user_id}}</a></li>
      <li class="list-group-item">Заголовок сообщения: {{ $data->title }}</li>
      <li class="list-group-item">Текст сообщения: {{ $data->message }}</li>
    </ul>
  </div><br>
  @endforeach
@endif
@endsection
