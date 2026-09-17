<div class="mt-5">
    <div class="card">
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