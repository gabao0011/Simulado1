<div class="min-vh-100 bg-light d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm10 col-md-7 col-lg-5 col-xl-4">
            <div class="text-center mb-4">
                <h1 class="h3 mt-2 mb-1">Almoxarifado</h1>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
            @endif

            <div class="card bg-white shadow-sm-border-0">
                <div class="card-body p-4">
                    <form wire:submit="login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email"class="form-control @error('email') is-invalid @enderror" 
                            wire:model='email' autocomplete="email" autofocus>

                            @error('email')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password">Senha</label>
                            <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            wire:model='password' autocomplete="current-password">

                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Lembrar-me</label>
                        </div>

                        <button type="submit" class="btn btn-danger w-100" wire:loading.attr="disabled">
                        <span wire:loading.remove>Entrar</span>
                        <span wire:loading>Entrando...</span>
                        </button>
                    </form>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>