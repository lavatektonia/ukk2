<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //supaya seeder otomatis masuk tanpa php artisan migrate --seed
        $this->call([
            // RoleSeeder::class,
            TeacherSeeder::class,
            IndustrySeeder::class,
            StudentSeeder::class,
        ]);
    }
}
