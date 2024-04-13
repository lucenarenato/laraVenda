<main class="bg-white container py-4" style="margin-top: 3.05rem;">
    <div class="px-4 py-2">
        <form action="" class="w-100 h-100 mt-4">
            <strong class="mb-3 d-block text-tertiary">Dados Cadastrais</strong>
            <div class="row pb-2">
                <div class="col-md-6">
                    <label class="fw-bold">Nome</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="name" value="{{ $user->name ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Email</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="email" value="{{ $user->email ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Senha</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="password">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Confirmar Senha</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="confirm_password">
                </div>
            </div>
            <hr>
            <strong class="mt-4 mb-3 d-block text-tertiary">Endereço</strong>
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">CEP</label><br />
                    <select class="w-100 form-control mt-2 mb-3" name="zipcode"></select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Logradouro</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="public_place">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Número</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="address_number">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Bairro</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="neighborhood">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Cidade</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="city">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Estado</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="state">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4 text-end">
                    <button class="btn btn-success px-4 py-2">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</main>
