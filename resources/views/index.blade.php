@extends('styles')
@section('link')
<?php 
use Faker\Factory as Faker;

?>
<link rel="stylesheet" href="{{ asset('css/bg.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
<link rel="stylesheet" href="{{ asset('css/adminProfile.css') }}">
@endsection
@section('title')
BookOfBooks
@endsection

<body>
        <div class="leftImage"></div>
        <div class="rightImage"></div>

    {{-- ГЛАВНАЯ --}}
    <div class="index-bg">
        <div class="container index-container ">
            {{-- HEADER --}}
            <div class="row">
                @include('header')

            </div>
            {{-- первая страница --}}
            <div class="row index__h1">
                <div class="col-lg-12 col-md-12 col-sm-12">
                 изменения удалились!
                    <h1>Подари свой мир!</h1>
                    <p>и может, он кому-тоhhfddff понравится</p>
                    <a href="{{ route('add') }}" class=""><button class='index__h1_button'>Добавить работу</button> </a>
                </div>
            </div> 

            {{-- ИСТОРИИ --}}
      <div class="row index__history">
                @include('session')
                <div class="col-md-12">
                    <h3 class="index_history-title">Новинки</h3>
                </div>

                {{-- все истории --}}
                <div class="col-md-12  ">
                    @foreach ($histor as $his_item)
                    <div class="history__one index__history_head">
                        {{-- HEADER ИСТОРИИ --}}
               
                        <div class="index__history_header ">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
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
                    {{-- проверка на администратора  --}}
                    @if (Auth::check())
                    @if (Auth::user()->roleName == 'Admin')
                    <form class="adminButton" method="POST" action="{{ route('delete') }}">
                        @csrf
                        
                        <button class= "adminButton-delPar adminButton " name="del_id" value="{{$his_item->id}}">Удалить работу</button>
                    </form>
                    @endif
                    @endif
                
                  
                    @endforeach


                </div>
            </div>

            {{-- FEATURES --}}
            <div class="row index__features">
                <div class="features__col_Main col-md-4 "><img class="rounded d-block mx-auto"
                        src="{{ asset('img/47.png') }}" alt="">
                    <p class="text-center">Публикуй свои работы</p>
                </div>
                <div class="features__col_Main col-md-4"><img class="rounded d-block mx-auto"
                        src="{{ asset('img/46.png') }}" alt="">
                    <p class="text-center">Читай работы других
                        авторов</p>
                </div>
                <div class="features__col_Main col-md-4"><img class="rounded d-block mx-auto"
                        src="{{ asset('img/48.png') }}" alt="">
                    <p class="text-center">Поддерживай авторов и
                        оставляй комментарии</p>
                </div>
                <div class="col-md-4 offset-md-4">
                    <a href="{{ route('show') }}"> <button class='features__button'>Перейти ко всем работам</button>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <div class="footer">
        @include('footer')

    </div>

</body>

</html>
<script>
    let a = 0
    console.log(a)
</script>