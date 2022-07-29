<?php

namespace Database\Factories;

use App\Models\school;
use App\Models\student;
use Illuminate\Database\Eloquent\Factories\Factory;

class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected  static $school_id;
    public function definition()
    {
        Self::$school_id = school::inRandomOrder()->first();

        return [
            'name' => $this->faker->name(),
            'school_id' => Self::$school_id->id,
            'order' => function()
            {
                $order = student::select('order')->where('school_id',Self::$school_id->id )->max('order');

                if(!$order)
                {
                    return $order = 1;
                }
                else
                {
                    return $order = $order + 1;
                }
            }
        ];
    }
}
