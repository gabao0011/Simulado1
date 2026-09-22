<?php

use App\Livewire\Auth\Login;
use App\Livewire\Caracteristica\CaracteristicaIndex;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Movimentacao\MovimentacaoCreate;
use App\Livewire\Movimentacao\MovimentacaoIndex;
use App\Livewire\ProdutoCreate;
use App\Livewire\ProdutoEdit;
use App\Livewire\ProdutoIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/produto', ProdutoIndex::class)->name('produto.index');
Route::get('/produto/create', ProdutoCreate::class)->name('produto.create');
Route::get('/produto/edit/{id}', ProdutoEdit::class)->name('produto.edit');

Route::get('/login',Login::class)->name('login');

Route::get('/movimentacao/create', MovimentacaoCreate::class)->name('movimentacao.create');
Route::get('/movimentacao', MovimentacaoIndex::class)->name('movimentacao.index');

Route::post('/logout', function () {
    Auth::logout();
    
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login'); 
})->name('logout');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
