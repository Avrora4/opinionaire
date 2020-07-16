@extends('layouts.app')

@section('content')
<div class="title">
    <h1>{{$opinionaire->title}}</h1>
</div>
<div>
    @foreach ($questions as $index => $question)
    <div class="card-header">
        <h2>{{$index+1}}. {{$question['text']}}</h2>
        <div class="card-body">
            <ul>
                @foreach (array_column($result,$index) as $a)
                    @if ($question['type'] =='text' || $question['type'] =='number')
                        <li>{{$a}}</li>
                    @elseif ($question['type'] =='radio')
                        <li>{{$question['items'][$a]}}</li>
                    @elseif ($question['type'] =='checkbox')
                        <li>
                            {{implode(', ', array_map(fn($item) => $question['items'][$item], $a))}}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>

@endsection
