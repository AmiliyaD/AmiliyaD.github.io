<div class="bg_grey_footer footer">
    <div class="container grey__footer">
        <div class="row footer__row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg  ">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}" alt=""> BookOfBooks</a>                
                      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                        <a class="active nav-link" aria-current="page" href="{{ route('add') }}">Добавить работу</a>
                          <a class="nav-link" href="{{ route('show') }}">Все работы</a>
                          <a class="nav-link" href="{{ route('author') }}">Все авторы</a>
                          <a class="nav-link" href="{{ route('search') }}" tabindex="-1" aria-disabled="true">Поиск</a>
                        </div>
                      </div>
                    </div>
                  </nav>
            </div>
        </div>
    </div>
</div>
<div class="bg_white_footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-lg-3">
                <p class='text-center'>Администрация не несет ответственности за содержание работ</p>
                <p class='text-center'>2021</p>
            </div>
        </div>
    </div>
</div>