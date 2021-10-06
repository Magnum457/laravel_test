<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\School;
use App\Models\Course;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::factory()
                    ->has(Course::factory()->count(3))
                    ->count(10)
                    ->create();
    }
}
