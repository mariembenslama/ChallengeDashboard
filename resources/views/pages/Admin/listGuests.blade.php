@extends('.layouts.app')
@section('content')

    @if(count($guests) > 0)
        @foreach($guests as $guest)
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/listguests/{{$guest->idGuest}}">
                        {{$guest->nameGuest}}
                    </a>
                </li>
            </ul>
        @endforeach
    @else 
            <p> No guests found! </p>
    @endif

@endsection