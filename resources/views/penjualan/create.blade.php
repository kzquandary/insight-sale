@extends('table.layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-header">
    <div class="add-item d-flex">
        <div class="page-title">
            <h4>Penjualan Baru</h4>
            <h6>Buat Penjualan Baru</h6>
        </div>
    </div>
    <ul class="table-top-head">
        <li>
            <div class="page-btn">
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left me-2">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>Kembali ke Penjualan</a>
            </div>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" id="collapse-header" aria-label="Collapse" data-bs-original-title="Collapse"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up">
                    <polyline points="18 15 12 9 6 15"></polyline>
                </svg></a>
        </li>
    </ul>
</div>

<form action="add-product.html">
    <div class="card">
        <div class="card-body add-product pb-0">
            <div class="accordion-card-one accordion" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                        <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">
                            <div class="addproduct-icon">
                                <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info add-info">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg><span>Informasi Penjualan</span></h5>
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down chevron-down-add">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Jumlah</label>
                                        <select class="select" id="id_produk">
                                            @foreach ($produk as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" id="jumlah" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" id="tanggal" value="{{ date('Y-m-d') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="btn-addproduct mb-4">
            <button type="button" class="btn btn-cancel me-2">Batal</button>
            <button type="button" id="simpan-produk" class="btn btn-submit">Simpan</button>
        </div>
    </div>
</form>

@endsection

@section('script')
<script>
    document.getElementById('simpan-produk').addEventListener('click', function() {
        var id_produk = document.getElementById('id_produk').value;
        var jumlah = document.getElementById('jumlah').value;
        var tanggal = document.getElementById('tanggal').value;
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: `{{ route('penjualan.store') }}`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id_produk: id_produk,
                jumlah: jumlah,
                tanggal: tanggal
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Penjualan berhasil ditambahkan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = `{{ route('penjualan.index') }}`;
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menambahkan produk',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
</script>
@endsection