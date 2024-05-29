<?php

namespace Database\Seeders\pkg_validations;
use App\Models\pkg_validations\Message; // Ensure you have the Message model created
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Message::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_validations/messages.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
                    if (!$firstline) {
                Message::create([
                    'titre' => $data[0],
                    'description' => $data[1],
                    'validation_id' => $data[2]
                ]);
            }
            $firstline = false;
            
        }
        fclose($csvFile);
    }
}
