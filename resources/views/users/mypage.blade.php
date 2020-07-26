@extends('layouts.app')

@section('content')
<div class="title">
    <h1>{{$user->name}}'s page</h1>
</div>
<div class="User_information">
    <p>{{$user->name}}</p>

    <p>{{$user->email}}</p>
    <p></p>
    <div class="btn card-body">
    <a href="/opinionaire_create"><button class="btn btn-info">CREATE</button></a>
    <p></p>
    <a href="/opinionaire_answer"><button class="btn btn-light">ANSWER</button></a>
    <p></p>
    <a href="/opinionaire_delete"><button class="btn btn-warning">DELETE</button></a>
    <p></p>
    <a href="/opinionaire/{id}/result"><button class="btn btn-primary">RESULT</button></a>
    </div>


@endsection


