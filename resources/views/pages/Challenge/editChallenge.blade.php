@extends('.layouts.app')
@section('content')
@extends('.layouts.inc.messages')
    <h1>Edit challenge</h1>
    @foreach($challenges as $challenge)
    {!! Form::open(['action' => ['ChallengeController@update', $challenge->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('Challenge title', 'Challenge title')}}
        {{Form::text('title', $challenge->title, ['class' => 'form-control', 'placeholder' => "Write the challenge title here..."])}}
    </div>
    <div class="form-group">
        {{Form::label('Description', 'Description')}}
        {{Form::textarea('description', $challenge->description, ['class' => 'form-control', 'placeholder' => "Write the challenge description here..."])}}
    </div>
    <div class="form-group">
        {{Form::label('Deadline', 'Deadline')}}
        {{Form::date('deadline', $challenge->deadline, ['class' => 'date form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('Status', 'Status')}}
        {{Form::select('status', array(true => 'Ongoing', false => 'Closed'), null, ['class' => 'option form-control'])}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit challenge', ['class' => 'btn btn-success btn-lg'])}}
    {!! Form::close() !!}
    @endforeach
@endsection