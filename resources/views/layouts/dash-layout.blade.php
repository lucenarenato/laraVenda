<x-app-layout>
    <main class="d-flex">
        <aside class="d-inline-block bg-dark dashboard-aside" style="min-height: 100vh;">
            <ul class="list-group pt-4">
                <a class="text-decoration-none" href="{{ route('initial') }}">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 {{ request()->routeIs('initial') ? 'active-dash-sidebar' : '' }} m-0">
                        Dashboard
                    </li>
                </a>
                <a class="text-decoration-none" href="{{ route('product.add') }}">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 {{ request()->routeIs('product.add') ? 'active-dash-sidebar' : '' }} m-0">
                        Adicionar Produto
                    </li>
                </a>
                <a class="text-decoration-none" href="{{ route('product.list') }}">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 {{ request()->routeIs('product.list') ? 'active-dash-sidebar' : '' }} m-0">
                        Listar Produtos
                    </li>
                </a>
                <a class="text-decoration-none" href="/">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 m-0">
                        Listar Pedidos
                    </li>
                </a>
                <a class="text-decoration-none" href="/">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 m-0">
                        Listar Usuários
                    </li>
                </a>
            </ul>
        </aside>
        <div class="w-100">
            <nav class="d-flex justify-content-end px-4 py-3 bg-white shadow-sm">
                <ul class="nav">
                    <div class="dropdown">
                        <li type="button" class="nav-item dropdown-toggle" id="dropdown" data-bs-toggle="dropdown">User</li>
                        <ul class="dropdown-menu mt-3" aria-labelledby="dropdown">
                            <a class="text-decoration-none text-dark" href="{{ route('logout') }}">
                                <li class="nav-item dropdown link-user-hover px-3 py-2">
                                    Meus Dados
                                </li>
                                <li class="nav-item dropdown link-user-hover px-3 py-2">
                                    Sair
                                </li>
                            </a>
                        </ul>
                    </div>
                </ul>
            </nav>
            {{ $slot }}
        </div>
    </main>
</x-app-layout>
