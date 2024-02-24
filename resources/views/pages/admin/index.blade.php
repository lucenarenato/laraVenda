<x-dash-layout>
    <div class="container dash-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-sack-dollar"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Ganhos</strong>
                        <strong>R$: 1000,00</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-hand-holding-dollar"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Gastos</strong>
                        <strong>R$: 1000,00</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-regular fa-rectangle-list"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Pedidos Feitos</strong>
                        <strong>10</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card flex-row">
                    <i class="fs-1 bg-light-gray-2 p-3 fa-solid fa-truck-fast"></i>
                    <div class="d-flex pt-1 flex-column mx-3 my-2">
                        <strong>Pedidos Entregues</strong>
                        <strong>8</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-7">
                <div class="bg-white py-3 px-4">
                    <strong>Gráfico de Ganhos e Gastos Mensais</strong>
                </div>
                <canvas id="chart" class="bg-white p-4"></canvas>
            </div>
            <div class="col-md-5">
                <div class="bg-white">
                    <strong>Top Produtos</strong>
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>
