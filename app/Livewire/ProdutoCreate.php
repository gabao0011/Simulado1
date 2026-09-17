<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ProdutoCreate extends Component
{
    public $nome;
    public $prazo_validade;
    public $caracteristicas;
    public $qtd_estoque;
    public $qtd_minima;
    
    public function store(){
        Produto::create([
            'nome' => $this->nome,
            'prazo_validade' => $this->prazo_validade,
            'caracteristicas' => $this->caracteristicas,
            'qtd_estoque' => $this->qtd_estoque,
            'qtd_minima' => $this->qtd_minima,
        ]);

    session()->flash('success', 'Cadastrado');
    return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto-create');
    }
}
