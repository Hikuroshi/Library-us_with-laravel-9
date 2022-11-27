<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
        User::create([
            'name' => 'Hiku',
            'username' => 'hiku',
            'email' => 'hiku@gmail.com',
            'password' => bcrypt('kambenk')
        ]);

        Category::create([
            'name' => 'Pelajaran',
            'slug' => 'pelajaran'
        ]);

        Category::create([
            'name' => 'Sejarah',
            'slug' => 'sejarah'
        ]);

        Category::create([
            'name' => 'Novel',
            'slug' => 'novel'
        ]);

        Category::create([
            'name' => 'Komik',
            'slug' => 'komik'
        ]);
    }
}
