@extends("layouts.admin")

@section("content")
    <?php
    if (isset($panel)) {
        $patch = true;
        $action = "/panel/" . $panel->id;
        $h3 = "edit room $panel->name";
    } else {
        $patch = false;
        $action = "/panel/";
        $h3 = "create new panel";
        $panel = new \App\Models\Panel();
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
                            :model="$panel"
                            attribute="title"
                            required
                        />
                        <x-app.form.input-new
                            :model="$panel"
                            attribute="host"
                        />
                        <x-app.form.input-new
                            :model="$panel"
                            attribute="type"
                        />
                        <x-app.form.input-new
                            :model="$panel"
                            attribute="start"
                            type="datetime-local"
                            required
                        />
                        <x-app.form.input-new
                            :model="$panel"
                            attribute="end"
                            type="datetime-local"
                            required
                        />
                        <x-app.form.textarea-new
                            :model="$panel"
                            attribute="description"
                        />

                        <label class="col-form-label" for="room_id">room</label>
                        <select class="form-control" id="room_id" name="room_id" required>
                            @if(!$patch)
                                <x-app.form.option.placeholder/>
                            @endif
                            @foreach($rooms as $room)
                                <option
                                    @if($room->id == $panel->room_id)
                                        selected
                                    @endif
                                    value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
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
