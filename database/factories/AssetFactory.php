<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' Server',
            'url_or_ip' => $this->faker->ipv4(),
            'description' => $this->faker->sentence(),
            // Adicione outros campos que seu Model Asset possua
        ];
    }
}
