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
            <img class="img-thumbnail basicAvaAdmin" src="{{ asset('img/ava.png') }}" alt="">
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
            <input type="color" name="colorBack" class='adminText colorWidth' placeholder="Цвет ярлыка">
        </div>
        <div class="col-md-3">

            <label for="">Цвет надписи</label>
            
            <input type="color" class='adminText colorWidth' name="colorText"  placeholder="Цвет надписи">
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
        

            <div class="d-flex flex-row col-md-3 del-genre_header ">
 
                    <input type="checkbox" name="checkedGenres[]" class="adminCheck" value="{{$genreName->id}}">
                
            
                <div id="{{$genreName->name}}"
                    class=" float-right work_genre work_{{$genreName->name}} "  style="background-color: {{$genreName->colorBack}};
                     color: {{$genreName->colorText}}; border: none">{{$genreName->name}}</div>
              
           
             </div>
               
        @else

        <div class="col-md-3 d-flex flex-row del-genre_header">
            <div class="checkboxGenre align-self-center">
                <input type="checkbox" name="checkedGenres[]" class="adminCheck" value="{{$genreName->id}}">
            </div>
            <div class="genreDel">
            <div class="genreName work_genre work_{{$genreName->name}}">
                {{$genreName->name}}
            </div>
        </div>
        </div>
        @endif
        @endforeach
   
        <div class="col-md-12 del-genre_footer">
            <button value="" class='adminButton adminButton-del'>Удалить выбранные жанры</button>
        </div>
    </form>



    {{-- ВСЕ РАБОТЫ --}}
    <div class="profile_allWork">

        <h2>Все работы</h2>
        <div class="row">
        
            @foreach ($history as $his_item)
            <div class="col-md-11 ">


                <div class="history__one index__history_head">

                    <div class="index__history_header ">
                        <div class="row">
                            <div class="col-md-7">
                                {{-- h3 --}}
                 

                                <h3 class="d-inline "><a href="{{ route('showWork', ['id'=>$his_item->id]) }}" class="history_one__h3"> {{$his_item->title}}</a>
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

                                {{-- цвет жанра --}}
                                @if (!empty($his_item->genresId->colorBack))
                                <span id="{{$his_item->genresId->name}}"
                                    class=" float-right work_genre work_{{$his_item->genresId->name}} {{$his_item->genresId->colorText}}"
                                    style="background-color: {{$his_item->genresId->colorBack}}; color: {{$his_item->genresId->colorText}}; 
                                    border: none">{{$his_item->genresId->name}}</span>
    
    
                                @else
                                <span id="{{$his_item->genresId->name}}"
                                    class=" float-right work_genre work_{{$his_item->genresId->name}}">{{$his_item->genresId->name}}</span>
                                @endif
                                {{-- end цвет жанра --}}
                            </div>

                        </div>

                    </div>
                    <div class="index__history_date">
                        <span class=" index__history_spanOne">{{$his_item->userId->name}}</span>
                        <span class="index__history_spanTwo">{{$his_item->created}}</span>
                        {{-- цвет статуса --}}
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