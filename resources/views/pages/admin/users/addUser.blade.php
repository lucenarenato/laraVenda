<x-dash-layout>
    <nav class="bg-white">
        <ol class="breadcrumb px-4 py-3 shadow-sm text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Usuários</li>
            <li class="breadcrumb-item fw-bold">Adicionar</li>
        </ol>
    </nav>
    <main class="bg-white container py-4" style="margin-top: 3.05rem;">
        <div class="px-4 py-2">
            <form action="" class="w-100 h-100 mt-4">
                <strong class="mb-3 d-block text-tertiary">Dados Cadastrais</strong>
                <div class="row pb-2">
                    <div class="col-md-6">
                        <label class="fw-bold" for="">Nome</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold" for="">Email</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold" for="">Senha</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold" for="">Confirmar Senha</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                </div>
                <hr>
                <strong class="mt-4 mb-3 d-block text-tertiary">Endereço</strong>
                <div class="row">
                    <div class="col-md-4">
                        <label class="fw-bold" for="">CEP</label><br />
                        <select class="w-100 form-control mt-2 mb-3" name="" id=""></select>
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold" for="">Logradouro</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold" for="">Número</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold" for="">Bairro</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold" for="">Cidade</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold" for="">Estado</label><br />
                        <input class="w-100 form-control mt-2 mb-3" type="text" name="" id="">
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
</x-dash-layout>
