
<div class="col-xl-12 mt-3 index-container__header">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}" alt=""> BookOfBooks</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item ml-5">
                <a class=" active" aria-current="page" href="{{ route('add') }}">Добавить работу</a>
              </li>
              <li class="nav-item">
                <a class="" href="{{ route('show') }}">Все работы</a>
              </li>
              <li class="nav-item">
                <a class="" href="{{ route('author') }}">Все авторы</a>
              </li>
              <li class="nav-item">
                <a class=" " href="{{ route('search') }}" tabindex="-1" aria-disabled="true">Поиск</a>
              </li>
              
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                <li class="nav-item authCheck">
                    <a class=""  style="color: #FF008A;" href="{{ route('dashboard') }}" tabindex="-1" aria-disabled="true">{{Auth::user()->name}}</a>
                  </li>
                  {{-- <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li class="nav-item">
                        <a class="" href="#" tabindex="-1" aria-disabled="true"><button class="no-btn"> Выход</button></a>
                      </li>

                </form> --}}
                @else 
                <li class="nav-item authCheck">
                    <a class="pink"  style="color: #FF008A;" href="{{ route('login') }}" tabindex="-1" aria-disabled="true">Вход</a>
                  </li>
                <li class="nav-item authCheck">
                    <a class="pink" style="color: #FF008A;" href="{{ route('register') }}" tabindex="-1" aria-disabled="true">Регистрация</a>
                  </li>
                @endif

                
            
              </ul>
          </div>
        </div>
      </nav>

</div>

<style>
 .pink {
  color: #FF008A;
 }   
.no-btn {
    background: none;
    border: none;
}
</style>