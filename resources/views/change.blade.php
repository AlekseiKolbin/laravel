@extends('layouts.main')
@section('title')Изменить@endsection
@section('content')
@include('include/header')
@foreach($datas as $data)
<form method="POST" action="{{ route('change', ['id' => $data->id, 'userId' => $data->profile_id]) }}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Название книги</label>
    <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" value="{{ $data->title }}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Текст книги</label>
    <textarea name="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3">{{ $data->text }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button><br>
  @if($errors->has('title')) <span class="help-block text-danger">{{ $errors->first('title') }}</span> @endif <br>
  @if($errors->has('text')) <span class="help-block text-danger">{{ $errors->first('text') }}</span> @endif
</form>
@endforeach
@endsection
