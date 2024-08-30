@extends('layout')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-widget w-100">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span>{{ $penjualanTahunIni->total_jumlah }}</span></h5>
                <h6>Total Produk Terjual</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-widget dash1 w-100">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5>Rp<span>{{ number_format($pendapatanTahunIni->total_revenue, 0, ',', '.') }}</span></h5>
                <h6>Total Penjualan</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-widget w-100">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span>{{ $penjualanBulanIni->total_jumlah }}</span></h5>
                <h6>Total Produk Terjual (Bulan ini)</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-widget dash1 w-100">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5>Rp<span>{{ number_format($pendapatanBulanIni->total_revenue, 0, ',', '.') }}</span></h5>
                <h6>Total Penjualan (Bulan ini)</h6>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body d-flex flex-column gap-3 justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('assets/img/logo/pengmas.png') }}" alt="product" style="height: 8rem;">
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>Pengmas Universitas Jenderal Achmad Yani & DIKTI</h1>
            <p>Pengabdian Masyarakat tentang pelatihan data science</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-7 col-sm-12 col-12 d-flex">
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
                    <button type="button" id="prediksi" data-data='@json($pendapatan)' data-type='pendapatan' class="btn btn-info rounded-pill">Prediksi</button>
                </div>
            </div>
            <div class="card-body">
                <div id="s-line" data-name="Pendapatan" data-month='["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Des"]' data-value='@json(array_values($pendapatan))'></div>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-sm-12 col-12 d-flex">
        <div class="card flex-fill default-cover mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Produk Terbaru</h4>
                <div class="view-all-link">
                    <a href="javascript:void(0);" class="view-all d-flex align-items-center">
                        Lihat Selengkapnya<span class="ps-2 d-flex align-items-center"><i data-feather="arrow-right" class="feather-16"></i></span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive dataview">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($product as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="productimgname">
                                    <a href="product-list.html" class="product-img">
                                        <img src="{{ asset($item->gambar) }}" alt="product">
                                    </a>
                                    <a href="product-list.html">{{ $item->nama }}</a>
                                </td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h4 class="card-title mb-0">Produk Terlaris</h4>
        </div>
        <div class="view-all-link">
            <a href="javascript:void(0);" class="view-all d-flex align-items-center">
                Lihat Selengkapnya<span class="ps-2 d-flex align-items-center"><i data-feather="arrow-right" class="feather-16"></i></span>
            </a>
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
                    @foreach ($terlaris as $item)
                    <tr>
                        <td>{{ $item->produk->nama }}</td>
                        <td>{{ $item->total_jumlah }}</td>
                        <td>Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal_terakhir }}</td>
                        <td>Rp {{ number_format($item->produk->harga * $item->total_jumlah, 0, ',', '.') }}</td>
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
    document.getElementById('prediksi').addEventListener('click', function() {  
        var data = $(this).data('data');
        var type = $(this).data('type');
        forecast(data, type);
    });
</script>
@endsection
