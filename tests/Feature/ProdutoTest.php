<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_cria_produto_com_sucesso(): void
    {
        $this->postJson('/api/produtos',[
            'nome' => 'Lajota',
            'preco_custo' => 100,
            'preco' => 110,
        ])->assertCreated();

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Lajota']);
    }

    public function test_nao_cria_produto_com_preco_invalido(): void
    {
        $this->postJson('/api/produtos',[
            'nome' => 'Lajota',
            'preco_custo' => 100,
            'preco' => 100,
        ])->assertStatus(422);

        $this->assertDatabaseMissing('produtos', [
            'nome' => 'Lajota']);
    }
}
