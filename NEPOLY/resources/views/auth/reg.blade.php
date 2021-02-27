@extends('styles')
@extends('styles')
@section('link')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('title')
    Registration
@endsection
<div class="container">
    <div class="row login">
        <div class="col-md-12">
            <a href="{{ route('index') }}" class=""><- Домой</a>
        </div>
    </div>
    <div class="row reg">
       <div class="col-md-6">
           <img class="img-thumbnail" src="{{ asset('img/door.png') }}" alt="">
       </div>
        <div class="col-md-6">
            <h1 class="text-center">Регистрация</h1>
            <form action="{{ route('regUser') }}" method="post">
                @csrf
                <input type="text" class="form-control  inputAll" name="login" placeholder="login">
                <input type="text" class="form-control  inputAll" name="name" placeholder="name">
            <input type="text" class="form-control inputAll" name="email" placeholder="email">
            <input type="text" class="form-control inputAll" name="password" placeholder="password">
            <input type="text" class="form-control inputAll" name="check_password" placeholder="check_password">
            <button class="buttonAll ">Зарегистрируйтесь</button>
            </form>
         <a href="{{ route('login') }}" class="authA text-center">Уже есть аккаунт? Войдите</a>
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