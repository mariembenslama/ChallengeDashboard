@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')
<h1>{{$challenge->title}}</h1>
<br>
@if(Auth::user()->role == 'Organizer' || Auth::user()->role == 'Admin')
    @if(count($codes) > 0)
        <h4>Participants</h4>
        @foreach($codes as $code)
        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">User identifier: {{$code->user_id}}</li>
            <li class="list-group-item">Code: <br>{{$code->code}}</li>
            @if($code->winner == 1)
                    <li style="" class="list-group-item">Winner of this challenge.</li>
            @endif
            </ul>
        </div>
        {!!Form::open(['action' => ['ParticipantController@update', $code->user_id], 'method' => 'POST'])!!}
            <div style="visibility:hidden">{{Form::text('winner', true)}}</div>
            {{Form::hidden('_method', 'PATCH')}}
            {{Form::submit('Decide winner', ['class' => 'btn btn-success btn-lg'])}}
        {!!Form::close() !!}
        <br>
        @endforeach
        {{$codes->links()}}
    @else 
    <div class="card" style="width: 100%;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">No codes submitted.</li>
        </ul>
    </div>
    @endif
@endif
@if(Auth::user()->role == 'Participant')
    @if(count($winners) > 0)
        @foreach($winners as $code)
        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Winner of this challenge's code:</li>
                <li class="list-group-item">{{$code->code}}</li>
            </ul>
        </div>
        <br>
        @endforeach
    @else
    <div class="card" style="width: 100%;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">The winner of this challenge isn't yet decided.</li>
        </ul>
    </div>
    @endif
@endif
@endsection