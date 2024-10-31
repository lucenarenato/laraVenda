<x-dash-layout>
    <nav class="bg-white">
        <ol class="breadcrumb px-4 py-3 shadow-sm text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Produtos</li>
            <li class="breadcrumb-item fw-bold">Listar</li>
        </ol>
    </nav>
    <main class="container py-4 mt-1">
        <div class="px-4 pt-2 pb-4">
            <div class="container rounded-3 mb-4 ml-2 p-4 bg-white">
                <form action="{{ route('product.list') }}">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Buscar Produto" name="q" value="{{ $_GET['q'] ?? '' }}"" type="text">
                        </div>
                        <div class="col-md-4">
                            <select name="" id="" class="form-control text-secondary">
                                <option class="text-secondary" value="" selected>Selecione uma Categoria</option>
                                <option class="text-dark" value="1">Categoria 1</option>
                                <option class="text-dark" value="2">Categoria 2</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-secondary w-100">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                &nbsp;Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container rounded-3 p-4 bg-white">
                @if($products->count())
                <table class="table overflow-hidden mt-3">
                    <thead class="table-info">
                        <tr>
                            <th class="px-3 py-2 text-tertiary">SKU</th>
                            <th class="px-3 py-2 text-tertiary">Nome</th>
                            <th class="px-3 py-2 text-tertiary">Preço de Custo</th>
                            <th class="px-3 py-2 text-tertiary">Preço de Venda</th>
                            <th class="px-3 py-2 text-tertiary text-center">Categorias</th>
                            <th class="px-3 py-2 text-tertiary text-center" style="width: 11rem;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="px-3 py-2 align-middle text-tertiary">{{ $product['sku'] }}</td>
                            <td class="px-3 py-2 align-middle text-tertiary">{{ $product['name'] }}</td>
                            <td class="px-3 py-2 align-middle text-tertiary">{{ $product['cost_price'] }}</td>
                            <td class="px-3 py-2 align-middle text-tertiary">{{ $product['sell_price'] }}</td>
                            <td class="px-3 py-2 align-middle text-tertiary text-center">-</td>
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
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="px-3 py-2 text-tertiary text-center my-0">Nenhum produto encontrado.</p>
                @endif
            </div>
        </div>
    </main>
</x-dash-layout>
