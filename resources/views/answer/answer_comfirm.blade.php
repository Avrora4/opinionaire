@extends('layouts.app')

@section('content')
<h1>{{$opinionaire->title}}</h1>
<form method='post' action='/answer/{{$opinionaire->id}}/save'>
    @csrf
    <div> 
        @foreach ($questions as $index => $question)
        <div class="card-header">
            <h2>{{$index+1}}. {{$question['text']}}</h2>
            <div class="card-body">
                @if (is_array($answers[$index]))
                    @foreach ($answers[$index] as $a)
                        <input type='hidden' name='{{"answers[{$index}][]"}}' value='{{$a}}'>
                    @endforeach
                @else
                    <input type='hidden' name='{{"answers[{$index}]"}}' value='{{$answers[$index]}}'>
                @endif

                @if ($question['type'] =='text')
                    <input type='text' value='{{$answers[$index]}}' disabled>
                @elseif ($question['type'] =='number')
                    <input type='number' value='{{$answers[$index]}}' disabled>
                @elseif ($question['type'] =='radio')
                    @foreach ($question['items'] as $i => $item) 
                        @if ($i == $answers[$index])
                            <input type='radio' checked disabled>
                        @else
                        <input type='radio' disabled>
                        @endif
                        {{$item}}
                    @endforeach
                @elseif ($question['type'] =='checkbox')
                    @foreach ($question['items'] as $i => $item)
                        @if (in_array($i, $answers[$index]))
                            <input type='checkbox' checked disabled>
                        @else
                            <input type='checkbox' disabled>
                        @endif
                        {{$item}}
                    @endforeach
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <button type='submit' class="btn btn-primary" style='margin:5px 0'>COMFIRM</button>
</form>
@endsection