<?php

namespace Database\Seeders;

use App\Models\Room;
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

        $ls = Room::create(["name" => "Lichtsaal"]);
        $sal = Room::create(["name" => "Saletta"]);

        $rdw = Room::create(["name" => "Raum der Wünsche"]);
        $bm = Room::create(["name" => "Basement"]);
        $kb = Room::create(["name" => "Kegelbahn"]);
        $c1 = Room::create(["name" => "C1"]);
        $c2 = Room::create(["name" => "C2"]);
        $c3 = Room::create(["name" => "C3"]);
        $c4 = Room::create(["name" => "C4"]);


        $start_date = "19.10.2024";

        $time = "11:00 Uhr";

        
    }
}
