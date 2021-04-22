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


                            {{-- модальное окно --}}
                          <button type="button" class="btn modalwindow ml-auto" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Напишите нам</button>
                        
                          
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Письмо разработчикам</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                {{-- тело модального окна --}}
                                <form method="POST" action="{{ route('sendMail') }}">
                                  @csrf
                                <div class="modal-body">
                                  
                  
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Ваше имя:</label>
                                      @if (Auth::check())
                                      <input type="text" name="send_name" value="{{Auth::user()->name}}" class="form-control" id="recipient-name">
                                      @else
                                      <input type="text" name="send_name" class="form-control" id="recipient-name">
                                      @endif
                    
                              
                                    </div>
                                    <div class="form-group">
                                      <label for="message-text" class="col-form-label">Сообщение:</label>
                                      <textarea class="form-control" name="send_text" id="message-text"></textarea>
                                    </div>
                            
                                </div>

                                {{-- кнопки окна --}}
                                <div class="modal-footer">
                                 
                                  <button type="submit" class="btn sendModal">Отправить</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>    
                            {{-- конец модального окна --}}


                          {{-- <button class="nav-link" href="">Напишите нам</button> --}}
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     --}}

    