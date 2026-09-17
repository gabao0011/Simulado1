<?php

use App\Livewire\Auth\Login;
use App\Livewire\Movimentacao\MovimentacaoCreate;
use App\Livewire\ProdutoCreate;
use App\Livewire\ProdutoEdit;
use App\Livewire\ProdutoIndex;
use Illuminate\Support\Facades\Route;

Route::get('/produto', ProdutoIndex::class)->name('produto.index');
Route::get('/produto/create', ProdutoCreate::class)->name('produto.create');
Route::get('/produto/edit', ProdutoEdit::class)->name('produto.edit');
Route::get('/login',Login::class)->name('login');

Route::get('/movimentacao/create', MovimentacaoCreate::class)->name('movimentacao.create');
Route::get('/movimentacao', MovimentacaoCreate::class)->name('movimentacao.index');
