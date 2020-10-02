@extends('layouts.main')
@section('title')Библиотека книг@endsection

@section('content')
@include('include/header')
<a class="btn btn-outline-primary" href="{{ route('book') }}">Создать книгу</a><br>
@foreach($datas as $data)
<div class="card" style="width: 18rem; float: left;">
  <div class="card-body">
    <h5 class="card-title">{{ $data->title }}</h5>
    <div class="btn-group" role="group" aria-label="Basic example">
      <a class="btn btn-primary" href="{{ route('readBook', ['id' => $data->id]) }}">Прочесть книгу</a><br>
      <form method="post" action="{{ route('deleteBook') }}">
        @csrf
        <input type="number" class="d-none" name="bookId" id="{{ $data->id }}" value="{{ $data->id }}">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Удалить книгу</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection
