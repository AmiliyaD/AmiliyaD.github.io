<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css')}}">
@extends('styles')

@section('title')
Поиск
@endsection

<div class="container ">
    @include('header')
    <div class=" search-1 search_h">
        <div class="col-md-2 col-12">
            <h1>Поиск</h1>
        </div>
    
    </div>
{{-- 
    ФОРМА ОТПРАВКИ --}}
<form action="{{ route('searchFunc') }}" method="GET">
    @csrf
    <div class="row search_body">
     
        
        <div class="col-md-6">
            <input type="text" class="se-0" name="title" placeholder="Введите имя работы...">
        </div>
    
    </div>
    <div class="row searchButton">
        {{-- buttons --}}
        <div class="col-md-6 searchButton_button">
            <div class="row">
                {{-- row-1 --}}
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <button class=" se-1 b gr" name="status" value="Завершен">
                        Завершен
                    </button>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-6">
                    <button class=" se-1 b or" name="status" value="В процессе">
                        В процессе
                    </button>
                </div>
                {{-- row-2 --}}
                @foreach ($genres as $item)
                @if (!empty($item->colorBack))
                <div class="col-lg-3 col-md-6 col-xs-6">
                    <button name="genre" style="border: 1px solid {{$item->colorBack}}; color: {{$item->colorText}}"  value="{{$item->id}}" class="se-2 b {{$item->name}}">{{$item->name}}</button>
                </div>
                @else
                <div class="col-lg-3 col-md-6 col-xs-6">
                    <button name="genre" value="{{$item->id}}" class="se-2 b {{$item->name}}">{{$item->name}}</button>
                </div>  
                @endif
              
                @endforeach
              
                {{-- row-3 --}}
               <div class="w-100"></div>
                {{-- row-4 --}}
                <div class="col-lg-6 col-md-12">
                    <button name="popular" value="more" class="se-3 b se-2-g">Сначала более популярные</button>
              </div>
                <div class="col-lg-6 col-md-12">
                    <button name="popular" value='less' class="se-3 b se-2-g">Сначала менее популярные</button>
                </div>
                {{-- row-5 --}}
                
                <div class="col-md-5">
                    <div class="se-4 b se-4-d"><input type="date" placeholder="Дата от &darr;" class="date-in" name="date_from" id=""
                            onfocus="(this.type='date')"></div>
                </div>
                <div class="col-md-5">
                    <div class="se-4 b se-4-d"><input type="date"  class="date-in" name="date_to" id=""
                            onfocus="(this.type='date')"></div>
                </div>
    
                <div class="col-12"><button name="searchName" class="searc">Найти!</button></div>
            </div>
        </div>
    </form>
        {{-- img --}}
        <div class="col-md-6 col-12">
            <img src="{{ asset('img/lup.png') }}" class="img-fluid" width="600px" alt="">
        </div>
    </div>

    {{-- РЕЗУЛЬТАТЫ ПОИСКА --}}
    <div class="row searchRes">
    
        <div class="col-md-6">
            <h3>Результаты поиска</h3>
        </div>
@if (isset($searchResults))


@if (!count($searchResults))
    <p>Ничего не найдено!</p>
@endif
        @foreach ($searchResults as $his_item)
            
       
        <div class="col-md-12">
            <div class="history__one index__history_head">
                {{-- HEADER ИСТОРИИ --}}
       
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

                                    <b>{{$his_item->comments()->where('post_id', $his_item->id)->count() + $his_item->getAllComments()->where('history_id', $his_item->id)->count()}}</b></div>
                                <div class="img_comm d-inline"><img src="{{ asset('img/i1.png') }}" class=""
                                        alt="">
                                    <b>{{$his_item->likes}}</b></div>
                            </div>
                        </div>
                        <div class="col-md-2">

                              {{-- тег --}}
                              @if (!empty($his_item->genresId->colorBack))
                              <span id="{{$his_item->genresId->name}}"
                                  class=" float-right work_genre work_{{$his_item->genresId->name}}" style="background-color: {{$his_item->genresId->colorBack}}; border: none ">{{$his_item->genresId->name}}</span>
                            
                            @else
                            <span id="{{$his_item->genresId->name}}"
                              class=" float-right work_genre work_{{$his_item->genresId->name}}">{{$his_item->genresId->name}}</span>
                                  @endif
                           
                        </div>

                    </div>

                </div>
                {{-- BODY ИСТОРИИ --}}
                <div class="index__history_date">
                    <span class=" index__history_spanOne">{{$his_item->userId->name}}</span> <span
                        class="index__history_spanTwo main_date ">{{$his_item->created}}</span>
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
        @endforeach
        @endif
       
    </div>
    
    

</div>

@include('footer')

<style>

    .searchRes{
        margin-top: 100px;
    }
</style>