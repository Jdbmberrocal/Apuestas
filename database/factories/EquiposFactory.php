<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipos>
 */
class EquiposFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement(["Real Madrid", "FC Barcelona", "Atlético de Madrid", "Sevilla FC", "Villarreal CF", "Real Sociedad","Real Betis", "Athletic Club", "Granada CF", "Cádiz CF", "Valencia CF","Levante UD", "RC Celta de Vigo", "SD Eibar", "Getafe CF", "Deportivo Alavés", "Elche CF", "Real Valladolid", "SD Huesca", "CA Osasuna"]),
            'pais' => 'España',
            'ciudad' => 'null',
            'estadio' => 'null', // password
            'fundacion' => now(),
        ];
    }
}
