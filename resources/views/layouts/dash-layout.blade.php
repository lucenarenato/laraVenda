<x-app-layout>
    <main class="d-flex">
        <aside class="d-inline-block bg-dark dashboard-aside" style="min-height: 100vh;">
            <ul class="list-group pt-4">
                <a class="text-decoration-none" href="{{ route('initial') }}">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 {{ request()->routeIs('initial') ? 'active-dash-sidebar' : '' }} m-0">
                        <i class="fa-solid fa-gauge"></i> <span style="display: inline-block; padding-left: 0.8rem;">Dashboard</span>
                    </li>
                </a>
                <li type="button" class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 m-0" data-bs-toggle="collapse" data-bs-target="#productsCollapse">
                    <i class="fa-solid fa-box"></i> <span style="display: inline-block; padding-left: 0.8rem;">Produtos</span>
                </li>
                <div class="dash-sidebar-submenu collapse {{ request()->segment(1) == 'produtos' ? 'show' : '' }}" id="productsCollapse">
                    <a class="text-decoration-none" href="{{ route('product.add') }}">
                        <li class="list-group-item border-0 link-dark-hover text-light py-3 {{ request()->routeIs('product.add') ? 'active-dash-sidebar' : 'dash-sidebar-submenu' }} m-0">
                            <span class="fs-7" style="display: inline-block; padding-left: 2.0rem;"><i class="fa-solid fa-plus"></i>&nbsp; Adicionar</span>
                        </li>
                    </a>
                    <a class="text-decoration-none" href="{{ route('product.list') }}">
                        <li class="list-group-item border-0 link-dark-hover text-light py-3 {{ request()->routeIs('product.list') ? 'active-dash-sidebar' : 'dash-sidebar-submenu' }} m-0">
                            <span class="fs-7" style="display: inline-block; padding-left: 2.0rem;"><i class="fa-solid fa-table-list"></i>&nbsp; Listar</span>
                        </li>
                    </a>
                </div>
                <a class="text-decoration-none" href="/">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 m-0">
                        <i class="fa-solid fa-receipt"></i> <span style="display: inline-block; padding-left: 0.8rem;">Pedidos</span>
                    </li>
                </a>
                <a class="text-decoration-none" href="/">
                    <li class="list-group-item bg-dark border-0 link-dark-hover text-light py-3 m-0">
                        <i class="fa-solid fa-user"></i> <span style="display: inline-block; padding-left: 0.8rem;">Usuários</span>
                    </li>
                </a>
            </ul>
        </aside>
        <div class="w-100">
            <nav class="d-flex justify-content-end px-4 py-3 bg-white shadow-sm">
                <ul class="nav">
                    <div class="dropdown">
                        <li type="button" class="nav-item" id="dropdown-menu" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-circle-user" style="font-size: 1.8rem;"></i>
                        </li>
                        <ul class="dropdown-menu mt-3" aria-labelledby="dropdown-menu">
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
