@extends('layouts.main')
@section('title')Доверенные книги@endsection

@section('content')
@include('include/header')


  @foreach($books as $book)
  @foreach($trustbook as $trust)
  @if($trust->user_id == $book->profile_id)
      <div class="card" style="width: 18rem; float: left;">
        <div class="card-body">
          <h5 class="card-title">{{ $book->title }}</h5>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-primary" href="{{ route('trreadBook', ['id' => $book->id, 'userId' => $book->profile_id, 'user' => $trust->trusted_id]) }}">Прочесть книгу</a><br>
          </div>
        </div>
      </div>
@endif
@endforeach
@endforeach
@endsection
