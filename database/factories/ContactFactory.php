<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $gender=array(['男性','女性']);
        // $address=$this->faker->address();
        $address = $this->faker->address();
        return [
            'fullname'=>$this->faker->name(),
            'gender'=>$this->faker->randomElement(['1','2']),
            'email'=>$this->faker->email(),
            'postcode'=>$this->faker->regexify('[1-9]{3}-[0-9]{4}'),
            'address'=>mb_substr($address, 9,38,'utf-8'),
            'building_name'=>mb_substr($address, 28,38,'utf-8'),
            'opinion'=>$this->faker->realText(120),
        ];
    }
}