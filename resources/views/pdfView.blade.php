<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$historyPar[0]->title}}</title>
</head>
{{$historyPar[0]->genresId->name}}
<body>
    <div class="container">
        {{-- title --}}
        <div class="row title">
            <div class="col-md-12">
                <h1 class="title_h1 text-center">{{$historyPar[0]->title}}</h1>
                <span>Автор: {{$historyPar[0]->userId->name}}</span>
                <br>
                <span>Статус: {{$historyPar[0]->status}}</span>
            </div>
            <div class="col-md-12">
                <p class="desc">{{$historyPar[0]->text}}</p>
            </div>

        </div>

        
        {{-- text --}}
        <div class="row text">
            <div class="col-md-12">
                
                @if (count($historyTexts) == 0)
                На данный момент работа не содержит глав.
                @endif
                @foreach ($historyTexts as $item)
                <div class="text_body">
                    <b>
                        <p class="text_title">{{$item->history_title}}</p>
                    </b>
    
                    <p class="text_content">{{$item->history_text}}</p>

                </div>
              
                @endforeach
            </div>

        </div>
        <div class="row">
            <div class="end">
                <div class="col-md-6 offset-md-3">
                    <p>Конец!</p>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    @font-face {
        font-family: "DejaVu Sans";
        src: url("/fonts/dejavu-sans/DejaVuSans.ttf");
        /* IE9 Compat Modes */
        src:
            local("DejaVu Sans"),
            local("DejaVu Sans"),
            url("/fonts/dejavu-sans/DejaVuSans.ttf");
    }

    h1,
    .text_title,
    .desc {
        text-align: center;
    }

    body {
        font-family: "DejaVu Sans";
        font-size: 12px;
    }

    .text {
        margin-bottom: 150px;
        margin-top: 100px;
    }
.text_body {
   margin-top: 100px;
}
    .text_title {
        font-size: 20px;
    }

</style>

</html>
