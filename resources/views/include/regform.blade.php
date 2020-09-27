<body class="text-center">
<form class="form-signin" method="POST" action="{{ route('reg') }}" novalidate>
  @csrf
  <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
  <label for="email" class="sr-only">Email address</label>
  <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Почта">
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Пароль">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
  <a href="{{ route('main') }}">На главную</a>
  @if($errors->has('email')) <span class="help-block text-danger">{{ $errors->first('email') }}</span> @endif <br>
  @if($errors->has('password')) <span class="help-block text-danger">{{ $errors->first('password') }}</span> @endif
</form>
</body>
