@extends('layouts.app')
@include('layouts.inc.messages')
@section('content')
@foreach($challenge as $title)
    <h1>Challenge: {{$title->title}}</h1>
@endforeach
@if(count($codes) > 0)
    <h2>Participants:</h2>
    @foreach($codes as $code)
       <span>User identifier: {{$code->user_id}}</span><br>
       <p>{{$code->code}}</p><br>
       {!!Form::open(['action' => ['ParticipantController@update', $code->user_id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'PATCH')}}
            <div style="visibility:hidden">{{Form::text('winner', true)}}</div>
            {{Form::submit('Decide winner', ['class' => 'btn btn-success btn-lg'])}}
        {!!Form::close() !!}

       <hr>

    @endforeach
@else 
    <span>No codes submitted.</span>
@endif
@endsection