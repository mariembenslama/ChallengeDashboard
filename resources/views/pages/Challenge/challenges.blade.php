@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')
            <h1>Challenges page</h1>
                @if(count($challenges) > 0)
                    @foreach ($challenges as $challenge)
                    <div class="card" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                    <a href="/challenges/{{$challenge->id}}">
                                    {{$challenge->title}}
                                    </a>
                            </li>
                            <li class="list-group-item">Deadline: {{$challenge->deadline}}</li>
                                <li class="list-group-item">Organizer: {{$challenge->user->name}}</li>
                                @if($challenge->status == TRUE)
                                    <li class="list-group-item">Status: Ongoing</li>
                                @else
                                    <li class="list-group-item">Status: Closed</li>
                                @endif      
                        </ul>    
                    </div>          
                    <br>    
                    @endforeach
                    {{$challenges->links()}}
                    <br>

                        {{-- {{$challenges->links()}} --}}
                @else 
                    <p>No Challenges Found!</p>
                @endif
   
            <br>
            @if($user->role == 'Admin' || $user->role == 'Organizer')
                <a class="btn btn-primary btn-lg" href="challenges/create">Create a challenge</a>
            @endif

            <style>
                button:disabled,
                button[disabled]{
                border: 1px solid #999999;
                background-color: #cccccc;
                color: #666666;
                }
            </style>
@endsection