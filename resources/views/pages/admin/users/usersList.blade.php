<x-dash-layout>
    <main class="container py-4 mt-1">
        <div class="px-4 py-2">
            <div class="container rounded-3 mt-3 mb-4 ml-2 p-4 bg-white">
                <div class="row">
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Buscar Usuário" type="text">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-secondary w-100">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            &nbsp;Buscar
                        </button>
                    </div>
                </div>
            </div>
            <div class="container rounded-3 p-4 bg-white">
                <table class="table overflow-hidden mt-3">
                    <thead class="table-info">
                        <tr>
                            <th class="px-3 py-2 text-tertiary">Nome</th>
                            <th class="px-3 py-2 text-tertiary">Email</th>
                            <th class="px-3 py-2 text-tertiary">Telefone</th>
                            <th class="px-3 py-2 text-tertiary">Cidade/Estado</th>
                            <th class="px-3 py-2 text-tertiary text-center" style="width: 11rem;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($row = 0; $row < 10; $row++)
                        <tr>
                            <td class="px-3 py-2 align-middle text-tertiary">nome</td>
                            <td class="px-3 py-2 align-middle text-tertiary">email</td>
                            <td class="px-3 py-2 align-middle text-tertiary">telefone</td>
                            <td class="px-3 py-2 align-middle text-tertiary">cidade/estado</td>
                            <td class="px-3 py-2">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Desativar">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-dash-layout>
