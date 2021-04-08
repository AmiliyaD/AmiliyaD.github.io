{{--  ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ --}}
@extends('styles')
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
@section('title')
Author profile
@endsection
<div class="container authorProfile">
@include('header')
<div class="row showText_Bg">
    <div class="col-md-6 offset-md-3">
        <img src="{{ asset('img/ava.png') }}" alt="">
    </div>
    <div class="col-md-6 offset-md-3 mt-5">
        <h1 class='text-center'>{{$user->name}}</h1>
    </div>
</div>


 {{-- stories --}}
 <div class="row ">
    <div class="col-md-12">
        <h2>Все работы</h2>
    </div>
    <div class="w-100"></div>
    <div class="col-md-12  ">
        @if ($history->count() == 0)
           Этот пользователь пока не добавлял работ :(
        @endif
        @foreach ($history as $his_item)
        <div class="history__one index__history_head">
            {{-- HEADER ИСТОРИИ --}}
            <div class="index__history_header ">
                <div class="row">
                    <div class="col-md-7">
                        {{-- h3 --}}
                        <h3 class="d-inline "><a href="{{ route('showWork', ['id'=>$his_item->id]) }}" class="history_one__h3"> {{$his_item->title}}</a>
                        </h3>
                    </div>
                    <div class="col-md-3 mt-5">
                        {{-- текстовые иконы --}}
                        <div class="tIcons align-self-center">
                            <div class="img_like d-inline"><img src="{{ asset('img/i2.png') }}" alt="">


                                <b>{{$his_item->comments()->where('post_id', $his_item->id)->count() + $his_item->getAllComments()->where('history_id', $his_item->id)->count()}}</b></div>
                            <div class="img_comm d-inline"><img src="{{ asset('img/i1.png') }}" class=""
                                    alt="">
                                <b>{{$his_item->likes}}</b></div>
                        </div>
                    </div>
                    <div class="col-md-2">

                        {{-- тег --}}
                        <span id="{{$his_item->genresId->name}}"
                            class=" float-right work_genre work_{{$his_item->genresId->name}}">{{$his_item->genresId->name}}</span>
                    </div>

                </div>

            </div>
            {{-- BODY ИСТОРИИ --}}
            <div class="index__history_date">
                <span class=" index__history_spanOne">{{$his_item->userId->name}}</span> 
                    <span  class="index__history_spanTwo">{{$his_item->created}}</span>     @if ($his_item->status == 'В процессе')
                    <p class="in_progress_main float-right ">{{$his_item->status}}</p>
                    @else
                    <p class="float-right in_completed_main ">{{$his_item->status}}</p>
                    @endif
                    
            </div>
            <div class="index__history_p">
                <p>{{$his_item->text}}</p>
            </div>
        </div>
        @endforeach



</div>



</div>
</div>

@include('footer')