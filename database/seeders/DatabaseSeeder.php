<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if(config("app.env") == "local"){
            $password = "password";
        }else{
            $password = Str::password(12);
        }

        $admin = User::create([
            "name" => "super-admin",
            "email" => "admin@example.org",
            "password" => Hash::make($password),
        ]);
        $this->command->info("  created super-admin $admin->email with password '$password'");

        $this->call([
            BuconSeeder::class,
        ]);
    }
}
