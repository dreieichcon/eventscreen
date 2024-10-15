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
        <tr>
            <th>jetzt</th>
            <td>
                Programmpunkt 1<br>
                noch 50 Minuten
            </td>
        </tr>
        <tr>
            <th>danach</th>
            <td>
                Programmpunkt 2<br>
                in 60 Minuten
            </td>
        </tr>
    </table>
</div>
