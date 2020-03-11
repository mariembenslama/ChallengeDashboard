@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')

@if(count($challenges) > 0)
    @foreach($challenges as $challenge)
        <h1>Challenge: {{$challenge->title}}</h1>
        <h2 style="color:red">Deadline: {{$challenge->deadline}}</h2><br>
        <h3>Created At: {{$challenge->created_at}}</h3><br>
        @if($challenge->updated_at!=null)
            <h3>[Edited] {{$challenge->updated_at}}</h3><br>
        @endif
        <h4>Description:</h4>
            <p> {{$challenge->description}}</p>
        <h4>Organizer:</h4>
            <p>{{$challenge->name}}</p>
        @if($challenge->role == 'Admin' || $challenge->role == 'Organizer')
            {!!Form::open(['action' => ['ChallengeController@destroy', $challenge->idc], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            <a class="btn btn-success btn-lg" href="{{$challenge->idc}}/edit">Edit this challenge</a>
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
            {!!Form::close() !!}
        @endif
        
        <br>
        <h3> Comments section: </h3>
            @if(count($comments) > 0)
                @foreach($comments as $comment)
                    {!!$comment->comment!!}
                @endforeach
            @else 
                <span> No comments. </span>
            @endif
        <br>
    
        {!! Form::open(['action' => 'CommentController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('Your comment', 'Comment')}}
                {{Form::textarea('comment', '', ['id' => 'textarea', 'class' => 'form-control', 'placeholder' => "Write your comment..."])}}
            </div>
                {{Form::submit('Add comment', ['class' => 'btn btn-success btn-lg'])}}
        {!! Form::close() !!}
    @endforeach
@else 
    <span>No challenges found!</span>
@endif
@endsection