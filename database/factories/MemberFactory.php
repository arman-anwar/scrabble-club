<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;

class MemberFactory extends Factory
{

    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'address_1' => $this->faker->address(),
            'address_2' => $this->faker->streetAddress(),
            'post_code' => $this->faker->postcode(),
            'country' =>$this->faker->country(),
            'join_date' => $this->faker->date(),
            'tel' => $this->faker->phoneNumber(),
        ];
    }
}
