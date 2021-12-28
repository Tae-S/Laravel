<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Employee::class;
    public function definition()
    {
        return [
            // $table->increments('id');
            //            $table->string('username')->unique();
            //            $table->integer('amount',[false],[true]);
            //            $table->timestamps();
            'username' =>$this->faker->unique()->name(),
            'username_verified_at' => now(),
            'amount' =>$this->faker->buildingNumber(),
            'parent' =>$this->faker->text(),

        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'username_verified_at' => null,
            ];
        });
    }
}
