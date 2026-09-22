<div class="mt-0">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="close"></button>
        </div>
    @endif

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

    <div class="mt-3">
        <a href= "{{ route('produto.create')}}">
        <button type="button" class="btn btn-primary">Cadastrar Produto <i class="bi bi-plus-lg"></i></button></a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Prazo de Validade</th>
                        <th>Caracteristicas</th>
                        <th>Quantidade Estoque</th>
                        <th>Quantidade Mínima</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($produtos as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->nome}}</td>
                        <td>{{ \Carbon\Carbon::parse($p->prazo_validade)->format('d/m/Y')}}</td>
                        <td>{{$p->caracteristicas}}</td>
                        <td>{{$p->qtd_estoque}}</td>
                        <td>{{$p->qtd_minima}}</td>
                        <td>
                            <a href="{{ route('produto.edit', ['id' => $p->id])}}"
                                class="btn btn-primary btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm" wire:confirm="Deseja excluir o produto">Excluir</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>