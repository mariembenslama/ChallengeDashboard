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
        @if($challenge->status == TRUE)
            <h3>Status: Ongoing</h3><br>
        @else
            <h3>Status: Closed</h3><br>
        @endif
        <h4>Description:</h4>
            <p> {{$challenge->description}}</p>
        <h4>Organizer:</h4>
            <p>{{$challenge->name}}</p>
        @if($challenge->role == 'Admin' || ($challenge->role == 'Organizer' && $challenge->organizer_id == Auth::user()->id))
            {!!Form::open(['action' => ['ChallengeController@destroy', $challenge->idc], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
            <a class="btn btn-success btn-lg" href="{{$challenge->idc}}/edit">Edit this challenge</a>
            <a class="btn btn-info btn-lg" href="{{$challenge->idc}}/codes">Check codes participants</a>
            {!!Form::close() !!}
        @endif
        @if($challenge->role == 'Participant')
            @if(($challenge->status == TRUE || Carbon\Carbon::now() < $challenge->deadline) && count($submit) < 2)
                <a class="btn btn-success btn-lg" href="{{$challenge->id}}/submit">Submit</a>
            @else 
                <button disabled class="btn btn-success btn-lg">Submit</button>
            @endif
        @endif
        <br>
        <h3> Comments section: </h3>
            @if(count($comments) > 0)
                @foreach($comments as $comment)
                    <span>- {!!$comment->comment!!}</span><br>
                @endforeach
            @else 
                <span> No comments. </span>
            @endif
        <br>
    
        {!! Form::open(['action' => ['CommentController@store'], 'method' => 'POST']) !!}
            <div class="form-group">
                <div style="visibility:hidden">
                    {{Form::text('idc', $challenge->id)}}
                </div>
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