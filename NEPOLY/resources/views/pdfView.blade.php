<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>{{$historyPar[0]->title}}</h1>
            <p>{{$historyPar[0]->text}}</p>
        </div>
        <div class="row">
            @foreach ($historyTexts as $item)
                {{$item->history_title}}

                {{$item->history_text}}
            @endforeach
        </div>
    </div>
</body>
</html>