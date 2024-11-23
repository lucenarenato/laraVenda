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
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Buscar Produto" name="q"
                                value="{{ $_GET['q'] ?? '' }}" type="text">
                        </div>
                        <div class="col-md-4">
                            <select class="categories-select form-select hide" name="categories[]" multiple="multiple">
                                @foreach ($tagGroups as $name => $tags)
                                    <optgroup label="{{ $name }}">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $_GET['categories'] ?? []) ? 'selected' : '' }}>
                                                {{ $tag->name }}</option>
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
                                        <img class="product-img"
                                            src="{{ isset($product['image']) ? Storage::url($product['image']) : asset('img/no-photo-available.png') }}"
                                            alt="{{ 'Foto de ' . $product['name'] }}">
                                    </td>
                                    <td class="px-3 py-2 align-middle text-tertiary">{{ $product['sku'] }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary">{{ $product['name'] }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary mask">R$:
                                        {{ number_format($product['cost_price'], 2, ',', '.') }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary">R$:
                                        {{ number_format($product['sell_price'], 2, ',', '.') }}</td>
                                    <td class="px-3 py-2 align-middle text-tertiary">
                                        {{ $product['deleted_at'] ? 'Inativo' : 'Ativo' }}</td>
                                    <td class="px-3 py-2 align-middle">
                                        <div class="d-flex flex-column align-items-center">
                                            @if (!$product->tags->count())
                                                -
                                            @elseif($product->tags->count() <= 3)
                                                @foreach ($product->tags as $tag)
                                                    <span class="tag">{{ $tag->name }}</span>
                                                @endforeach
                                            @else
                                                @php
                                                    $titleTagNames = '';

                                                    $tagsArr = $product->tags->toArray();
                                                    $tagsArr = array_column($tagsArr, 'name');

                                                    $titleTagNames = implode($tagsArr, '; ');
                                                @endphp

                                                @for ($tagIndex = 0; $tagIndex < 3; $tagIndex++)
                                                    <span class="tag">{{ $product->tags[$tagIndex]->name }}</span>
                                                @endfor

                                                <span class="tag bg-info" style="cursor: pointer;"
                                                    data-bs-toggle="tooltip" data-bs-html='true' data-bs-placement="top"
                                                    title="{{ $titleTagNames }}">...</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 align-middle">
                                        <div class="text-center">
                                            <a href="{{ route('product.edit', ['product' => $product['id']]) }}"
                                                type="button" class="btn btn-outline-secondary border-0"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-secondary border-0 delete-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir"
                                                data-id="{{ $product['id'] }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <button type="button"
                                                class="btn btn-outline-secondary border-0 {{ $product['deleted_at'] ? 'activate-btn' : 'unactivate-btn' }}"
                                                data-bs-toggle="tooltip" data-id="{{ $product['id'] }}"
                                                data-bs-placement="top"
                                                title="{{ $product['deleted_at'] ? 'Ativar' : 'Desativar' }}">
                                                <i
                                                    class="fa-solid {{ $product['deleted_at'] ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                            </button>
                                            <input type="hidden" id="switchStatus-{{ $product['id'] }}" value="{{ route('product.changeStatus', ['product' => $product['id']]) }}">
                                            <input type="hidden" id="delete-{{ $product['id'] }}" value="{{ route('product.delete', ['product' => $product['id']]) }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="px-3 py-2 text-tertiary text-center my-0">Nenhum produto encontrado.</p>
                @endif
                <input id="modalTrigger" type="hidden" data-bs-toggle="modal" data-bs-target="#adviceModal">
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="adviceModal" tabindex="-1" aria-labelledby="adviceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-action" id="adviceModalLabel">Excluir/Desativar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você está prestes a <b class="modal-action">EXCLUIR / DESATIVAR</b> este produto. Tem certeza que
                    deseja continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" id="confirmModal" class="btn btn-danger">Confirmar</button>
                </div>
            </div>
            <input type="hidden" id="requestMethod" value="">
            <input type="hidden" id="requestRoute" value="">
            @csrf
        </div>
    </div>
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

        $('.unactivate-btn').on('click', function() {
            const route = $(`#switchStatus-${$(this).attr('data-id')}`).val();
            $('#requestRoute').val(route);

            $('.modal-action').text('Desativar');
            $('#modalTrigger').trigger('click');
            $('#requestMethod').val('PUT');

        });

        $('.delete-btn').on('click', function() {
            const route = $(`#delete-${$(this).attr('data-id')}`).val();
            $('#requestRoute').val(route);

            $('.modal-action').text('Excluir');
            $('#modalTrigger').trigger('click');
            $('#requestMethod').val('DELETE');


        });

        $('#confirmModal').on('click', request);

        $('.activate-btn').on('click', function() {
            const route = $(`#switchStatus-${$(this).attr('data-id')}`).val();
            $('#requestRoute').val(route);
            $('#requestMethod').val('PUT');

            request();
        });

        function request() {
            $.ajax({
                url: $('#requestRoute').val(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                method: $('#requestMethod').val(),
            }).done(() => window.location.reload());
        }
    </script>
</x-script-layout>
