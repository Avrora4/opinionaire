@extends('layouts.app')

@section('content')
<h1>{{$user->name}}'s page</h1>
<br>
<br>
    {{$user->name}}
<br>
    {{$user->email}}
<br>
<br>
    <div class="CREATE">
    <a href="/opinionaire_create"><button>CREATE</button></a>
    </div>

<br>

    <div class="ANSWER">
    <a href="/opinionaire_answer"><button>ANSWER</button></a>
    </div>

<br>

    <div class="DELETE">
    <a href="/opinionaire_delete"><button>DESTROY</button></a>
    </div>


@endsection


