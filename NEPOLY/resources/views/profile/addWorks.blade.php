@extends('styles')

@section('title')
    Profile
@endsection
<link rel="stylesheet" href="{{ asset('css/addWorks.css') }}">

<div class="container">
    @include('header')
    <div class="row">
        <div class="col-8 offset-2">
            <img src="{{ asset('img/r.svg') }}" alt="" class="img-fluid text-center">
            <h1 class="text-center">Добавление работы</h1>
      
            <form action="addwork" method="post">
                @csrf
                <div class="form-group">
                    <p>{{Auth::user()->name }}</p>
                    <input type="text" name="name" id="name" class="works-author  works"  value='{{Auth::user()->name }}' readonly >
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="text" placeholder="Название работы" name="title" id="name" class="works-name  works">
                
                    <select id="" name='genre' class="works-select works">
                        @foreach ($genres as $g)
                    <option value="{{$g->id}}" >{{$g->name}}</option>
                        @endforeach 
                      
                    </select>
                    <div class="w-100"></div>
                
                    <textarea class="works-text works" name="text" placeholder="Описание" id="text" rows="3"></textarea>
    
                    <button type='submit' class="works-button">Отправить</button>
                
                    
                </div>
            </form>
        </div>
    </div>
    


</div>

{{-- header --}}


