<x-dash-layout>
    <nav class="bg-white d-flex shadow-sm justify-content-between breadcrumb-nav">
        <ol class="breadcrumb px-4 py-3 m-0 text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Produtos</li>
            <li class="breadcrumb-item fw-bold">Editar</li>
        </ol>
        <a href="{{ route('product.list') }}" class="btn btn-secondary m-2">Voltar</a>
    </nav>
    @include('components.forms.productForm', ['action' => 'product.update'])
</x-dash-layout>

<x-script-layout>
    <script>
        $('.categories-select').toggleClass('hide');
        $('.categories-select').select2({
            tags: true,
            language: {
                noResults: function() {
                    return "Nenhuma categoria encontrada.";
                }
            },
        });
    </script>
</x-script-layout>
