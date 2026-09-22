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
    <h1 class="mb-4 mt-2">Gestao de Movimentação</h1>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-3 mb-3">
        <a href= "{{ route('movimentacao.create')}}">
        <button type="button" class="btn btn-primary">Nova Movimentação <i class="bi bi-plus-lg"></i></button></a>
    </div>

    <div class="mb-4">
        <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
    </div>



    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade Movimentada</th>
                <th scope="col">Data movimentacao</th>
                <th scope="col">Tipo</th>
                <th scope="col">Quantidade Atual</th>
                <th scope="col">Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimentacao as $m)
                <tr>
                    <th scope="row">{{ $m->id }}</th>
                    <th scope="row">{{ $m->produto->nome }}</th>
                    <td>{{ $m->quantidade }}</td>
                    <td>{{ \Carbon\Carbon::parse($m->data_movimentacao)->format('d/m/Y') }}</td>
                    <td>
                        @if ($m->tipo == 'entrada')
                            <span class="badge bg-primary">Entrada</span>
                        @else
                            <span class="badge bg-danger">Saida</span>
                        @endif
                    </td>
                    <td> {{ $m->produto->qtd_estoque }}</td>
                    <td> {{ $m->user->name }}</td>
                    <td>

                        <button wire:click='delete({{ $m->id }})' class="btn btn-sm btn-danger">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>