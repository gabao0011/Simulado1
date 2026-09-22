<?php

namespace App\Livewire\Dashboard;

use App\Models\Produto;
use App\Models\Movimentacao;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $totalProdutos = Produto::count();

        $totalEstoque = Produto::sum('qtd_estoque');

        $estoqueBaixo = Produto::whereColumn(
            'qtd_estoque',
            '<',
            'qtd_minima'
        )->count();

        $totalMovimentacoes = Movimentacao::count();

        $ultimasMovimentacoes = Movimentacao::with('produto')
            ->orderBy('data_movimentacao', 'desc')
            ->limit(5)
            ->get();

        return view(
            'livewire.dashboard.dashboard',
            compact(
                'totalProdutos',
                'totalEstoque',
                'estoqueBaixo',
                'totalMovimentacoes',
                'ultimasMovimentacoes'
            )
        );
    }
}