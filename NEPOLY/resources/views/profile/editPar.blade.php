@extends('styles')
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
@section('title')
Edit paragrah
@endsection
<div class="container editPar">
@include('header')
<div class="row editPar_row showText_Bg">
    <div class="col-md-12 editPar_h1">
        <h1 class="text-center" style="margin-top: 100px;">Редактирование главы</h1>
    </div>

   
</div>
<div class="row">
   
    <form  class="col-md-12 editPar__title" action="{{ route('updatePar') }}"  method="POST" style="padding: 0;">
@csrf
        <div class="col-md-12 editPar__title">
          <input type="hidden" name="his_id" id="" value="{{$edit->history_id}}">
            <input type="hidden"  name="history_id" value="{{$edit->id}}">
            <input type="text" placeholder="Название" name="title" value="{{$edit->history_title}}" class='showBorder  showText showText__text'>
        </div>
        <div class="col-md-12 editPar__body">
    <textarea name="text" id=""  placeholder="Текст главы" class='showBorder  showText showText__text' cols="30" rows="10" style=" height: 1062px; padding: 40px;">{{$edit->history_text}}</textarea>
        </div>
        <div class="col-md-4">  
            <button class="allButtons showText__buttons par_button">Сохранить</button>
        </div>
      
    </form>
    <form method="POST" action="{{ route('destroyOnePar') }}"   class="col-md-2 editPar__title" action="">
        @csrf
        <input type="hidden" name="history" id="" value="{{$edit->history_id}}">
        <input type="hidden" name="his_id" id="" value="{{$edit->id}}">
        <button class="allButtons showText__buttons par_button">Удалить главу</button>

    </form>
</div>
</div>
</div>

<div class="footer">
    @include('footer')
</div>
