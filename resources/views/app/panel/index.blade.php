@extends("layouts.admin")

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Panels</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Start</th>
                            <th>End</th>
                            <th>Room</th>
                            <th>Title</th>
                            <th>Host</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($panels as $panel)

                            <tr>
                                <td>
                                   <span style="display:none">{{ $panel->start }}</span>
                                    {{ $panel->start->format("d.m. H:i") }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $panel->end }}</span>
                                    {{ $panel->end->format("d.m. H:i") }}
                                </td>
                                <td>
                                    {{ $panel->room->name }}
                                    @if($panel->room->wheelchair)
                                        <span class="fas fa-wheelchair"></span>
                                    @endif
                                    <x-app.admin.edit href="/room/{{$panel->room->id}}/edit"/>
                                </td>
                                <td>

                                    @if($panel->active)
                                        ACTIVE
                                    @endif
                                    {{ $panel->title }}
                                    <x-app.admin.edit href="/panel/{{ $panel->id }}/edit"/>
                                </td>
                                <td>
                                    {{ $panel->host }}
                                </td>
                                <td>
                                    {{ $panel->type }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <x-app.admin.button href="/panel/create" />
                </div>
            </div>
        </div>
    </div>


@endsection
