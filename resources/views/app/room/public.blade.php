@extends("layouts.main")


@section("content")

    <div class="main-content">
        <div class="d-flex flex-row w-100 justify-content-between large-text">
            <div>{{ $room->name }}</div>
            <div id="clock-time">10:00</div>
        </div>
        <div class="spacer"></div>
        <div class="sub-content">

            <div class="panel-wrapper eh2">

                <div class="program-body">
                    @php($now = \Carbon\Carbon::now())
                    <table class="table table-sm">
                        @foreach($room->panel->sortBy("start") as $panel)
                            @if($panel->end < $now)
                                @continue(1)
                            @endif
                            <tr>
                                <th style="width: 15%">
                                    <h4>
                                        {{ $panel->start->format("H:i") }} bis {{ $panel->end->format("H:i") }}
                                    </h4>
                                </th>
                                <td>
                                    <h4>
                                        {{ $panel->title }}
                                    </h4>
                                    <h5>
                                        {{ $panel->host }}
                                    </h5>
                                    <i>{{ $panel->type }}</i>

                                </td>
                                <td>
                                    <h4>
                                        @if(!is_null($panel->content_note) && strlen($panel->content_note) > 0 )
                                            Content-Note:<br>
                                            {{ $panel->content_note }}
                                        @endif
                                    </h4>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
