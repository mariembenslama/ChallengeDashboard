@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')
<h1>{{$challenge->title}}</h1>
@if(Auth::user()->role == 'Organizer' || Auth::user()->role=='Admin')
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
@endif
@if(Auth::user()->role == 'Participant')
    @if(count($codes) > 0)
        @foreach($codes as $code)
            @if($code->winner == true)
                <span>Winner of this challenge's code:</span><br>
                <p>{{$code->code}}</p><br>
            @else 
                <span>The winner of this challenge isn't yet decided.</span>
            @endif
        @endforeach
    @endif
@endif
@endsection