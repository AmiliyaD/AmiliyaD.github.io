{{-- ГЛАВНЫЙ ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ --}}
@extends('styles')

@section('title')
Profile
@endsection

<div class="container">
    @include('header')
    <div class="row justify-content-center">

        <div class="col-md-6 profile">
            <img src="{{ asset('img/ava.png') }}" alt="">
            <h1 class="text-center">{{Auth::user()->name}} {{Auth::user()->surname}}</h1>

        </div>

    </div>
    <div class="row">
        <div class="col-md-4 offset-md-5">
            <a class="work-button" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
      

        </div>
    </div>
    <div class="profile_allWork">

        <h2>Все работы</h2>
        <div class="row">
            <div class="col-md-12  ">
                @if (Session::has('info'))
                {{Session::get('info')}}
                @endif
                @foreach ($history as $his_item)
                <div class="history__one index__history_head">
    
                    <div class="index__history_header ">
                        <h3 class="d-inline history_one__h3"><a href=""> {{$his_item->title}}</a></h3>
                        <div class="img_like d-inline"><img src="{{ asset('img/i2.png') }}" alt="">
                            <b>234</b></div>
                        <div class="img_comm d-inline"><img src="{{ asset('img/i1.png') }}" class="" alt="">
                            <b>123</b></div>
    
                        <span class="float-right">{{$his_item->genresId->name}}</span>
                    </div>
                    <div class="index__history_date">
                        <span class=" index__history_spanOne">{{$his_item->userId->name}}</span> <span
                            class="index__history_spanTwo">11.22.2021</span> <span class="float-right ">Завершена!</span>
                    </div>
                    <div class="index__history_p">
                        <p>{{$his_item->text}}</p>
                    </div>
                </div>
                @endforeach
    
    
            </div>
        </div>
    </div>
    
 
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
