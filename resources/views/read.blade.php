@extends('layouts.main')
@section('title')Книга@endsection
@section('content')
@include('include/header')
@foreach($datas as $data)
<div class="card" style="width: 100%;">
  <div class="card-header">{{ $data->title }}</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $data->text }}</li>
  </ul>
</div>
@endforeach
@endsection
