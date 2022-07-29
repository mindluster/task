<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\student;
use App\Models\school;
class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = school::pluck('id')->random(1)->first;
        student::factory(10)->create();
    }
}
