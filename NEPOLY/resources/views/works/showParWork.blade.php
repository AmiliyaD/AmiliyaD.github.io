<?php
var_dump($historyPar->id);
function getId($getId)
{
    $getId++;
    return $getId;
    # code...
};
echo getId($historyPar->id);

?>

@extends('styles')
@section('link')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
@endsection
@section('title')
OneWork
@endsection

<div class="container">
    @include('header')
    {{-- WORK HEADER --}}
    <div class="showParWork_header showText_Bg row">
        <div class="col-md-6 offset-md-3">

            <h1 class="text-center">{{$historyPar->historyPar->title}}</h1>
        </div>
        <div class="col-md-4 offset-md-4">
            <h2 class="text-center">{{$historyPar->history_title}}</h2>
        </div>
    </div>
    {{-- WORK TITLE --}}
    <div class="showParWork_text row">
        <div class="col-md-12">

            <p>{{$historyPar->history_text}}</p>
        </div>
    </div>
    <div class="showParWork__buttons showText_Bg row">
        <div class="col-md-4 offset-md-4">
            <a  class="text-center par-btn" href="{{ route('showWorkPar', ['par_id'=>getId($historyPar->id)]) }}">К следующей главе</a>
            <div class="w-100"></div>
            <a class="text-center border" href="">Назад к содержанию</a>
        </div>
    </div>
    {{-- WORK COMMENTS --}}
    <div class="row history_comments">
        <form action="{{ route('addCommentPar') }}" method="POST" class="col-md-12">
            @csrf
            <div class="row">
                <div class="col-md-9  commentInp__input">
                    <h2>Комментарии</h2>
                    <input type="text" name="commentText" class='comment_input'>
                </div>
              
                @if (Auth::check())
                <input type="hidden" name="author" value="{{Auth::user()->name}}">
                <input type="hidden" name="authId" value="{{Auth::id()}}">
                
                @endif
             
                <input type="hidden" name="historyId" value="{{$historyPar->id}}">
     
                <div class="col-md-3 ">
                    <div class="commentInt__buttons">
                        
                        <button class='par-btn buttons_send'>Отправить</button>
                    </div>
                </div>
            </div>
            
        </form>
        {{-- COMMENT INPUT --}}
        @include('session')
       @foreach ($comments as $item)
       <div class="col-md-12 comments_text obertka">


        <div class="comment_text_inn">
            <div class="row">

                <div class="col-md-2">
          <b>   {{$item->commentAuthor}}</b>
                </div>
                <div class="col-md-8">
                    {{$item->commentText}}


                </div>
            </div>

        </div>

    </div>
       @endforeach


    </div>
 
</div>
@include('footer')