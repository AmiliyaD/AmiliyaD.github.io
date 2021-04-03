@extends('styles')
@section('link')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('title')
    Login
@endsection
<div class="container">

    <div class="row login">
        <div class="col-md-12">
            <a href="{{ route('index') }}" class=""><- Домой</a>
        </div>
        <div class="col-md-6 offset-md-3 formAll">
            @if (Session::has('info'))
Вы не зарегстрированы
@else
 
@endif
            <div class="formAll_img">
                <img class="img-thumbnail" src="{{ asset('img/key.png') }}" alt="">
            </div>
            <h1 class="formAll_header text-center">Вход</h1>
            <div class="formAll_form">
                <form action="" method="post">
                    @csrf
                <input type="text" class="form-control inputAll" name="email" placeholder="Логин">
                <input type="text" class="form-control inputAll" name="password" placeholder="Пароль">
                <button class="btn btn-success buttonAll">Войти</button>
                </form>
                <a href="{{ route('register') }}" class="authA">Еще нет аккаунта? Зарегистрируйтесь</a>
            </div>
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
</div>
