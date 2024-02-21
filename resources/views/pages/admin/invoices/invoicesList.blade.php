<x-dash-layout>
    <main class="container py-4 mt-1">
        <div class="px-4 py-2">
            <div class="container rounded-3 mt-3 mb-4 ml-2 p-4 bg-white">
                <div class="row">
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Buscar Pedido" type="text">
                    </div>
                    <div class="col-md-4">
                        <select name="" id="" class="form-control text-secondary dropdown-toggle">
                            <option class="text-secondary" value="" selected>Selecione um Status</option>
                            <option class="text-dark" value="1">Todos</option>
                            <option class="text-dark" value="2">Orçamento</option>
                            <option class="text-dark" value="2">Pedido Efetuado</option>
                            <option class="text-dark" value="2">Pedido Pago</option>
                            <option class="text-dark" value="2">Em Transporte</option>
                            <option class="text-dark" value="2">Entrega Realizada</option>
                            <option class="text-dark" value="2">Entrega Mal Sucedida</option>
                        </select>
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
                            <th class="px-3 py-2 text-tertiary">N° Pedido</th>
                            <th class="px-3 py-2 text-tertiary">Preço</th>
                            <th class="px-3 py-2 text-tertiary">Cliente</th>
                            <th class="px-3 py-2 text-tertiary">Status</th>
                            <th class="px-3 py-2 text-tertiary text-center" style="width: 11rem;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($row = 0; $row < 10; $row++)
                        <tr>
                            <td class="px-3 py-2 align-middle text-tertiary">n° pedido</td>
                            <td class="px-3 py-2 align-middle text-tertiary">preço</td>
                            <td class="px-3 py-2 align-middle text-tertiary">cliente</td>
                            <td class="px-3 py-2 align-middle text-tertiary">status</td>
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
