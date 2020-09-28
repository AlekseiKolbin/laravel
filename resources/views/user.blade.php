@extends('layouts.main')
@section('title')Страница пользователя@endsection

@section('content')
@include('include/header')
<div class="user_profile_id">
  <div class="cardin">
    <div class="card-body">
      @if(Auth::user())
        @if(Auth::user()->id != $user->id)
          Пользователь №: {{$user->id}}
    </div>
  </div>
</div>
<div class="user_profile_mes_form">
  <form method="post" action="{{ route('reply', ['id' => $user->id])}}">
    @csrf
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Заголовок сообщения</label>
      <div class="col-sm-10">
        <input name="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="inputEmail3" placeholder="Заголовок сообщения">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Текст сообщения</label>
      <div class="col-sm-10">
        <input name="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" id="inputPassword3" placeholder="Текст сообщения">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
    </div>
    @if($errors->has('title')) <span class="help-block text-danger">{{ $errors->first('title') }}</span> @endif <br>
    @if($errors->has('message')) <span class="help-block text-danger">{{ $errors->first('message') }}</span> @endif
  </form>
</div>
  @else
    Моя страница
  @endif
@else
  Пользователь №: {{$user->id}}
@endif
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
@endsection
