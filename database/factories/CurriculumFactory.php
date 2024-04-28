<?php

namespace Database\Factories;

use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurriculumFactory extends Factory
{
    protected $model = Curriculum::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(2, 11),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'linkedin' => $this->faker->url,
            'github' => $this->faker->url,
            'portfolio' => $this->faker->url,
            'objective' => $this->faker->sentence,
            'skills' => json_encode(
                [
                    [
                        'skill' => $this->faker->sentence,
                        'level' => $this->faker->sentence,
                    ],
                    [
                        'skill' => $this->faker->sentence,
                        'level' => $this->faker->sentence,
                    ],
                    [
                        'skill' => $this->faker->sentence,
                        'level' => $this->faker->sentence,
                    ]
                ]
            ),
            'experience' => json_encode(
                [
                    [
                        'company' => $this->faker->sentence,
                        'position' => $this->faker->sentence,
                        'start_date' => $this->faker->date,
                        'end_date' => $this->faker->date,
                        'description' => $this->faker->sentence,
                    ],
                    [
                        'company' => $this->faker->sentence,
                        'position' => $this->faker->sentence,
                        'start_date' => $this->faker->date,
                        'end_date' => $this->faker->date,
                        'description' => $this->faker->sentence,
                    ],
                    [
                        'company' => $this->faker->sentence,
                        'position' => $this->faker->sentence,
                        'start_date' => $this->faker->date,
                        'end_date' => $this->faker->date,
                        'description' => $this->faker->sentence,
                    ]
                ]
            ),
            'education' => json_encode(
                [
                    [
                        'course' => $this->faker->sentence,
                        'institution' => $this->faker->sentence,
                        'status' => $this->faker->sentence,
                        'start_date' => $this->faker->date,
                        'end_date' => $this->faker->date,
                    ],
                    [
                        'course' => $this->faker->sentence,
                        'institution' => $this->faker->sentence,
                        'status' => $this->faker->sentence,
                        'start_date' => $this->faker->date,
                        'end_date' => $this->faker->date,
                    ],
                    [
                        'course' => $this->faker->sentence,
                        'institution' => $this->faker->sentence,
                        'status' => $this->faker->sentence,
                        'start_date' => $this->faker->date,
                        'end_date' => $this->faker->date,
                    ]
                ]
            ),
            'certifications' => json_encode(
                [
                    [
                        'certification' => $this->faker->sentence,
                        'institution' => $this->faker->sentence,
                        'date' => $this->faker->date,
                    ],
                    [
                        'certification' => $this->faker->sentence,
                        'institution' => $this->faker->sentence,
                        'date' => $this->faker->date,
                    ],
                    [
                        'certification' => $this->faker->sentence,
                        'institution' => $this->faker->sentence,
                        'date' => $this->faker->date,
                    ]
                ]
            ),
            'languages' => json_encode(
                [
                    [
                        'language' => $this->faker->sentence,
                        'level' => $this->faker->sentence,
                    ],
                    [
                        'language' => $this->faker->sentence,
                        'level' => $this->faker->sentence,
                    ],
                    [
                        'language' => $this->faker->sentence,
                        'level' => $this->faker->sentence,
                    ]
                ]
            ),
            'hobbies' => json_encode(
                [
                    [
                        'hobby' => $this->faker->sentence,
                    ],
                    [
                        'hobby' => $this->faker->sentence,
                    ],
                    [
                        'hobby' => $this->faker->sentence,
                    ]
                ]
            ),
        ];
    }
}
