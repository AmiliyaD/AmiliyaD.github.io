<link rel="stylesheet" href="{{ asset('css/allWorks.css') }}">
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
                <input type="text" name="" id="" class="inc" placeholder="Введите название работы">
    
                <button class="btn btn-success">Найти</button>
                {{-- <a href="{{ route('search') }}" class="text-center works-all">Больше параметров для поиска </a> --}}
            </div>
        </div>
    </div>
    
    {{-- header --}}
    
    {{-- autors --}}
    {{-- stories --}}
    <div class="row ">
    
        <div class="w-100"></div>
        <div class="col-md-12  ">
            @foreach ($history as $his_item)
            <div class="history__one index__history_head">
                {{-- HEADER ИСТОРИИ --}}
                <div class="index__history_header ">
                    <div class="row">
                        <div class="col-md-7">
                            {{-- h3 --}}
                            <h3 class="d-inline "><a href="" class="history_one__h3"> {{$his_item->title}}</a>
                            </h3>
                        </div>
                        <div class="col-md-3">
                            {{-- текстовые иконы --}}
                            <div class="tIcons align-self-center">
                                <div class="img_like d-inline"><img src="{{ asset('img/i2.png') }}" alt="">


                                    <b>234</b></div>
                                <div class="img_comm d-inline"><img src="{{ asset('img/i1.png') }}" class=""
                                        alt="">
                                    <b>123</b></div>
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
                    <span class=" index__history_spanOne">{{$his_item->userId->name}}</span> <span
                        class="index__history_spanTwo main_date ">{{$his_item->created}}</span>
                        @if ($his_item->status == 'В процессе')
                        <span class="float-right in_progress_main">{{$his_item->status}}</span>
                        @else
                        <span class="float-right in_completed_main ">{{$his_item->status}}</span>
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
