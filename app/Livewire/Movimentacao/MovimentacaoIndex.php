<?php

namespace App\Livewire\Movimentacao;

use App\Models\Movimentacao;
use Livewire\Component;

class MovimentacaoIndex extends Component
{
    public $search='';

    public function delete($id){

    $movimentacao = Movimentacao::find($id);

    if ($movimentacao != null){
        $movimentacao->delete();
        session()->flash('success', 'Excluido');
    }


    }


    public function render()
    {
        //$movimentacao = Movimentacao::where('quantidade', 'like', '%'.$this->search.'%')->get();
        $movimentacao = Movimentacao::orderBy('data_movimentacao', 'desc')->get();
        return view('livewire.movimentacao.movimentacao-index', compact('movimentacao'));
    }
}