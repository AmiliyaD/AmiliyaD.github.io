@extends('styles')
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/par.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
@section('title')
Edit paragrah
@endsection


<div class="container editPar">
    @include('header')
    <div class="row editPar_row showText_Bg">




        <div class="col-md-12 editPar_h1">
            <h1 class="text-center">Редактирование главы</h1>
        </div>


    </div>
    <div class="row">



        <form action="{{ route('updatePar') }}"  method="POST">
            @csrf
              <input type="hidden" name="his_id" id="" value="{{$edit->history_id}}">
                <input type="hidden" name="history_id" value="{{$edit->id}}">

            <input type="text" placeholder="Название" name='title' value="{{$edit->history_title}}" class="par-name par">
            <div class="w-100"></div>
            <textarea id="" placeholder="Текст"  value="" cols="30" name="text" class="par-text par" rows="10">{{$edit->history_text}}</textarea>
            <div class="w-100"></div>
            <button type="submit" class="par-btn">Готово</button>
            <button type="submit" class="par-btn">Назад</button>
        </form>

        <form method="POST" action="{{ route('destroyOnePar') }}" class="col-md-2 editPar__title" action="">
            @csrf
            <input type="hidden" name="history" id="" value="{{$edit->history_id}}">
            <input type="hidden" name="his_id" id="" value="{{$edit->id}}">
            <button class="allButtons showText__buttons par-btn">Удалить главу</button>

        </form>

        {{-- <form class="col-md-12 editPar__title" action="{{ route('updatePar') }}" method="POST">
            @csrf
            <div class="col-md-12 editPar__title">
                <input type="hidden" name="his_id" id="" value="{{$edit->history_id}}">
                <input type="hidden" name="history_id" value="{{$edit->id}}">
                <input type="text" placeholder="Название" name="title" value="{{$edit->history_title}}"
                    class='showBorder  showText showText__text'>
            </div>
            <div class="col-md-12 editPar__body">
                <textarea name="text" id="" placeholder="Описание" class='showBorder  showText showText__text' cols="30"
                    rows="10">{{$edit->history_text}}</textarea>
            </div>
            <div class="col-md-4">

                <button class="allButtons showText__buttons par_button">Сохранить</button>
            </div>

        </form>
        <form method="POST" action="{{ route('destroyOnePar') }}" class="col-md-2 editPar__title" action="">
            @csrf
            <input type="hidden" name="history" id="" value="{{$edit->history_id}}">
            <input type="hidden" name="his_id" id="" value="{{$edit->id}}">
            <button class="allButtons showText__buttons par_button">Удалить главу</button>

        </form> --}}
    </div>
</div>
</div>
<div class="footer">
    @include('footer')
</div>
