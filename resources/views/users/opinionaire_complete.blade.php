@extends('layouts.app')

@section('content')
<div class="complete_message">
<h1>Congratulations!!</h1>
</div>
<div class="card-header">
    <p>Please distribute this URL!</p>
    <div class='CREATE_URL card_body' style='margin:5px 0'>  
    <a href="/answer/{{$opinionaire->id}}?{{$opinionaire->title}}"><button class="btn btn-dark">/opinionaire_{{$opinionaire->user_id}}_{{$opinionaire->title}}</button></a>
    </div>
</div>
@endsection