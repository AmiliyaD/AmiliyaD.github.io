<link rel="stylesheet" href="{{ asset('css/showText.css') }}">
<link rel="stylesheet" href="{{ asset('css/allWorks.css')}}">
@extends('styles')

@section('title')
Все работы
@endsection

{{-- main allWorks --}}

{{-- header --}}
<div class="container">
    @include('header')
    <div class="row allHeadr  align-middle">
        <div class="col-6">
        <img src="{{ asset('img/Рисунок.png') }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-5 col-sm-12 col-12 align-baseline ">
            <div class="r d-flex flex-column">
            <h2 class="text-center">Все авторы</h2>
            <form action="{{ route('searchAuthors') }}" method="get">
                <input type="text" name="name" id="" class="inc" placeholder="Введите имя автора">
           
                <button class="btn btn-success">Найти</button>

            </form>
            
        </div>
        </div>
    </div>
    {{-- header --}}

    {{-- autors --}}
    <div class="row autors  marginBottom mt-5" style="text-align: center;">
        @foreach ($authors as $a)
        <div class="col-6 d-inline">
          <a href="{{ route('authorProfile', ['userId'=>$a->id]) }}">
            <?php if (!empty($a->user_avatar)): ?>
            <img width="86px" height="86px" src="{{ asset('avatar/'.$a->user_avatar) }}" alt="" class="d-inline">
            <?php else: ?>
            <img src="{{ asset('img/av.png') }}" alt="" class="d-inline">
            <?php endif; ?>
            <p>{{ $a->name }}</p></a>  
 
            </div>
        @endforeach
    
    </div>

</div>
    
@include('footer')