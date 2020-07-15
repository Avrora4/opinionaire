@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
<form method='post' action='/answer/{{$opinionaire->id}}/comfirm'>
    @csrf
    <div> 
        @foreach ($questions as $index => $question)
            <h2>{{$index+1}}. {{$question['text']}}</h2>
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
        @endforeach
    </div>
    <button type='submit'>COMFIRM</button>
</form>

@endsection