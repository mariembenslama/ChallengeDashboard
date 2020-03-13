@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')
<h1>Challenge: {{$challenge->title}}</h1>
@if(count($codes) > 0)
    <h2>Participants:</h2>
    @foreach($codes as $code)
       <span>User identifier: {{$code->user_id}}</span><br>
       <p>Code: <br>{{$code->code}}</p><br>
       @if($code->winner == 1)
            <p>Winner of this challenge.</p>
       @endif
       {!!Form::open(['action' => ['ParticipantController@update', $code->user_id], 'method' => 'POST'])!!}
            <div style="visibility:hidden">{{Form::text('winner', true)}}</div>
            {{Form::hidden('_method', 'PATCH')}}
            {{Form::submit('Decide winner', ['class' => 'btn btn-success btn-lg'])}}
        {!!Form::close() !!}
       <hr>
    @endforeach
    {{$codes->links()}}
@else 
    <span>No codes submitted.</span>
@endif
@endsection