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
    <a href="{{route('my_opinionaire')}}"><button class="btn btn-primary">LIST</button></a>
    </div>


@endsection


