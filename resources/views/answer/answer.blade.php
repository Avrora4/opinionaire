@extends('layouts.app')

@section('content')
    
@if ( $title == null || $questions == null )
    <div class="title">
        <h1>No questions!!</h1>
    </div>
    <div class='to_mypage'>
        <a href="{{route('welcome')}}"><button class="btn btn-dark">HOME</button></a>
    </div>
@else
    <div class="title">
        <h1>{{$title}}</h1>
    </div>
    <form method='post' action='/answer/{{$opinionaire->id}}/comfirm'>
        @csrf 
        <div>
            @foreach ($questions as $index => $question)
                <div class="card-header">
                    <h2>{{$index+1}}. {{$question['text']}}</h2>
                    <div class="card-body">
                        @if ($question['type'] =='text')
                            <input type='text' name='{{"answers[{$index}]"}}'>
                        @elseif ($question['type'] =='number')
                            <input type='number' name='{{"answers[{$index}]"}}'>
                        @elseif ($question['type'] =='radio')
                            @foreach ($question['items'] as $i => $item)
                                <input type='radio' name='{{"answers[{$index}]"}}' value='{{$i}}'> {{$item}}
                            @endforeach
                        @elseif ($question['type'] =='checkbox')
                            @foreach ($question['items'] as $i => $item)
                                <input type='checkbox' name='{{"answers[{$index}][]"}}' value='{{$i}}'> {{$item}}
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        <button type='submit' class="btn btn-info" style='margin:5px 0'>ANSWER</button>
    </form>
@endif

@endsection
