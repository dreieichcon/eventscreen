<?php
    if(!isset($room)){
        $room = new \App\Models\Room(); //for autocompletion to work in IDE
    }
    ?>
<div class='col-3' style="border:1px solid red" {{ $attributes }}>
    <h4>
        {{ $room->name }}
        @if($room->wheelchair)
            <span class="fas fa-wheelchair"></span>
        @endif
    </h4>

    <table class="table table-sm">

        <?php
            $panels = $room->panel->sortBy("start");
            $current_panel = new \App\Models\Panel();
            $next_panel = new \App\Models\Panel();
            $now = \Carbon\Carbon::now();
            for($i = 0; $i < count($panels); $i++){
                $tmp_panel = $panels[$i];
                if($tmp_panel->active){
                    //this is the active panel
                    $current_panel = $tmp_panel;
                    if(isset($panels[$i+1])){
                        $next_panel = $panels[$i+1];
                    }
                }
            }
            ?>
        <tr>
            <th>jetzt</th>
            <td>
                {{ $current_panel->title }}<br>
                @if(!is_null($current_panel->end))
                    endet {{ $current_panel->end->diffForHumans() }}
                @endif
            </td>
        </tr>
        <tr>
            <th>danach</th>
            <td>
                {{ $next_panel->title }}<br>
                @if(!is_null($next_panel->end))
                    beginnt {{ $next_panel->start->diffForHumans() }}
                @endif
            </td>
        </tr>
    </table>
</div>
