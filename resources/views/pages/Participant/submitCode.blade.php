@extends('.layouts.app')
@section('content')
@extends('layouts.inc.messages')
<h1>Submit your code</h1>
    {!! Form::open(['action' => ['ParticipantController@store', $id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::textarea('code', '', ['class' => 'form-control', 'placeholder' => "Write your code here..."])}}
    </div>
        {{Form::hidden('_method', 'POST')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg'])}}
    {!! Form::close() !!}
@endsection
