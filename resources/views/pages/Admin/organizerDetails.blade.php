@extends('layouts.app')
@section('content')

    <h1>Organizer's name  : {{$organizer->name}}</h1>
    <h2>Identifier        : {{$organizer->id}}</h2>
    <h2>Email             : {{$organizer->email}}</h2>
    <h3>Account created at: {{$organizer->created_at}}</h3>
    <h3>Account updated at: {{$organizer->updated_at}}</h3>
    <br>
    @if(count($organizerChallenges) > 0)
    <ul class="list-group">
        @foreach ($organizerChallenges as $challenge)
            <li class="list-group-item">
                <span> Challenge: 
                        <a href="/challenges/{{$challenge->id}}">
                        {{$challenge->title}}
                        </a>
                    </span><br>
                    <span>Deadline: {{$challenge->deadline}}</span><br>
                    <span>Status: {{$challenge->status}}</span><br>
            </li><br>        
        @endforeach
        {{$organizerChallenges->links()}}
    </ul>
    @else 
        <p>{{$organizer->name create any challenges.</p>
    @endif
    <button class="btn btn-danger btn-lg">Delete</button>
@endsection