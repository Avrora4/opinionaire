@extends('layouts.app')

@section('content')
<form method="POST" action="http://localhost:8000/me">
    @csrf
    <input type="text" value="{{ $user->name }}" />
    <button type="submit" >Change</button>
</form>
@endsection