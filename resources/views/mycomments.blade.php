@extends('layouts.main')
@section('title')Мои коментарии@endsection

@section('content')
@include('include/header')
@if(!$datas->count())
  <h3>Нет коментариев</h3>
@else
  @foreach($datas as $data)

  <div>
    <div class="card" style="width: -webkit-fill-available; margin: 0px;">
    <div class="card-header">
      {{ $data->title }}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>{{ $data->message }}</p>
      </blockquote>
    </div>
  </div>
</div>
  @endforeach
@endif
@endsection
