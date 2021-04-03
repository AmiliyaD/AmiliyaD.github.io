@extends('styles')
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
<link rel="stylesheet" href="{{ asset('css/adminProfile.css') }}">
@section('title')
Profile
@endsection

{{-- ПРОФИЛЬ АДМИНИСТРАТОРА --}}
<div class="container">
    @include('header')
    <div class="row justify-content-center">

        <div class="col-md-6 profile">
            <img class="img-thumbnail" src="{{ asset('img/adminProfile.png') }}" alt="">
            <h1 class="text-center showText_Bg">{{Auth::user()->name}} {{Auth::user()->surname}}</h1>

        </div>

    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" text-center">
                <button class="logout-button work_genre text-center">Выйти</button>
                @csrf
            </form>
        </div>
    </div>
@include('session')
    {{-- Жанры для добавления --}}
    <form class="adminGenres row form-class" action="{{ route('addGenre') }}" method="POST">
        @csrf
        <div class="col-md-12">
            <h1>Жанры</h1>
        </div>
      
        <div class="col-md-5">
            <label for="">Название жанра</label>
            <input type="text" name="name" class='adminText pl-3' placeholder="Название жанра">
        </div>
        <div class="col-md-3">
            <label for="">Цвет ярлыка</label>
            <input type="color" name="colorBack" class='adminText' placeholder="Цвет ярлыка">
        </div>
        <div class="col-md-3">
            <label for="">Цвет надписи</label>
            <input type="color" class='adminText' name="colorText"  placeholder="Цвет надписи">
        </div>
        <div class="col-md-4">
            <button class='adminButton adminButton-add'>Добавить новый жанр</button>
        </div>
    </form>


{{-- Жанры для удаления --}}
    <form class="row del-genre" method="POST" action="{{ route('deleteGenre') }}">
     @csrf
        @foreach ($genre as $genreName)
   
 

        @if (!empty($genreName->colorBack))
        

            <div class="col-md-3 del-genre_header ">
                <div class="checkbox">
                    <input type="checkbox" name="checkedGenres[]" class="adminCheck" value="{{$genreName->id}}">
                </div>
             
                <div id="{{$genreName->name}}"
                    class=" float-right work_genre work_{{$genreName->name}} "  style="background-color: {{$genreName->colorBack}};
                     color: {{$genreName->colorText}}; border: none">{{$genreName->name}}</div>
              
            </div>
        @else

        <div class="col-md-3 del-genre_header ">
            <div class="checkbox">
                <input type="checkbox" name="checkedGenres[]" class="adminCheck" value="{{$genreName->id}}">
            </div>
         
            <div class="genreName work_genre work_{{$genreName->name}}">
                {{$genreName->name}}
            </div>
          
        </div>
        @endif
        @endforeach
   
        <div class="col-md-12 del-genre_footer">
            <button value="" class='adminButton adminButton-del'>Удалить выбранные жанры</button>
        </div>
    </form>
</div>
@include('footer')