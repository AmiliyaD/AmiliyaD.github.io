<link rel="stylesheet" href="{{ asset('css/allWorks.css') }}">
<link rel="stylesheet" href="{{ asset('css/adminProfile.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
@extends('styles')

@section('title')
Все работы
@endsection



{{-- header --}}
<div class="container">
    @include('header')
    <div class="row allHeadr  align-middle">
        <div class="col-6">
            <img src="{{ asset('img/s.png') }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-5 col-sm-12 col-12 align-baseline ">
            <div class="r d-flex flex-column">
                <h2 class="text-center">Все работы</h2>
                <form action="{{ route('showSearch') }}" method="get">
                    <input type="text" name="name" id="" class="inc" placeholder="Введите название работы">

                    <button class="btn btn-success">Найти!</button>
                </form>


            </div>
        </div>
    </div>

    {{-- header --}}

    {{-- autors --}}
    {{-- stories --}}
    <div class="row allHeadr">

        <div class="w-100"></div>
        <div class="col-md-12  ">
            @foreach ($history as $his_item)
            <div class="history__one index__history_head">
                {{-- HEADER ИСТОРИИ --}}
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


                                    <b>{{$his_item->comments()->where('post_id', $his_item->id)->count() + $his_item->getAllComments()->where('history_id', $his_item->id)->count()}}</b>
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
                {{-- BODY ИСТОРИИ --}}
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

            {{-- проверка на администратора  --}}
            @if (Auth::check())
            @if (Auth::user()->roleName == 'Admin')
            <form class="adminButton" method="POST" action="{{ route('delete') }}">
                @csrf
                <button class="adminButton-delPar adminButton " name="del_id" value="{{$his_item->id}}">Удалить
                    работу</button>
            </form>
            @endif
            @endif
            @endforeach



        </div>



    </div>
</div>
@include('footer')
