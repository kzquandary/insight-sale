@extends('layout')

@section('content')
<div class="page-header">
    <div class="add-item d-flex">
        <div class="page-title">
            <h4>{{ $produk->nama }}</h4>
            <h6>Detail Produk</h6>
        </div>
    </div>
    <ul class="table-top-head">
        <li>
            <div class="page-btn">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left me-2">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>Kembali ke Produk</a>
            </div>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" id="collapse-header" aria-label="Collapse" data-bs-original-title="Collapse"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up">
                    <polyline points="18 15 12 9 6 15"></polyline>
                </svg></a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-xl-6 col-sm-12 col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"> Penjualan (Perbulan)</h5>
                <div class="graph-sets gap-3">
                    <div class="dropdown dropdown-wraper">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            2023
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="penjualan-perbulan" data-data='@json($totalPenjualanPerbulan)' data-type="penjualan" class="btn btn-info rounded-pill">Prediksi</button>
                </div>
            </div>

            <div class="card-body">
                <div id="chart-penjualan-perbulan" data-name="Penjualan" data-month='["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Des"]' data-value='@json(array_values($totalPenjualanPerbulan))'></div>
            </div>

        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"> Penjualan (Perhari)</h5>
                <div class="graph-sets gap-3">
                    <div class="dropdown dropdown-wraper">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            2023
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="penjualan-perhari" data-data='@json($totalPenjualanPerhari)' data-type="penjualan" class="btn btn-info rounded-pill">Prediksi</button>
                </div>
            </div>

            <div class="card-body">
                <div id="chart-penjualan-perhari" data-name="Penjualan" data-value='@json(array_values($totalPenjualanPerhari))'></div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-sm-12 col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"> Pendapatan (Perbulan)</h5>
                <div class="graph-sets gap-3">
                    <div class="dropdown dropdown-wraper">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            2023
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="pendapatan-perbulan" data-data='@json($totalPendapatanPerbulan)' data-type="pendapatan" class="btn btn-info rounded-pill">Prediksi</button>
                </div>
            </div>

            <div class="card-body">
                <div id="chart-pendapatan-perbulan" data-name="Pendapatan" data-month='["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Des"]' data-value='@json(array_values($totalPendapatanPerbulan))'></div>
            </div>

        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"> Pendapatan (Perhari)</h5>
                <div class="graph-sets gap-3">
                    <div class="dropdown dropdown-wraper">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            2023
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="pendapatan-perhari" data-data='@json($totalPendapatanPerhari)' data-type="pendapatan" class="btn btn-info rounded-pill">Prediksi</button>
                </div>
            </div>

            <div class="card-body">
                <div id="chart-pendapatan-perhari" data-name="Pendapatan" data-value='@json(array_values($totalPendapatanPerhari))'></div>
            </div>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h4 class="card-title mb-0">Penjualan Terakhir</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive dataview">
            <table class="table dashboard-expired-products">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Penjualan Terakhir</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualanTerakhir as $item)
                    <tr>
                        <td>{{ $item->produk->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>Rp {{ number_format($item->produk->harga * $item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.getElementById('penjualan-perbulan').addEventListener('click', function() {
        var data = $(this).data('data');
        var type = $(this).data('type');
        forecast(data, type);
    });
    document.getElementById('pendapatan-perbulan').addEventListener('click', function() {
        var data = $(this).data('data');
        var type = $(this).data('type');
        forecast(data, type);
    });
    document.getElementById('penjualan-perhari').addEventListener('click', function() {
        var data = $(this).data('data');
        var type = $(this).data('type');
        console.log(data, type);
        forecast(data, type);
    });
    document.getElementById('pendapatan-perhari').addEventListener('click', function() {
        var data = $(this).data('data');
        var type = $(this).data('type');
        forecast(data, type);
    });
</script>
@endsection