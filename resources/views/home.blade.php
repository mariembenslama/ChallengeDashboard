@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($role as $r)
                @if($r->role != 'Participant')
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div>
                @else 
                    <h1>Ongoing challenges</h1>
                    @if(count($ongoing) > 0)
                        <ul class="list-group">
                            @foreach ($ongoing as $challenge)
                                <li class="list-group-item">
                                    <span> Challenge: 
                                        <a href="/challenges/{{$challenge->id}}">
                                        {{$challenge->title}}
                                        </a>
                                    </span><br>
                                    <span>Deadline: {{$challenge->deadline}}</span><br>
                                    @if($challenge->status == '1')
                                        <span>Status: Ongoing</span><br>
                                    @else
                                        <span>Status: Closed</span><br>
                                    @endif
                                    <span>Organizer: {{$challenge->name}}</span><br>
                                </li><br>
                            @endforeach
                        </ul>
                    @else 
                        <span>There are no ongoing challenges.</p>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
