<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $preco_custo = fake()->randomFloat(2, 10, 150);

        return [
            'nome' => ucfirst(fake()->unique()->words(3, true)),
            'descricao' => fake()->sentence(),
            'preco_custo' => $preco_custo,
            'preco' => round($preco_custo * fake()->randomFloat(2, 1.10, 1.80), 2),
            'quantidade' => fake()->numberBetween(0, 100),
        ];
    }
}
