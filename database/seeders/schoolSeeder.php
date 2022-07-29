<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\school;
class schoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        school::factory()->count(10)->create();
    }
}
