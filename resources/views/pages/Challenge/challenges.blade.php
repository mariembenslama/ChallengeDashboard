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
                            <span>Organizer: {{$challenge->name}}</span><br>
                            @if($challenge->status == TRUE)
                                <span>Status: Ongoing</span><br>
                            @else
                                <span>Status: Closed</span><br>
                            @endif
                        </li><br>
                    
                    @endforeach
                    {{-- {{$challenges->links()}} --}}
                </ul>
            @else 
                <p>No Challenges Found!</p>
            @endif
            @foreach($user as $u)
                @if($u->role == 'Admin' || $u->role == 'Organizer')
                    <a class="btn btn-primary btn-lg" href="challenges/create">Create a challenge</a>
                @endif
            @endforeach

            <style>
                button:disabled,
                button[disabled]{
                border: 1px solid #999999;
                background-color: #cccccc;
                color: #666666;
                }
            </style>
@endsection