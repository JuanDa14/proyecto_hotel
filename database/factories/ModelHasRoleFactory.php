<?php

namespace Database\Factories;

use App\Models\ModelHasRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ModelHasRoleFactory extends Factory
{

    protected $model = ModelHasRole::class;

    public function definition()
    {
        return [
            'role_id' => $this->faker->randomElement(DB::table('roles')->pluck('id')),
            'model_type' => $this->faker->randomElement(['App\Models\User', 'App\Models\User']),
            'model_id' => $this->faker->unique()->randomElement(DB::table('users')->pluck('id'))
        ];
    }
}
