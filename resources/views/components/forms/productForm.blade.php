<main class="bg-white container py-4" style="margin-top: 3.05rem;">
    <div class="px-4 py-2 text-center product-img-form">
        <img src="{{ Storage::url($product['image']) }}" alt="{{ 'Foto de ' . $product['name'] }}">
    </div>
    <div class="px-4 py-2">
        <form action="{{ route($action, ['product' => $product['id'] ?? null]) }}" method="POST" class="w-100 h-100 mt-4"
            enctype="multipart/form-data">
            @csrf

            @if (isset($product))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">Nome</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="name" id="name"
                        value="{{ $product['name'] ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Preço de Custo (R$)</label><br />
                    <input class="w-100 form-control mt-2 mb-3 money" type="text" name="cost_price" id="cost_price"
                        value="{{ $product['cost_price'] ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Preço de Venda (R$)</label><br />
                    <input class="w-100 form-control mt-2 mb-3 money" type="text" name="sell_price" id="sell_price"
                        value="{{ $product['sell_price'] ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">SKU</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="sku" id="sku"
                        value="{{ $product['sku'] ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold mb-2">Categorias</label><br />
                    <select class="w-100 form-select hide mt-2 mb-3 categories-select" name="categories[]"
                        multiple="multiple" id="categories">
                        @foreach ($tagGroups as $name => $tags)
                            <optgroup label="{{ $name }}">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $productTags ?? []) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Imagem</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="file" name="image" id="image"
                        value="{{ $product['image'] ?? '' }}">
                </div>
                <div class="col-md-12">
                    <label class="fw-bold">Descrição</label><br />
                    <textarea class="w-100 form-control mt-2 mb-3 no-resize" style="resize: none; height: 8rem;" name="description"
                        id="description">{{ $product['description'] ?? '' }}</textarea>
                </div>
                <div class="col-md-12 mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4 py-2">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</main>
