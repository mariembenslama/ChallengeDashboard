@extends('layouts.app')
@extends('layouts.inc.messages')
@section('content')
<h1>Details</h1>
<h2>List of admins:</h2>
@if(count($admins) > 0)
    @foreach($admins as $admin)
        <span>Identifier        : {{$admin->id}}</span><br>
        <span>Name              : {{$admin->name}}</span><br>
        <span>Email             : {{$admin->email}}</span><br>
        <span>Role              : {{$admin->role}}</span><br>
        <span>Email             : {{$admin->email}}</span><br>
        <span>Account created at: {{$admin->created_at}}</span><br>
        <span>Account updated at: {{$admin->updated_at}}</span><br>
        <span>Account deleted at: {{$admin->deleted_at}}</span><br>
        
        {!! Form::open(['action' => ['AdminController@update', $admin->id], 'method' => 'POST']) !!}
            {{Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])}}            
            <br>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Edit Authority', ['class' => 'btn btn-success btn-lg'])}}
        {!! Form::close() !!}
        {!!Form::open(['action' => ['AdminController@destroy', $admin->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete user', ['class' => 'btn btn-danger btn-lg'])}}
        {!!Form::close() !!}
        <hr>
    @endforeach
@else 
    <span>List of admins empty.</span>
@endif
<br>
<h2>List of organizers:</h2>
@if(count($organizers) > 0)
    @foreach($organizers as $organizer)
        <span>Identifier        : {{$organizer->id}}</span><br>
        <span>Name              : {{$organizer->name}}</span><br>
        <span>Email             : {{$organizer->email}}</span><br>
        <span>Role              : {{$organizer->role}}</span><br>
        <span>Email             : {{$organizer->email}}</span><br>
        <span>Account created at: {{$organizer->created_at}}</span><br>
        <span>Account updated at: {{$organizer->updated_at}}</span><br>
        <span>Account deleted at: {{$organizer->deleted_at}}</span><br>
        
        {!! Form::open(['action' => ['AdminController@update', $organizer->id], 'method' => 'POST']) !!}
            {{Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])}}            
            <br>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Edit Authority', ['class' => 'btn btn-success btn-lg'])}}
        {!!Form::close() !!}
        {!!Form::open(['action' => ['AdminController@destroy', $organizer->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete user', ['class' => 'btn btn-danger btn-lg'])}}
        {!! Form::close() !!}
        <hr>
    @endforeach
@else 
    <span>List of organizers empty.</span>
@endif
<br>
<h2>List of participants:</h2>
@if(count($participants) > 0)
    @foreach($participants as $participant)
        <span>Identifier        : {{$participant->id}}</span><br>
        <span>Name              : {{$participant->name}}</span><br>
        <span>Email             : {{$participant->email}}</span><br>
        <span>Role              : {{$participant->role}}</span><br>
        <span>Email             : {{$participant->email}}</span><br>
        <span>Account created at: {{$participant->created_at}}</span><br>
        <span>Account updated at: {{$participant->updated_at}}</span><br>
        <span>Account delete+d at: {{$participant->deleted_at}}</span><br>
        
        {!! Form::open(['action' => ['AdminController@update', $participant->id], 'method' => 'POST']) !!}
            {{Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])}}            
            <br>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Edit Authority', ['class' => 'btn btn-success btn-lg'])}}
        {!!Form::close() !!}
        {!!Form::open(['action' => ['AdminController@destroy', $participant->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete user', ['class' => 'btn btn-danger btn-lg'])}}
        {!! Form::close() !!}
        <hr>
    @endforeach
@else 
    <span>List of participants empty.</span>
@endif
<br>
<h2>List of guests:</h2>
@if(count($guests) > 0)
    @foreach($guests as $guest)
        <span>Identifier        : {{$guest->id}}</span><br>
        <span>Name              : {{$guest->name}}</span><br>
        <span>Email             : {{$guest->email}}</span><br>
        <span>Role              : {{$guest->role}}</span><br>
        <span>Email             : {{$guest->email}}</span><br>
        <span>Account created at: {{$guest->created_at}}</span><br>
        <span>Account updated at: {{$guest->updated_at}}</span><br>
        <span>Account deleted at: {{$guest->deleted_at}}</span><br>
        
        {!! Form::open(['action' => ['AdminController@update', $guest->id], 'method' => 'POST']) !!}
            {{Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])}}            
            <br>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Edit Authority', ['class' => 'btn btn-success btn-lg'])}}
        {!!Form::close() !!}
        {!!Form::open(['action' => ['AdminController@destroy', $guest->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete user', ['class' => 'btn btn-danger btn-lg'])}}
        {!! Form::close() !!}
        <hr>
    @endforeach
@else 
    <span>List of guests empty.</span>
@endif
<br>
@endsection