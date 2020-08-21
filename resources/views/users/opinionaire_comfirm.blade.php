@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="title">
            <h1>{{$title}}</h1>
        </div>
            @foreach ($questions as $index => $question)
                <div class="card-header">   
                    <h2>{{$index+1}}. {{$question['text']}}</h2>
                    <div class="card-body"> 
                        @if ($question['type'] =='text')
                            <input type='text' name='{{"answers[{$index}]"}}'><p></p>
                        @elseif ($question['type'] =='number')
                            <input type='number' name='{{"answers[{$index}]"}}'><p></p>
                        @elseif ($question['type'] =='radio')
                            @foreach ($question['items'] as $i => $item)
                                <input type='radio' name='{{"answers[{$index}]"}}' value='{{$i}}'> {{$item}}<p></p>
                            @endforeach
                        @elseif ($question['type'] =='checkbox')
                            @foreach ($question['items'] as $i => $item)
                                <input type='checkbox' name='{{"answers[{$index}]"}}' value='{{$i}}'> {{$item}}<p></p>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
            <p></p>
        </div>

        <form action='opinionaire_save' method='POST'>
            @csrf
            <input type='hidden' name='title' value='{{$title}}'>
            @foreach ($questions as $index => $question)
            <input type='hidden' name='{{"questions[{$index}][type]"}}' value='{{$question["type"]}}'>
            <input type='hidden' name='{{"questions[{$index}][text]"}}' value='{{$question["text"]}}'>
                @if ($question['type'] =='radio' || $question['type'] =='checkbox')
                @foreach ($question['items'] as $i => $item)
                    <input type='hidden' name='{{"questions[{$index}][items][{$i}]"}}' value='{{$item}}'>
                @endforeach
                @endif
            @endforeach
        <button type='submit' class="btn btn-primary">SAVE</button>
        <button type='submit' formaction="opinionaire_create" class="btn btn-light">BACK</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
@endsection