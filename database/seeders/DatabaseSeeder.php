<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Gattsu Berserk',
            'email' => 'test243173@gmail.com',
            'username' => 'gattsu88',
            'password' => '$2a$12$SYaLIcGbKRvIRHsD9TWid.M/xLuVJMcY4FLx7U1O70W10DMdbOUeO'
        ]);

        \App\Models\User::factory(14)->create();

        \App\Models\HomeSlide::factory(15)->create();

        \App\Models\About::factory(15)->create();
    }
}
