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
        $firstLine = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstLine && count($data) >= 4) {
                Message::create([
                    'titre' => $data[1],
                    'description' => $data[2],
                    'validation_id' => $data[3]
                ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
