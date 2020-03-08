@extends('layouts.app')
@section('content')

    <h1>Guest's name      : {{$guest->nameGuest}}</h1>
    <h2>Identifier        : {{$guest->idGuest}}</h2>
    <h2>Email             : {{$guest->emailGuest}}</h2>
    <h3>Account created at: {{$guest->created_at}}</h3>
    <h3>Account updated at: {{$guest->updated_at}}</h3>
    <br>
    <button class="btn btn-danger btn-lg">Delete</button>
@endsection