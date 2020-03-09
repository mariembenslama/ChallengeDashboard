@extends('.layouts.app')
@section('content')

    @if(count($organizers) > 0)
        @foreach($organizers as $organizer)
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/listorganizers/{{$organizer->idOrganizer}}">
                        {{$organizer->nameOrganizer}}
                    </a>
                </li>
            </ul>
        @endforeach
    @else 
     <p> No organizers found! </p>
    @endif

@endsection