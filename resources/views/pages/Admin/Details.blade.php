
@extends('layouts.app')
@section('content')
@include('layouts.inc.messages')
<h2>List of admins</h2>
@if(count($admins) > 0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Identifier</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Account created at</th>
        <th scope="col">Account updated at</th>
        <th scope="col">Role</th>
        <th scope="col">Delete user</th>
      </tr>
    </thead>
    <tbody> 
    @foreach($admins as $admin)
      <tr>
        <th scope="row">{{$admin->id}}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->created_at}}</td>
        <td>{{$admin->updated_at}}</td>
        <td>
        {!! Form::open(['action' => ['AdminController@update', $admin->id], 'method' => 'POST']) !!}
        <div style="float: left;">
        {!!Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])!!}            
        </div>
        <div style="float: right;">
        {{Form::hidden('_method', 'PUT')}}{{Form::submit('Edit', ['class' => 'btn btn-success btn-lg'])}}
        </div>
        </div>
        {!! Form::close() !!}
        </td>
        <td>
        {!!Form::open(['action' => ['AdminController@destroy', $admin->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
        {!!Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

@else 
      <span> No organizers available. </span>
@endif 
<br><br>
<h2>List of organizers</h2>
@if(count($organizers) > 0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Identifier</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Account created at</th>
        <th scope="col">Account updated at</th>
        <th scope="col">Role</th>
        <th scope="col">Delete user</th>
      </tr>
    </thead>
    <tbody> 
    @foreach($organizers as $organizer)
      <tr>
        <th scope="row">{{$organizer->id}}</th>
        <td>{{$organizer->name}}</td>
        <td>{{$organizer->email}}</td>
        <td>{{$organizer->created_at}}</td>
        <td>{{$organizer->updated_at}}</td>
        <td>
        {!! Form::open(['action' => ['AdminController@update', $organizer->id], 'method' => 'POST']) !!}
        <div style="float: left;">
          {!!Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])!!}            
          </div>
          <div style="float: right;">
          {{Form::hidden('_method', 'PUT')}}{{Form::submit('Edit', ['class' => 'btn btn-success btn-lg'])}}
          </div>
          {!! Form::close() !!}
        </td>
        <td>
        {!!Form::open(['action' => ['AdminController@destroy', $organizer->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
        {!!Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

@else 
      <span> No organizers available. </span>
@endif 
<br><br>
<h2>List of participants</h2>
@if(count($participants) > 0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Identifier</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Account created at</th>
        <th scope="col">Account updated at</th>
        <th scope="col">Role</th>
        <th scope="col">Delete user</th>
      </tr>
    </thead>
    <tbody> 
    @foreach($participants as $participant)
      <tr>
        <th scope="row">{{$participant->id}}</th>
        <td>{{$participant->name}}</td>
        <td>{{$participant->email}}</td>
        <td>{{$participant->created_at}}</td>
        <td>{{$participant->updated_at}}</td>
        <td>
        {!! Form::open(['action' => ['AdminController@update', $participant->id], 'method' => 'POST']) !!}
        <div style="float: left;">
          {!!Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])!!}            
          </div>
          <div style="float: right;">
          {{Form::hidden('_method', 'PUT')}}{{Form::submit('Edit', ['class' => 'btn btn-success btn-lg'])}}
          </div>{!! Form::close() !!}
        </td>
        <td>
        {!!Form::open(['action' => ['AdminController@destroy', $participant->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
        {!!Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

@else 
      <span> No participants available. </span>
@endif 
<br><br>
<h2>List of guests</h2>
@if(count($guests) > 0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Identifier</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Account created at</th>
        <th scope="col">Account updated at</th>
        <th scope="col">Role</th>
        <th scope="col">Delete user</th>
      </tr>
    </thead>
    <tbody> 
    @foreach($guests as $guest)
      <tr>
        <th scope="row">{{$guest->id}}</th>
        <td>{{$guest->name}}</td>
        <td>{{$guest->email}}</td>
        <td>{{$guest->created_at}}</td>
        <td>{{$guest->updated_at}}</td>
        <td>
        {!! Form::open(['action' => ['AdminController@update', $guest->id], 'method' => 'POST']) !!}
        <div style="float: left;">
          {!!Form::select('role', array('Participant' => 'Participant', 'Guest' => 'Guest', 'Admin' => 'Admin', 'Organizer' => 'Organizer'), null, ['class' => 'option form-control'])!!}            
          </div>
          <div style="float: right;">
          {{Form::hidden('_method', 'PUT')}}{{Form::submit('Edit', ['class' => 'btn btn-success btn-lg'])}}
          </div>    {!! Form::close() !!}
        </td>
        <td>
        {!!Form::open(['action' => ['AdminController@destroy', $guest->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
        {!!Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

@else 
      <span> No guests available. </span>
@endif 
<br><br>
@endsection