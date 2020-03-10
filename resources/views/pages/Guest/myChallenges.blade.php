@extends('.layouts.app')

@section('content')

    @if(count($guestChallenges) > 0)
        <ul class="list-group">
            @foreach ($guestChallenges as $challenge)
                <li class="list-group-item">
                    {{-- Get All My challenges --}}
                    <p>My challenges</p>
                    <span> Challenge: 
                        <a href="/challenges/{{$challenge->idC}}">
                        {{$challenge->title}}
                        </a>
                    </span><br>
                    <span>My code           : {{$challenge->codeParticipant}}</span><br>
                    <span>Date of submission: {{$challenge->submittedAt}}</span><br>
                    <span>Organizer: {{$challenge->id}}</span><br>
                </li><br>
            @endforeach
            {{$guestChallenges->links()}}
        </ul>
    @else 
        <p> You didn't participate in any challenge! </p>
        <a href="/challenges">Check available challenges</a>
    @endif

@endsection