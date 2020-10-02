@extends('layouts.main')
@section('title')Книга@endsection
@section('content')
@include('include/header')


@foreach($datas as $data)
<a class="btn btn-outline-primary" href="{{ route('change', ['id' => $data->id, 'userId' => $data->profile_id]) }}">Изменить</a><br>
<div class="card" style="width: 100%;">
  <div class="card-header">{{ $data->title }}</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $data->text }}</li>
  </ul>
</div>
@endforeach
@endsection
