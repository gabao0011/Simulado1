
<div class="mt-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <i class="bi bi-box-seam me-2"></i> Almoxarifado
        </a>
        
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produto.*') ? 'active fw-bold' : '' }}" href="{{ route('produto.index') }}">
                        <i class="bi bi-tags me-1"></i> Produtos
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('movimentacao.*') ? 'active fw-bold' : '' }}" href="{{ route('movimentacao.index') }}">
                        <i class="bi bi-arrow-left-right me-1"></i> Movimentações
                    </a>
                </li>
            </ul>

            @auth
            <div class="d-flex align-items-center text-white gap-3">
                <span class="small"><i class="bi bi-person-circle me-1"></i> {{ auth()->user()->name }}</span>
                
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Sair
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav>
    <div class="card mt-3">
        <h5 class="card-header">Cadastro de Produtos</h5>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" wire:model="nome"
                    name="nome" id="nome" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="prazo_validade" class="form-label">Prazo de Validade</label>
                    <input type="date" class="form-control" id="prazo_validade"
                    name="prazo_validade" wire:model="prazo_validade">
                </div>

                <div class="mb-3">
                    <label for="caracteristicas" class="form-label">Caracteristicas</label>
                    <textarea class="form-control" name="data_hora" id="caracteristicas" rows="4"
                    wire:model="caracteristicas"></textarea>
                </div>

                <div class="mb-3">
                    <label for="qtd_estoque" class="form-label">Quantidade Estoque</label>
                    <input type="text" class="form-control" wire:model="qtd_estoque"
                    name="qtd_estoque" id="qtd_estoque" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="qtd_minima" class="form-label">Quantidade Mínima</label>
                    <input type="text" class="form-control" wire:model="qtd_minima"
                    name="qtd_minima" id="qtd_minima" placeholder="">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>

            </form>
        </div>
    </div>
</div>