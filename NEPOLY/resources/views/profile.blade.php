@extends('styles')

@section('title')
    Profile
@endsection
<body>
    <div class="container">
        <div class="row">
       @include('header')
       <form action="{{ route('logout') }}" method="post">
        @csrf
        <li class="nav-item">
            <a class="" href="#" tabindex="-1" aria-disabled="true"><button class="no-btn"> Выход</button></a>
          </li>

    </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($history as $i)
                    {{$i->title}}
                    {{$i->id}}
                @endforeach
            </div>
        </div>
    </div>

    
</body>

