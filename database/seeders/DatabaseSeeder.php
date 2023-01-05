<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();
         Listing::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Listing::create([
        //     'title' => 'title one',
        //     'tags' => 'tag one',
        //     'company' => 'company one',
        //     'location' => 'location one',
        //     'email' => 'email one',
        //     'website' => 'website one',
        //     'desc' => 'desc one'
        // ]);

        // Listing::create([
        //     'title' => 'title two',
        //     'tags' => 'tag two',
        //     'company' => 'company two',
        //     'location' => 'location two',
        //     'email' => 'email two',
        //     'website' => 'website two',
        //     'desc' => 'desc two'
        // ]);
        // Listing::create([
        //     'title' => 'title threee',
        //     'tags' => 'tag threee',
        //     'company' => 'company threee',
        //     'location' => 'location threee',
        //     'email' => 'email threee',
        //     'website' => 'website threee',
        //     'desc' => 'desc threee'
        // ]);
    }
}
