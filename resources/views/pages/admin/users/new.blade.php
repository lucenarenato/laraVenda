<x-dash-layout>
    <nav class="bg-white d-flex shadow-sm justify-content-between breadcrumb-nav">
        <ol class="breadcrumb px-4 py-3 m-0 text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Usuários</li>
            <li class="breadcrumb-item fw-bold">Adicionar</li>
        </ol>
        <a href="{{ route('user.list') }}" class="btn btn-secondary m-2">Voltar</a>
    </nav>
    @include('components.forms.userForm', ['action' => 'user.create'])
</x-dash-layout>
