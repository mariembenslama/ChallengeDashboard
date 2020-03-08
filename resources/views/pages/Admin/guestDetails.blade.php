@extends('layouts.app')
@section('content')

    <h1>Guest's name      : {{$guest->nameGuest}}</h1>
    <h2>Identifier        : {{$guest->idGuest}}</h2>
    <h2>Email             : {{$guest->emailGuest}}</h2>
    <h3>Account created at: {{$guest->createdAt}}</h3>
    <h3>Account updated at: {{$guest->updatedAt}}</h3>

@endsection