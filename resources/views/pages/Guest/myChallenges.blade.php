@extends('.layouts.app')

@section('content')

    @if(count($guestChallenges) > 0)
        <ul class="list-group">
            @foreach ($guestChallenges as $challenge)
                <li class="list-group-item">
                    {{-- Get All My challenges --}}
                    <p>My challenges</p>
                    <span> Challenge: 
                        <a href="/challenges/{{$challenge->challenge_id}}">
                            {{$challenge->title}}
                        </a>
                        {{$challenge->description}}
                    </span><br>
                    <span>My code           : {{$challenge->code}}</span><br>
                    <span>Date of submission: {{$challenge->submitted_at}}</span><br>
                    <span>Organizer: {{$challenge->organizer_id}}</span><br>
                </li><br>
            @endforeach
        </ul>
    @else 
        <p> You didn't participate in any challenge! </p>
        <a href="/challenges">Check available challenges</a>
    @endif

@endsection