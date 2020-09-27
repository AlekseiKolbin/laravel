@extends('layouts.main')
@section('title')Список пользователей@endsection

@section('content')
@include('include/header')
<div class="content_users_card">
  <div class="row"></div>
  @foreach($users as $user)
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Пользователь №: {{$user->id}}</h5>
    <a href="#" class="btn btn-primary">Профиль</a>
  </div>
</div>
  @endforeach
</div>
@endsection
