@extends('table.layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="page-header">
    <div class="add-item d-flex">
        <div class="page-title">
            <h4>Histori Penjualan</h4>
            <h6>Manage data histori penjualan</h6>
        </div>
    </div>
    <ul class="table-top-head">
        <!-- <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
        </li> -->
        <li>
            <a href="{{ route('penjualan.export') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel" id="export-excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
        </li>
        <!-- <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print" id="print-button"><i data-feather="printer" class="feather-rotate-ccw"></i></a>
        </li> -->
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
        </li>
    </ul>
    <div class="page-btn">
        <a href="{{ route('penjualan.create') }}" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Tambah Penjualan</a>
    </div>
</div>

<div class="card table-list-card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-input">
                    <a href="javascript:void(0);" class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                </div>
            </div>
        </div>
        <div class="table-responsive product-list">
            <table class="table datanew">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th class="no-sort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($penjualan as $item)
                    <tr id="data-{{ $item->id }}" data-penjualan-id="{{ $item->id }}">
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="productimgname">
                                <a href="javascript:void(0);" class="product-img stock-img">
                                    <img src="{{ asset($item->gambar) }}" alt="product">
                                </a>
                                <a href="javascript:void(0);">{{ $item->nama }}</a>
                            </div>
                        </td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td class="action-table-data">
                            <div class="edit-delete-action">
                                <a class="me-2 p-2" href="{{ route('penjualan.show', $item->id) }}">
                                    <i data-feather="edit" class="feather-edit"></i>
                                </a>
                                <a class="delete-penjualan p-2" href="javascript:void(0);" data-penjualan-id="{{ $item->id }}">
                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                </a>
                            </div>
                        </td>
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
    function deletePenjualan(id) {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Anda tidak akan bisa mengembalikannya!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: !1,
        }).then(() => {
            $.ajax({
                url: `{{ route('penjualan.destroy', ':id') }}`.replace(':id', id),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },

                success: function(response) {
                    $('#data-' + id).remove();
                    Swal.fire({
                        type: "success",
                        title: "Berhasil!",
                        text: "Data berhasil dihapus.",
                        confirmButtonClass: "btn btn-success",
                    })
                },

                error: function(response) {
                    Swal.fire({
                        type: "error",
                        title: "Gagal!",
                        text: "Data gagal dihapus.",
                        confirmButtonClass: "btn btn-success",
                    })
                }

            });
        });
    }
    document.querySelectorAll('.delete-penjualan').forEach(function(trashIcon) {
        trashIcon.addEventListener('click', function() {
            const penjualanId = this.closest('tr').getAttribute('data-penjualan-id');
            deletePenjualan(penjualanId);
        });
    });


</script>
@endsection