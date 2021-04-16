@extends('styles')
@section('link')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
@endsection
@section('title')
    One story
@endsection
<?php 
if (Auth::check()) {
    $idUser = Auth::id();
if (isset($_GET['userIdButton'])) {
    $idUser = $_GET['userIdButton'];

}

}

?>

<div class="container">
    @include('header')

    {{-- HISTORY TITLE --}}
<div class="row history_title">
<div class="col-md-12 h1">

    <h1 class="text-center history_titleH1">{{$work->title}}</h1>
    <h3 class='text-center'>{{$work->userId->name}}</h3>
</div>
<div class="col-md-12 history_titleDesc">
    <div class="titleDesc_bg">
        <div class="titleDesc_text">
            <p>{{$work->text}}</p>
            <div class="titleDesc_items">
                <button disabled class="work_genre work_{{$work->genresId->name}}">{{$work->genresId->name}}</button>
                <button disabled class="date work_genre main_date">{{$work->created}}</button>
                @if ($work->status == 'В процессе')
                   <button disabled="disabled" class='in_progress tag'>{{$work->status}}</button>
                @else
                <button disabled="disabled" class='completed tag'>{{$work->status}}</button>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
{{-- HISTORY_PAR --}}
<div class="row history_par">
    <div class="col-md-12 history_parH2">
        <h2>Содержание работы</h2>
    </div>
    <div class="col-md-6 history_paragrahps">
        <ul>
            @if ($work->historyText->count() == 0)
            Но никто не пришел. (нету глав :с )
        @endif
            @foreach ($work->historyText as $item)
           
            <li><a href="{{ route('showWorkPar', ['par_id'=>$item->id]) }}"> {{$item->history_title}}</a></li>
            @endforeach
        </ul>

    </div>
</div>

<div class="row history_commentInp">
    <div class="row">
        <div class="col-md-12">
            
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
    <form action="{{ route('addComment') }}" method="POST" class="col-md-12">
        @csrf
        <div class="row">
        
            <div class="col-md-9  commentInp__input">
                <h2 class='mb-2'>Комментарии</h2>
                <input type="text" name="commentText" class='comment_input'>
            </div>
          
            @if (Auth::check())
            <input type="hidden" name="author" value="{{Auth::user()->name}}">
            <input type="hidden" name="authId" value="{{Auth::id()}}">
            
            @endif
         
            <input type="hidden" name="historyId" value="{{$work->id}}">
 
            <div class="col-md-3 ">
                <div class="commentInt__buttons">
               
                    
                    <button class='par-btn buttons_send'>Отправить</button>
                </div>
            </div>
        </div>
        
    </form>
    <div class="col-md-3 ">
        <div class="commentInt__buttons">
            <form action="{{ route('getLike') }}" method="POST">
                @if (Auth::check())
                <input type="hidden" name="author" value="{{Auth::user()->name}}">
                <input type="hidden" name="authId" value="{{Auth::id()}}">
                
                @endif
                @if (isset($userIdButton))
                    {{$userIdButton}}
                @endif
                <input type="hidden" name="historyId" value="{{$work->id}}">


            </form>
            <button value="{{$work->id}}" name="historyId" class='buttons_like'>Нравится {{$work->likes}}</button>
  
        </div>
    </div>
</div>
{{-- comments --}}
<div class="row history_comments">
    {{-- COMMENT INPUT --}}
@include('session')
    @foreach ($comments as $item)
    <div class="col-md-12 comments_text obertka">
      
         
        <div class="comment_text_inn">
            <div class="row">

                <div class="col-md-2">
                    <b> {{$item->commentAuthor}}</b>
                </div>
                <div class="col-md-8">
                    {{$item->comment_text}}
           
                     
        </div>
            </div>

        </div>
   
      

  
    </div>
    @endforeach
</div>
</div>

@include('footer')

<style>
    .buttons_like {
        cursor: pointer;
    }
</style>