<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to revenue data files
        $files = [
            storage_path('stats_2024_04_01.csv'),
            storage_path('stats_2024_03_31.csv'),
        ];

        foreach ($files as $file) {
            // Open the CSV file
            $fh = fopen($file, 'r');

            if ($fh === false) {
                throw new \RuntimeException("File not found: $file");
            }

            $isHeader = true;
            while ($row = fgetcsv($fh)) {
                if ($isHeader) {
                    $isHeader = false;
                    continue; // Skip the header row
                }

                // Insert data into the revenues table
                DB::table('revenues')->insert([
                    'utm_campaign' => $row[0],
                    'utm_term' => $row[1] ?? null,
                    'monetization_timestamp' => Carbon::parse($row[2]),
                    'revenue' => (float) $row[3],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            fclose($fh); // Close the file
        }
    }
}
