@extends('layouts.app')
@section('content')
    <h1>Challenges page</h1>
    @if(count($challenges) > 0)
        <ul class="list-group">
            @foreach ($challenges as $challenge)
                <li class="list-group-item">
                    <span> Challenge: 
                        <a href="/challenges/{{$challenge->id}}">
                        {{$challenge->title}}
                        </a>
                    </span><br>
                    <span>Deadline: {{$challenge->deadline}}</span><br>
                    @if($challenge->status == '1')
                        <span>Status: Ongoing</span><br>
                    @else
                        <span>Status: Closed</span><br>
                    @endif
                    <span>Organizer: {{$challenge->name}}</span><br>
                </li><br>
            @endforeach
            {{-- {{$challenges->links()}} --}}
        </ul>
    @else 
        <p>No Challenges Found!</p>
    @endif
@endsection