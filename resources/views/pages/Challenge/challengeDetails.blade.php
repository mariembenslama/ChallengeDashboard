@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')

    <h1>Challenge: {{$challenge->titleChallenge}}</h1>
    <h2 style="color:red">Deadline: {{$challenge->deadline}}</h2><br>
    <h3>Created At: {{$challenge->created_at}}</h3><br>
    @if($challenge->modifiedAt!=null)
        <h3>[Edited] {{$challenge->modified_at}}</h3><br>
    @endif
    <h4>{{$challenge->description}}</h4>
    @foreach($organizer as $o)
        <h4>Organizer name: {{$o->name}}</h4>
    @endforeach
    <br>
    <h3> Comments section: </h3>
        {{-- @if(count($comments) > 0)
            @foreach($comments as $comment)
                {!!$comment->nameNonGuest!!}
                <br>
                {!!$comment->comment!!}
            @endforeach
        @endif    --}}
    <br>
    {!! Form::open(['action' => 'ChallengeController@store', 'method' => 'POST']) !!}
        <span style="visibility: hidden">{{Form::text('idChallenge', $challenge)}}</span>
        <div class="form-group">
            {{Form::label('Your name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => "Write your name... "])}}
        </div>
        <div class="form-group">
            {{Form::label('Your email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => "Write your email..."])}}
        </div>
        <div class="form-group">
            {{Form::label('Your comment', 'Comment')}}
            {{Form::textarea('comment', '', ['id' => 'textarea', 'class' => 'form-control', 'placeholder' => "Write your comment..."])}}
        </div>
            {{Form::submit('Add comment', ['class' => 'btn btn-success btn-lg'])}}
    {!! Form::close() !!}
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('textarea');
    </script>    
@endsection