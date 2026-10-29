<?php

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentProdutoRepository implements ProdutoRepositoryInterface
{
    public function create(array $dados): Produto
    {
        return Produto::create($dados);
    }

    // ATIVIDADE: Crie mais 2 filtros para a função de search do ProdutoRepository.
    public function search(array $filters = [], int $porPagina = 10): LengthAwarePaginator
    {
        return Produto::query()
                ->when($filters['search'] ?? null, 
                fn ($query, $pedaco) => $query -> where('nome', 'LIKE', "%{$pedaco}%"))
                ->when($filters['preco_min'] ?? null, 
                fn ($query, $preco) => $query -> where('preco', '>=', $preco))
                ->when($filters['preco_max'] ?? null, 
                fn ($query, $preco) => $query -> where('preco', '<=', $preco))
                ->paginate($porPagina);
    }

    //ATIVIDADE: Crie os outros métodos do ProdutoRepository (update, delete)
    
    public function update(Produto $produto, array $dados): Produto
    {
        $produto->update($dados);
        return $produto->refresh();
    }
    public function delete(Produto $produto): void
    {
        $produto->delete();
    }

}