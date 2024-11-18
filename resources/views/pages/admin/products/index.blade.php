<x-dash-layout>
    <nav class="bg-white d-flex shadow-sm justify-content-between breadcrumb-nav">
        <ol class="breadcrumb px-4 py-3 m-0 text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Produtos</li>
            <li class="breadcrumb-item fw-bold">Listar</li>
        </ol>
        <a href="{{ route('product.create') }}" class="btn btn-success m-2"><i class="fa-solid fa-circle-plus"></i>
            &nbsp; Novo</a>
    </nav>
    <main class="container py-4 mt-1">
        <div class="px-4 pt-2 pb-4">
            <div class="container rounded-3 mb-4 ml-2 p-4 bg-white">
                <form action="{{ route('product.list') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Buscar Produto" name="q"
                                value="{{ $_GET['q'] ?? '' }}"" type="text">
                        </div>
                        <div class="col-md-4">
                            <select class="categories-select form-select hide" multiple="multiple">
                                @foreach($tagGroups as $name => $tags)
                                    <optgroup label="{{ $name }}">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
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
                @if ($products->count())
                    <table class="table overflow-hidden mt-3">
                        <thead class="table-info">
                            <tr>
                                <th class="px-3 py-2 text-tertiary">#</th>
                                <th class="px-3 py-2 text-tertiary text-center">Imagem</th>
                                <th class="px-3 py-2 text-tertiary">SKU</th>
                                <th class="px-3 py-2 text-tertiary">Nome</th>
                                <th class="px-3 py-2 text-tertiary">Preço de Custo</th>
                                <th class="px-3 py-2 text-tertiary">Preço de Venda</th>
                                <th class="px-3 py-2 text-tertiary">Status</th>
                                <th class="px-3 py-2 text-tertiary text-center">Categorias</th>
                                <th class="px-3 py-2 text-tertiary text-center" style="width: 11rem;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="{{ $product['deleted_at'] ? 'inactive' : '' }}">
                                    <td class="px-3 py-2 align-middle text-tertiary">{{ $product['id'] }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary text-center">
                                        <img class="product-img" src="{{ isset($product['image']) ? Storage::url($product['image']) : asset('img/no-photo-available.png') }}" alt="{{ 'Foto de '.$product['name'] }}">
                                    </td>
                                    <td class="px-3 py-2 align-middle text-tertiary">{{ $product['sku'] }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary">{{ $product['name'] }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary mask">{{ number_format($product['cost_price'], 2, ',', '.') }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary">{{ number_format($product['sell_price'], 2, ',', '.') }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary">
                                        {{ $product['deleted_at'] ? 'Inativo' : 'Ativo' }}</td>
                                    <td class="px-3 py-2 align-middle">
                                        <div class="d-flex flex-column align-items-center">
                                            <span class="tag">Veículo</span>
                                            <span class="tag">Automóvel</span>
                                            <span class="tag">0 KM</span>
                                            <span class="tag bg-info" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-html='true' data-bs-placement="top" title="Veículo; Automóvel; 0KM; Menor Preço; Novo">...</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 align-middle">
                                        <div class="text-center">
                                            <a href="{{ route('product.edit', ['product' => $product['id']]) }}"
                                                type="button" class="btn btn-outline-secondary border-0"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <button type="button"
                                                class="btn btn-outline-secondary border-0 delete-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir"
                                                data-id="{{ $product['id'] }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <button type="button"
                                                class="btn btn-outline-secondary border-0 change-status-btn"
                                                data-bs-toggle="tooltip" data-id="{{ $product['id'] }}"
                                                data-bs-placement="top" title="{{ $product['deleted_at'] ? 'Ativar' : 'Desativar' }}">
                                                <i class="fa-solid {{ $product['deleted_at'] ? 'fa-eye' : 'fa-eye-slash' }}"></i>
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

<x-script-layout>
    <script>
        $('.categories-select').toggleClass('hide');
        $('.categories-select').select2({
            placeholder: "Buscar Categoria(s)",
            language: {
                noResults: function() {
                    return "Nenhuma categoria encontrada.";
                }
            },
        });

        $('.change-status-btn').on('click', function() {
            $.ajax({
                url: `/produtos/${ $(this).data('id') }/alterar-status`,
                method: 'PUT',
                data: {
                    _token: $('input[name="_token"]').val()
                }
            }).done(() => window.location.reload())
        });

        $('.delete-btn').on('click', function() {
            $.ajax({
                url: `/produtos/${ $(this).data('id') }/excluir`,
                method: 'DELETE',
                data: {
                    _token: $('input[name="_token"]').val()
                }
            }).done(() => window.location.reload())
        });
    </script>
</x-script-layout>
