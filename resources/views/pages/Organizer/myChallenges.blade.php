@extends('.layouts.app')

@section('content')

    @if(count($organizerChallenges) > 0)
        <ul class="list-group">
            @foreach ($organizerChallenges as $challenge)
                <li class="list-group-item">
                    <span> Challenge: 
                        <a href="/challenges/{{$challenge->idChallenge}}">
                        {{$challenge->titleChallenge}}
                        </a>
                    </span><br>
                    <span>Deadline: {{$challenge->deadlineChallenge}}</span><br>
                    <span>Status: {{$challenge->statusChallenge}}</span><br>

                    <a type="button" href="{{$challenge->idChallenge}}/edit" class="btn btn-success btn-lg">Edit</a> 
                    <a type="button" class="btn btn-danger btn-lg">Delete</a>
                </li><br>
                <br>
                <br>

            @endforeach
            {{$organizerChallenges->links()}}
        </ul>
    @else 
        <p> You didn't create challenge! </p>
        <a href="/challenges/createchallenge">Create a challenge.</a>
    @endif

@endsection