@extends('layouts.main')
@section('title')Создать книгу@endsection

@section('content')
@include('include/header')
<form method="POST" action="{{ route('book') }}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Название книги</label>
    <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" placeholder="Название книги">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Текст книги</label>
    <textarea name="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button><br>
  @if($errors->has('title')) <span class="help-block text-danger">{{ $errors->first('title') }}</span> @endif <br>
  @if($errors->has('text')) <span class="help-block text-danger">{{ $errors->first('text') }}</span> @endif
</form>
@endsection
