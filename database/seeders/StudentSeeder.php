<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\School;
use App\Models\Course;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::factory()->create();

        $students = Student::factory()
                    ->count(5)
                    ->has(Course::factory()
                                    ->for($school)
                                    ->count(3))
                    ->create();
    }
}
