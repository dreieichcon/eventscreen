@extends("layouts.admin")

@section("content")
    <?php
    if (isset($room)) {
        $patch = true;
        $action = "/room/" . $room->id;
        $h3 = "edit room $room->name";
    } else {
        $patch = false;
        $action = "/room/";
        $h3 = "create new room";
        $room = new \App\Models\Room();
    }
    ?>

    <div class="row">
        <div class="col-12">
            <form action="{{ $action }}" method="POST">
                @csrf
                @if($patch)
                    @method('PATCH')
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $h3 }}</h3>
                    </div>
                    <div class="card-body">
                        <x-app.form.input-new
                            :model="$room"
                            attribute="name"
                            required
                        />
                        <x-app.form.checkbox
                            name="wheelchair"
                            value="{{ $room->wheelchair }}"
                            label="Wheelchair accessible"
                            class="mt-2"
                        />
                    </div>
                    <div class="card-footer">
                        <x-app.form.submit/>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($patch)
        <x-app.admin.delete_section
            name="Room"
            action="/room/{{$room->id}}"
        />
    @endif
@endsection
