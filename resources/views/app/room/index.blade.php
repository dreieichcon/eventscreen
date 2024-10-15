@extends("layouts.admin")

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rooms</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Programm</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>

                                    {{ $room->name }}
                                    @if($room->wheelchair)
                                        <span class="fas fa-wheelchair"></span>
                                    @endif
                                    <x-app.admin.edit href="/room/{{$room->id}}/edit"/>
                                </td>
                                <td>
                                    <table class="table table-striped table-sm">
                                        <tbody>
                                        @foreach($room->panel->sortBy("start") as $panel)
                                            <tr>
                                                <th>{{ $panel->name }}</th>
                                                <td>{{ $panel->start->format("d.m. H:i") }}</td>
                                                <td>{{ $panel->end->format("d.m. H:i") }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <x-app.admin.button href="/room/create" />
                </div>
            </div>
        </div>
    </div>


@endsection
