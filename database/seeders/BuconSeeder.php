<?php

namespace Database\Seeders;

use App\Models\Panel;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BuconSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            "Lichtsaal",
            "Saletta",
            "C4",
            "Raum der Wünsche",
            "Basement",
            "C1",
            "C3",
            "Kegelbahn",
            "C2"
        ];

        foreach($rooms as $room) {
            Room::create([
                "name" => $room,
            ]);
        }


        //load tsv
        $path = "database/seeders/data/";
        $file = "bucon2.tsv";

        if (is_file($path . $file)) {
            $this->command->info("file $file found\n");
        } else {
            $this->command->warn( "file $file not found. Aborting.");
            die;
        }
        //load file
        $data = file_get_contents($path . $file);

        // start	end	room	title	content_note	host	type
        foreach(explode("\n", $data) as $line) {
            $line_ = explode("\t", $line);
            //skip first line
            if($line_[0] == "start"){
                continue;
            }

            //find room
            $room = Room::where('name', $line_[2])->first();
            if(is_null($room)) {
                $room = Room::create([
                    "name" => $line_[2],
                ]);
            }

            $start = Carbon::create("18.10.2024 " . $line_[0]);
            $end = Carbon::create("18.10.2024 " . $line_[1]);

            Panel::create([
                "start" => $start,
                "end" => $end,
                "room_id" => $room->id,
                "title" => $line_[3],
                "content_note" => $line_[4],
                "host" => $line_[5],
                "type" => $line_[6],
            ]);
        }
    }
}
