@extends("layouts.main")


@section("content")
    <h1>Hello World</h1>

    Tetetete

    <div class="row">

        @foreach($rooms as $room)
            <x-app.screen.room
                :room="$room"
            />
        @endforeach
    </div>
@endsection
