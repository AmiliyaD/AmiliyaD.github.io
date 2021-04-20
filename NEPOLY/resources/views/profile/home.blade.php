
{{-- ГЛАВНЫЙ ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ --}}
@extends('styles')
<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
@section('title')
Profile
@endsection
<?php
$user_avatar = Auth::user()->user_avatar;
?> 
{{Auth::user()->user_avatar}}
<div class="container">
    @include('header')
    <div class="row justify-content-center">

        <div class="col-md-6 profile">
            <div class="imgBas ">
               
                @if (!empty(Auth::user()->user_avatar))
                <img class="basicAva img-thumbnail"  style="border-radius: 100px;" src="{{ asset('avatar/'.Auth::user()->user_avatar) }}" alt="">
                @else
                <img class="basicAva img-thumbnail" src="{{ asset('img/basicAva.png') }}" alt="">
                @endif
  
        </div>

            {{-- Изменить автарку пользователю --}}
            @if (Session::has('ava'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('ava')}}
            </div>
            @endif
            <h1 class="text-center showText_Bg">{{Auth::user()->name}} {{Auth::user()->surname}}</h1>
            <form enctype="multipart/form-data" action="{{ route('changeAvatar') }}" method="post">
                @csrf
                <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                <input type="file" name="userAvatar" id="">
                <button>Изменить автарку</button>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" text-center">
                <button class="logout-button work_genre text-center" style="margin: 10px auto">Выйти</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="profile_allWork">

        <h2>Все работы</h2>
        <div class="row">
            @include('session')
            @foreach ($history as $his_item)
            <div class="col-md-11 ">


                <div class="history__one index__history_head">

                    <div class="index__history_header ">
                        <div class="row">
                            <div class="col-md-7">
                                {{-- h3 --}}


                                <h3 class="d-inline "><a href="{{ route('showWork', ['id'=>$his_item->id]) }}"
                                        class="history_one__h3"> {{$his_item->title}}</a>
                                </h3>
                            </div>
                            <div class="col-md-3">
                                {{-- текстовые иконы --}}
                                <div class="tIcons align-self-center">
                                    <div class="img_like d-inline"><img src="{{ asset('img/i2.png') }}" alt="">
                                        <b></b>

                                        <b>{{$his_item->comments()->where('post_id', $his_item->id)->count() + + $his_item->getAllComments()->where('history_id', $his_item->id)->count()}}</b>
                                    </div>
                                    <div class="img_comm d-inline"><img src="{{ asset('img/i1.png') }}" class="" alt="">
                                        <b>{{$his_item->likes}}</b></div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                {{-- тег --}}
                                @if (!empty($his_item->genresId->colorBack))
                                <span id="{{$his_item->genresId->name}}"
                                    class=" float-right work_genre work_{{$his_item->genresId->name}} {{$his_item->genresId->colorText}}"
                                    style="background-color: {{$his_item->genresId->colorBack}}; color: {{$his_item->genresId->colorText}}; 
                                    border: none">{{$his_item->genresId->name}}</span>


                                @else
                                <span id="{{$his_item->genresId->name}}"
                                    class=" float-right work_genre work_{{$his_item->genresId->name}}">{{$his_item->genresId->name}}</span>
                                @endif

                            </div>

                        </div>

                    </div>
                    <div class="index__history_date">
                        <span class=" index__history_spanOne">{{$his_item->userId->name}}</span>
                        <span class="index__history_spanTwo">{{$his_item->created}}</span>
                        @if ($his_item->status == 'В процессе')
                        <p class="in_progress_main float-right ">{{$his_item->status}}</p>
                        @else
                        <p class="float-right in_completed_main ">{{$his_item->status}}</p>
                        @endif

                    </div>
                    <div class="index__history_p">
                        <p>{{$his_item->text}}</p>
                    </div>
                </div>




            </div>

            {{-- КНОПКИ ДЛЯ ИСТОРИЙ --}}
            <div class="col-md-1 d-flex align-self-center">
                <div class="editSum">
                    <div class="editSum_completed mb-1">
                        {{-- ИСТОРИЯ ЗАВЕРШЕНА --}}
                        @if ($his_item->status == 'В процессе')
                        <form method="POST" action="{{ route('finish') }}">@csrf
                            <input type="hidden" name="finish_id" value="{{$his_item->id}}">
                            <button><img width="44px" src="{{ asset('img/check 1.png') }}" alt=""></button> </form>
                        @endif

                    </div>
                    <div class="editSum_edit mb-1">
                        {{-- РЕДАКТИРОВАНИЕ ИСТОРИИ --}}
                        <form method="get" action="{{ route('addPar', ['id'=> $his_item->id]) }}">@csrf
                            <input type="hidden" name="finish_id" value="{{$his_item->id}}">
                            <button><img width="44px" src="{{ asset('img/pencil 1.png') }}" alt=""></button> </form>
                    </div>
                    <div class="editSum_del  mb-1">
                        {{-- УДАЛИТЬ ИСТОРИЮ --}}
                        <form action="{{ route('delete') }}" method="post">
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                            @csrf <button>
                                <input type="hidden" name="del_id" value="{{$his_item->id}}"> <img
                                    src="{{ asset('img/delete 1.png') }}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>

@include('footer')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
