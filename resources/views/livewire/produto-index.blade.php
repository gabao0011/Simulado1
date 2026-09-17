<div class="mt-5">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="close"></button>
        </div>
    @endif

    <div class="">
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