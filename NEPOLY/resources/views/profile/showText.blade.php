{{-- РЕДАКТИРОВАТЬ ГЛАВЫ --}}
@extends('styles')
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
@section('title')
Edit work
@endsection

<div class="container showText">
    @include('header')
    {{-- ВЕРХНЯЯ ЧАСТЬ --}}
    <div class="row showText_Bg">
        <div class="col-md-6 offset-md-3">
            <img src="{{ asset('img/red.png') }}" alt="">
        </div>
        <div class="col-md-8 showText_h3 offset-md-2">
            <h3 class="text-center allIndex">Редактирование работы</h3>
        </div>
    </div>
    @include('session')
    {{-- ФОРМА РЕДАКТИРОВАНИЯ --}}
    <form action="{{ route('update') }}" method="post" class="  showText__body">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <input type="text" placeholder="Название" name="par_title" value="{{$par->title}}" class="showText__title showBorder ">
            </div>

            <div class="col-md-3 showText__button  ">
                <button disabled class="work_{{$par->genresId->name}}">{{$par->genresId->name}}</button>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="his_id" value="{{$par->id}}">
                <input placeholder="Описание" type="text" value="{{$par->text}}" name="par_body"
                    class="col-md-12   showText__text  showBorder ">
            </div>

        </div>

        {{-- ГЛАВЫ РАБОТЫ --}}
        <div class="row showText__pars">
            <div class="col-md-12">
                <h3 class="history_one__h3">Содержание работы</h3>
            </div>
            <div class="col-md-5 showText__parTitle">
                <ul>

                    @if ($par->historyText->count() == 0)
                    На данный момент работа не содержит глав.
                    @endif

                    @foreach ($par->historyText as $text)

                    <li> <!--{{$text->id}}--> <a href="{{ route('editPar', ['ed_id'=>$text->history_id]) }}">
                            {{$text->history_title}} </a> </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="row showText__buttons">
            <div class="col-md-5"><button class="allButtons">Сохранить изменения</button></div>
            <div class="col-md-5">
                <button><a href="{{ route('addParT', ['id'=>$par->id]) }}" class="allButtons allButtons_a">Добавить новую главу</a></button>
                </div>
        </div>
    </form>

</div>

<div class="footer">
    @include('footer')
</div>
