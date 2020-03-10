@extends('.layouts.app')
@section('content')
@extends('.layouts.inc.messages')

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
                    {!!Form::open(['action' => ['OrganizerController@destroy', $challenge->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                        <a type="button" href="{{$challenge->id}}/edit" class="btn btn-success btn-lg">Edit</a> 
                    {!!Form::close() !!}
                </li><br>
                <br>
                <br>
            @endforeach
            {{$organizerChallenges->links()}}
        </ul>
    @else 
        <p> You didn't create challenge! </p>
    <a href="/createchallenge">Create a challenge.</a>
    @endif

@endsection