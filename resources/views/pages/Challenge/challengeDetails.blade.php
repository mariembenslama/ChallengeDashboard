@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')
    <div class="card" style="width: 100%;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> Challenge: {{$challenge->title}}</li>
            <li class="list-group-item">Deadline: {{$challenge->deadline}}</li>
            <li class="list-group-item">Created At: {{$challenge->created_at}}</li>
        @if($challenge->updated_at!=null)
            <li class="list-group-item">[Edited] {{$challenge->updated_at}}</li>
        @endif
        @if($challenge->status == TRUE)
            <li class="list-group-item">Status: Ongoing</li>
        @else
            <li class="list-group-item">Status: Closed</li>
        @endif
        <li class="list-group-item">Description: {{$challenge->description}}</li>
        <li class="list-group-item">Organizer: {{$challenge->user->name}}</li>
        </ul>
    </div>
    @if($challenge->user->role == 'Admin' || ($challenge->user->role == 'Organizer' && $challenge->user_id == Auth::user()->id))
    <br>
        {!!Form::open(['action' => ['ChallengeController@destroy', $challenge->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
        <a class="btn btn-success btn-lg" href="{{$challenge->id}}/edit">Edit this challenge</a>
        <a class="btn btn-info btn-lg text-white" href="{{$challenge->id}}/codes">Check participants codes</a>
        {!!Form::close() !!}
    @endif

    <br>
        @if(Auth::user()->role == 'Participant')
            @if($challenge->status == TRUE && Carbon\Carbon::now() < $challenge->deadline && count($submit) < 2)
                <a class="btn btn-success btn-lg" href="{{$challenge->id}}/submit">Submit</a>
            @else 
                <button disabled class="btn btn-success btn-lg">Submit</button>
            @endif
            @if(count($submit) != 0)
                <a class="btn btn-info btn-lg text-white" href="{{$challenge->id}}/codes">Check participants codes</a>
            @endif
        @endif
    <br>
        <br>
        <h3> Comments section: </h3>
            @if(count($comments) > 0)
                <ul>
                @foreach($comments as $comment)
                    <li class="list-group-item">- {!!$comment->comment!!}</li>
                @endforeach
                {{$comments->links()}}
                </ul>
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

@endsection