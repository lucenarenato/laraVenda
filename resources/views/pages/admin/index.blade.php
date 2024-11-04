<x-dash-layout>
    <nav class="bg-white d-flex shadow-sm justify-content-between breadcrumb-nav">
        <ol class="breadcrumb px-4 py-3 m-0 text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Dashboard</li>
        </ol>
    </nav>
    <div class="container dash-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-regular fa-rectangle-list"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Pedidos Feitos</strong>
                        <strong>10</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-money-bill-wave"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Pedidos Pagos</strong>
                        <strong>10</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-truck-fast"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Em Trânsito</strong>
                        <strong>8</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-boxes-packing"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Entregues</strong>
                        <strong>8</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-sack-dollar"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Ganho Total</strong>
                        <strong>R$: 1000,00 <span class="text-success">(+ R$: 0,00)</span></strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-hand-holding-dollar"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Gasto Total</strong>
                        <strong>R$: 1000,00</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-7">
                <div class="bg-white py-3 px-4">
                    <strong>Ganhos e Gastos Mensais</strong>
                </div>
                <canvas id="chart" class="bg-white p-4"></canvas>
            </div>
            <div class="col-md-5">
                <div class="bg-white py-2 px-4 h-100">
                    <table class="w-100 table">
                        <tr>
                            <th class="pb-2">Top Produtos</th>
                            <th class="pb-2 text-end">Vendas</th>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">Produto 1</td>
                            <td class="text-end fs-7 text-tertiary">100</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">Produto 2</td>
                            <td class="text-end fs-7 text-tertiary">80</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">Produto 3</td>
                            <td class="text-end fs-7 text-tertiary">65</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">Produto 4</td>
                            <td class="text-end fs-7 text-tertiary">63</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">Produto 5</td>
                            <td class="text-end fs-7 text-tertiary">51</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">Produto 6</td>
                            <td class="text-end fs-7 text-tertiary">47</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">--</td>
                            <td class="text-end fs-7 text-tertiary">--</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">--</td>
                            <td class="text-end fs-7 text-tertiary">--</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">--</td>
                            <td class="text-end fs-7 text-tertiary">--</td>
                        </tr>
                        <tr>
                            <td class="py-2 fs-7 text-tertiary">--</td>
                            <td class="text-end fs-7 text-tertiary">--</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>

