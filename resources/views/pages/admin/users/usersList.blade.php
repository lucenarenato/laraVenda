<x-dash-layout>
    <main class="bg-white container py-4" style="margin-top: 4.5rem;">
        <div class="px-4 py-2">
            <h2>Usuários</h2>
            <table class="table rounded-3 overflow-hidden" style="margin-top: 3.5rem;">
                <thead class="table-secondary">
                    <tr>
                        <th class="px-3 py-3">Nome</th>
                        <th class="px-3 py-3">Preço</th>
                        <th class="px-3 py-3">SKU</th>
                        <th class="px-3 py-3">Categoria</th>
                        <th class="px-3 py-3 text-center" style="width: 11rem;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-3 py-3 align-middle">nome</td>
                        <td class="px-3 py-3 align-middle">preço</td>
                        <td class="px-3 py-3 align-middle">sku</td>
                        <td class="px-3 py-3 align-middle">categoria</td>
                        <td class="px-3 py-3">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Desativar">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</x-dash-layout>
