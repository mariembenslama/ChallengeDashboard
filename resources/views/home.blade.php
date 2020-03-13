@extends('layouts.app')
@section('content')
            {{-- @foreach($role as $r) --}}
                @if($user->role != 'Participant')
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
                            @foreach ($ongoing as $challenge)
                                <div class="card" style="width: 100%;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Challenge: 
                                            <a href="/challenges/{{$challenge->id}}">
                                            {{$challenge->title}}
                                            </a>
                                    </li>
                                        <li class="list-group-item">Deadline: {{$challenge->deadline}}</li>
                                        @if($challenge->status == TRUE)
                                            <li class="list-group-item">Status: Ongoing</li>
                                        @else
                                            <li class="list-group-item">Status: Closed</li>
                                        @endif
                                        <li class="list-group-item">Organizer: {{$challenge->user->name}}</li>
                                </ul>
                                </div>
                                <br><br>
                            @endforeach
                            {{$ongoing->links()}}
                    @else 
                        <span>There are no ongoing challenges.</p>
                    @endif
                @endif
            {{-- @endforeach --}}
@endsection
