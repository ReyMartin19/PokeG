<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class FetchPokemon extends Command
{
    // The command you will run in the terminal
    protected $signature = 'pokemon:fetch {limit=151}';
    protected $description = 'Fetch Pokemon data from PokeAPI and save to DB';

    public function handle()
    {
        $limit = $this->argument('limit');
        $this->info("Fetching first {$limit} Pokemon...");

        $bar = $this->output->createProgressBar($limit);
        $bar->start();

        for ($i = 1; $i <= $limit; $i++) {
            // 1. Fetch data from API
            $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$i}");
            
            if ($response->failed()) {
                $this->error("Failed to fetch ID: {$i}");
                continue;
            }

            $data = $response->json();

            // 2. Extract Stats safely (API stats are in an array, we must find the right one)
            $stats = collect($data['stats'])->pluck('base_stat', 'stat.name');
            
            // 3. Extract Types
            $type1 = $data['types'][0]['type']['name'];
            $type2 = isset($data['types'][1]) ? $data['types'][1]['type']['name'] : null;

            // 4. Save to Database
            Pokemon::updateOrCreate(
                ['pokeapi_id' => $data['id']], // Check if exists by ID
                [
                    'name'       => $data['name'],
                    'sprite_url' => $data['sprites']['front_default'],
                    'hp'         => $stats['hp'] ?? 0,
                    'attack'     => $stats['attack'] ?? 0,
                    'defense'    => $stats['defense'] ?? 0,
                    'speed'      => $stats['speed'] ?? 0,
                    'type_1'     => $type1,
                    'type_2'     => $type2,
                ]
            );

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Successfully fetched {$limit} Pokemon!");
    }
}