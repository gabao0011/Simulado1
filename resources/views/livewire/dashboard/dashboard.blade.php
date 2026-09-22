<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('produto.index') }}">
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
                    <a class="nav-link {{ request()->routeIs('movimentacao.*') ? 'active fw-bold' : '' }}" href="{{ route('movimentacao.create') }}">
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
    {{-- TÍTULO --}}
    <div class="mb-4 mt-2">

        <h2 class="fw-bold">
            Dashboard
        </h2>

        <p class="text-muted">
            Visão geral do controle de estoque
        </p>

    </div>


    {{-- CARDS --}}
    <div class="row g-4 mb-4">

        {{-- PRODUTOS --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Produtos cadastrados
                            </small>

                            <h2 class="fw-bold mt-2">
                                {{ $totalProdutos }}
                            </h2>

                        </div>

                        <div class="fs-1 text-primary">

                            <i class="bi bi-box-seam"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ESTOQUE --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Itens em estoque
                            </small>

                            <h2 class="fw-bold mt-2">
                                {{ $totalEstoque }}
                            </h2>

                        </div>

                        <div class="fs-1 text-success">

                            <i class="bi bi-boxes"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ESTOQUE BAIXO --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Estoque baixo
                            </small>

                            <h2 class="fw-bold mt-2 text-danger">
                                {{ $estoqueBaixo }}
                            </h2>

                        </div>

                        <div class="fs-1 text-danger">

                            <i class="bi bi-exclamation-triangle"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- MOVIMENTAÇÕES --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Movimentações
                            </small>

                            <h2 class="fw-bold mt-2">
                                {{ $totalMovimentacoes }}
                            </h2>

                        </div>

                        <div class="fs-1 text-warning">

                            <i class="bi bi-arrow-left-right"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ÚLTIMAS MOVIMENTAÇÕES --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Últimas movimentações
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>
                                Produto
                            </th>

                            <th>
                                Tipo
                            </th>

                            <th>
                                Quantidade
                            </th>

                            <th>
                                Data
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($ultimasMovimentacoes as $movimentacao)

                            <tr>

                                <td>

                                    {{ $movimentacao->produto->nome ?? 'Produto não encontrado' }}

                                </td>

                                <td>

                                    @if ($movimentacao->tipo == 'entrada')

                                        <span class="badge bg-success">

                                            <i class="bi bi-arrow-down"></i>
                                            Entrada

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            <i class="bi bi-arrow-up"></i>
                                            Saída

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    {{ $movimentacao->quantidade }}

                                </td>

                                <td>

                                    {{ \Carbon\Carbon::parse(
                                        $movimentacao->data_movimentacao
                                    )->format('d/m/Y') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="text-center text-muted py-4"
                                >
                                    Nenhuma movimentação registrada.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>