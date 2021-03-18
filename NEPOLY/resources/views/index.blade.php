@extends('styles')
@section('link')
<link rel="stylesheet" href="{{ asset('css/bg.css') }}">
<link rel="stylesheet" href="{{ asset('css/tags.css') }}">
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

                                            <b>{{$his_item->comments()->where('post_id', $his_item->id)->count()}}</b></div>
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
