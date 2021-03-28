
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
    <div class="row autors margin-top" >
        @foreach ($authors as $a)
        <div class="col-6 d-inline">
          <a href="{{ route('authorProfile', ['userId'=>$a->id]) }}"><img src="{{ asset('img/av.png') }}" alt="" class="d-inline">
            <p>{{ $a->name }}</p></a>  
 
            </div>
        @endforeach
    
    </div>

</div>
    
@include('footer')