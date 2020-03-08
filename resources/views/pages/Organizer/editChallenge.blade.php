@extends('.layouts.app')
@section('content')
@extends('.layouts.inc.messages')
    <h1>Edit challenge</h1>
    {!! Form::open(['action' => ['OrganizerController@update', $challenge->idChallenge], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('Challenge title', 'Challenge title')}}
        {{Form::text('title', $challenge->titleChallenge, ['class' => 'form-control', 'placeholder' => "Write the challenge title here..."])}}
    </div>
    <div class="form-group">
        {{Form::label('Description', 'Description')}}
        {{Form::textarea('description', $challenge->descriptionChallenge, ['class' => 'form-control', 'placeholder' => "Write the challenge description here..."])}}
    </div>
    <div class="form-group">
        {{Form::label('Deadline', 'Deadline')}}
        {{Form::date('deadline', $challenge->deadlineChallenge, ['class' => 'date form-control'])}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit challenge', ['class' => 'btn btn-success btn-lg'])}}
    {!! Form::close() !!}
@endsection