<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\School;
use App\Models\Course;
use App\Models\Student;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::factory()->create();

        $courses = Course::factory()
                    ->count(5)
                    ->for($school)
                    ->has(Student::factory()->count(3))
                    ->create();
    }
}
