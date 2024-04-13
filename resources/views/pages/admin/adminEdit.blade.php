@php
    $user = auth()->user();
@endphp

<x-dash-layout>
    <nav class="bg-white">
        <ol class="breadcrumb px-4 py-3 shadow-sm text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Meus Dados</li>
            <li class="breadcrumb-item fw-bold">Editar</li>
        </ol>
    </nav>
   @include('components.userForm', ['user' => $user])
</x-dash-layout>
