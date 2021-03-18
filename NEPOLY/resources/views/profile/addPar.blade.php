{{-- ДОБАВЛЕНИЕ НОВОЙ ГЛАВЫ --}}
@extends('styles')
<link rel="stylesheet" href="{{ asset('css/par.css') }}">

@section('title')
Добавление главы
@endsection
<div class="container">
    @include('header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class='text-center'>Добавление главы</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
                   {{-- form --}}
            <form action="{{ route('addParText') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$par->id}}" name="history_id">
                <input type="text" name='title' class="par-name par">
                <div class="w-100"></div>
                <textarea id="" cols="30" name="text" class="par-text par" rows="10"></textarea>
                <div class="w-100"></div>
                <button type="submit" class="par-btn">Готово</button>
                <button type="submit" class="par-btn">Назад</button>
            </form>
     
        </div>
    </div>

</div>

@include('footer')