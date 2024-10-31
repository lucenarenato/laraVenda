<main class="bg-white container py-4" style="margin-top: 3.05rem;">
    <div class="px-4 py-2">
        <form action="{{ route('product.store') }}" method="POST" class="w-100 h-100 mt-4">
            @csrf

            @if(isset($product))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold" for="">Nome</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="name" id="">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold" for="">Preço de Custo</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="cost_price" id="">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold" for="">Preço de Venda</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="sell_price" id="">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold" for="">SKU</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="sku" id="">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold" for="">Categoria</label><br />
                    <select class="w-100 form-control mt-2 mb-3" name="" id=""></select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold" for="">Imagem</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="image" id="">
                </div>
                <div class="col-md-12">
                    <label class="fw-bold" for="">Descrição</label><br />
                    <textarea class="w-100 form-control mt-2 mb-3 no-resize" style="resize: none; height: 8rem;" name="description" id=""></textarea>
                </div>
                <div class="col-md-12 mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4 py-2">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</main>
