@extends("layouts.main")


@section("content")
    <div class="main-content">
        <div class="d-flex flex-row w-100 justify-content-between large-text">
            <div>BuchmesseCon 2024 Programm</div>
            <div id="clock-time">10:00</div>
        </div>
        <div class="spacer"></div>
        <div class="sub-content">
            @foreach($rooms as $room)
                <x-app.screen.room
                    :room="$room"
                />
            @endforeach
        </div>
    </div>
@endsection
