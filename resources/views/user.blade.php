@extends('layouts.main')
@section('title')Страница пользователя@endsection

@section('content')
@include('include/header')
<div class="user_profile_id">
  <div class="cardin">
    <div class="card-body">
      This is some text within a card body.
    </div>
  </div>
</div>
<div class="user_profile_mes_form">
  <form method="post">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Заголовок сообщения</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Заголовок сообщения">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Текст сообщения</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" placeholder="Текст сообщения">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
    </div>
  </form>
</div>
<div>
  <div class="card" style="width: -webkit-fill-available; margin: 0px;">
  <div class="card-header">
    Quote
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    </blockquote>
  </div>
</div>
</div>
@endsection
