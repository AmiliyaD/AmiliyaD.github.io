@extends('styles')
@section('link')
<link rel="stylesheet" href="{{ asset('css/bg.css') }}">
@endsection
@section('title')
BookOfBooks
@endsection

<body>
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
                    <h1>Подари свой мир!</h1>
                    <p>Может, он кому-то понравится</p>
  <a href="{{ route('add') }}" class=""><button class='index__h1_button'>Добавить работу</button> </a>
                </div>
            </div>

            {{-- ИСТОРИИ --}}

            <div class="row index__history">
                <div class="col-md-12">
                    <h3>Новинки</h3>
                </div>

                {{-- все истории --}}
                <div class="col-md-12  ">
                    @foreach ($histor as $his_item)
                    <div class="history__one index__history_head">

                        <div class="index__history_header ">
                            <h3 class="d-inline "><a href=""> {{$his_item->title}}</a></h3>
                            <div class="img_like d-inline"><img src="{{ asset('img/i2.png') }}" alt="">
                                <b>234</b></div>
                                <div class="img_comm d-inline"><img  src="{{ asset('img/i1.png') }}" class=""
                                    alt="">
                                <b>123</b></div>
                                
                            <span class="float-right">{{$his_item->genresId->name}}</span>
                        </div>
                        <div class="index__history_date">
                            <span class=" index__history_spanOne">{{$his_item->userId->name}}</span> <span class="index__history_spanTwo">11.22.2021</span> <span class="float-right ">Завершена!</span>
                        </div>
                        <div class="index__history_p">
                            <p>{{$his_item->description}}</p>
                        </div>
                      </div>
                    @endforeach
                  
              
                </div>
            </div>

            {{-- FEATURES --}}
            <div class="row index__features">
                <div class="features__col_Main col-md-4 "><img class="rounded d-block mx-auto" src="{{ asset('img/47.png') }}" alt="">
                <p class="text-center">Публикуй свои работы</p></div>
                <div class="features__col_Main col-md-4"><img class="rounded d-block mx-auto" src="{{ asset('img/46.png') }}" alt="">
                    <p class="text-center">Читай работы других
                        авторов</p></div>
                <div class="features__col_Main col-md-4"><img class="rounded d-block mx-auto" src="{{ asset('img/48.png') }}" alt="">
                    <p class="text-center">Поддерживай авторов и
                        оставляй комментарии</p></div>
                <div class="col-md-4 offset-md-4">
                  <a href="{{ route('show') }}"> <button class='features__button'>Перейти ко всем работам</button> </a> 
                </div>
                
            </div>
            
        </div>
    </div>

    <div class="footer">
        @include('footer')

    </div>


</body>

</html>
