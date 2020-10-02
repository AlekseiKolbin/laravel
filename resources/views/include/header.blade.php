<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  @if(Auth::check())
  <h5 class="my-0 mr-md-auto font-weight-normal">Пользователь №: {{ Auth::user()->id }}</h5>
  @else
  <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
  @endif
  <nav class="my-2 my-md-0 mr-md-3">
    @if(Auth::check())
    <a class="p-2 text-dark" href="{{ route('profile', ['id' => Auth::user()->id]) }}">Мой профиль</a>
    <a class="p-2 text-dark" href="{{ route('mycomments') }}">Мои коментарии</a>
    <a class="p-2 text-dark" href="{{ route('profileBook', ['id' => Auth::user()->id]) }}">Библиотека</a>
    @endif
    <a class="p-2 text-dark" href="{{ route('main') }}">Пользователи</a>
  </nav>
  @if(Auth::check())
  <a class="btn btn-outline-primary" href="{{ route('signout') }}">Выйти</a>
  @else
  <a class="btn btn-outline-primary" href="{{ route('auth') }}">Войти</a>
  @endif
</div>
