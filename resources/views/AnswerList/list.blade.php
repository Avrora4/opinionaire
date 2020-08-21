@extends('layouts.app')

@section('content')
<div class="title">
    <h1>～Opinionaire List～</h1>
</div>
<div>
    @foreach ($opinionaires as $index => $opinionaire)
    <div class="card-header">
        <h2>{{$index+1}}. {{$opinionaire['title']}}</h2>
        <div class="card-body">
            <a href="{{route('my_opinionaire_edit', ['opinionaire'=>$opinionaire])}}"><button type="submit" class="btn btn-warning">EDIT</button></a>
            <a href="{{route('my_opinionaire_delete', ['opinionaire'=>$opinionaire])}}"><button type="submit" class="btn btn-danger">DELETE</button></a>
            <a href="{{route('my_opinionaire_answer', ['opinionaire'=>$opinionaire])}}"><button type="submit" class="btn btn-info">ANSWER</button></a>
            <a href="{{route('my_opinionaire_result', ['opinionaire'=>$opinionaire])}}"><button type="submit" class="btn btn-primary">RESULT</button></a>
        </div>
    </div>
    @endforeach
</div>
<div class='to_mypage'>
    <a href="{{route('welcome')}}"><button class="btn btn-dark">HOME</button></a>
</div>
@endsection
