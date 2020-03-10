@extends('.layouts.app')
@section('content')
@extends('.layouts.inc.messages')

    <h1>Create a challenge</h1>
    {!! Form::open(['action' => 'ChallengeController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('Challenge title', 'Challenge title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => "Write the challenge title here..."])}}
    </div>
    <div class="form-group">
        {{Form::label('Description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => "Write the challenge description here..."])}}
    </div>
    <div class="form-group">
        {{Form::label('Deadline', 'Deadline')}}
        {{Form::date('deadline', '', ['class' => 'date form-control'])}}
    </div>

        {{Form::submit('Create challenge', ['class' => 'btn btn-primary btn-lg'])}}
    {!! Form::close() !!}
@endsection