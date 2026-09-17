<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ProdutoEdit extends Component
{
    public $nome;
    public $prazo_validade;
    public $caracteristicas;
    public $qtd_estoque;
    public $qtd_minima;
    public $produtoId;
    
    public function mount($id){
        $produto = Produto::find($id);

        $this->produtoId = $produto->id;
        $this->nome = $produto->nome;
        $this->prazo_validade = $produto->prazo_validade;
        $this->caracteristicas = $produto->caracteristicas;
        $this->qtd_estoque = $produto->qtd_estoque;
        $this->qtd_minima = $produto->qtd_minima;
    }

    public function update(){
        $produto = Produto::find($this->produtoId);

        $produto->nome = $this->nome;
        $produto->prazo_validade = $this->prazo_validade;
        $produto->caracteristicas = $this->caracteristicas;
        $produto->qtd_estoque = $this->qtd_estoque;
        $produto->qtd_minima = $this->qtd_minima;

        $produto->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto-edit');
    }
}
