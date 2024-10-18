<?php
if (!isset($room)) {
    $room = new \App\Models\Room(); //for autocompletion to work in IDE
}

$now = \Carbon\Carbon::now();
$panels = $room->panel->sortBy('start');
$current_panel = $panels->firstWhere('active', true) ?? new \App\Models\Panel();
$next_panel = $panels->skipUntil(fn($panel) => $panel->active)->skip(1)->first() ?? new \App\Models\Panel();

?>


<div class="program-wrapper eh2">
    <a href="/r/{{$room->id}}">
        <div class="program-header">
            <div>
                {{ $room->name }}
            </div>
            <div>
                @if($room->wheelchair)
                    <span class="fas fa-wheelchair"></span>
                @endif
            </div>
        </div>
    </a>
    <div class="program-body">
        <table class="table table-sm">
            <tr>
                <th style="width: 15%">

                    @if(!is_null($current_panel->end))
                        <h4>bis<br>{{ $current_panel->end->format("H:i") }}</h4>
                    @endif


                </th>
                <td>
                    <h4>
                        {{ $current_panel->title }}<br>
                        <i>{{ $current_panel->host }}</i><br>
                        @if(!is_null($current_panel->end))

                        @endif
                    </h4>
                </td>
            </tr>
            <tr>
                <th>
                    @if(!is_null($next_panel->start))
                        <h4>ab<br>{{ $next_panel->start->format("H:i") }}</h4>
                    @endif
                </th>
                <td>
                    <h4>
                        {{ $next_panel->title }}<br>
                        <i>{{ $next_panel->host }}</i><br>

                    </h4>
                </td>
            </tr>
        </table>
    </div>

</div>


