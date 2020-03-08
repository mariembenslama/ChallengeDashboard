@extends('layouts.app')
@section('content')
    <h1>Challenges page</h1>
    @if(count($challenges) > 0)
        <ul class="list-group">
            @foreach ($challenges as $challenge)
        <li class="list-group-item">
            <span> Challenge: 
                <a href="/challenges/{{$challenge->idChallenge}}">
                {{$challenge->titleChallenge}}
                </a>
            </span><br>
            <span>Deadline: {{$challenge->deadlineChallenge}}</span><br>
            <span>Status: {{$challenge->statusChallenge}}</span><br>
            <span>Organizer: {{$challenge->idOrganizer}}</span><br>
        </li><br>
            @endforeach
            {{$challenges->links()}}
        </ul>
    @else 
        <p>No Challenges Found!</p>
    @endif
@endsection