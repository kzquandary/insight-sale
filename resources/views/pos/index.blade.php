<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Pengmas - Pengabdian Masyarakat Universitas Jenderal Achmad Yani">
    <meta name="keywords" content="admin, pengmas, pengabdian masyarakat, unjani">
    <meta name="author" content="Nur Faid Prasetyo">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengabdian Masyarakat - Universitas Jenderal Achmad Yani</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/unjani.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ route('dashboard') }}" class="logo logo-normal">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt>
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-white">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt>
                </a>
                <a href="{{ route('dashboard') }}" class="logo-small">
                    <img src="{{ asset('assets/img/logo/unjani.png') }}" alt>
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn d-none" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item nav-searchinputs">
                    <div class="top-nav-search" style="display: none;">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#" class="dropdown">
                            <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown" data-bs-auto-close="false">
                                <input type="text" placeholder="Search">
                                <div class="search-addon">
                                    <span><i data-feather="x-circle" class="feather-14"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item nav-item-box">
                    <a href="javascript:void(0);" id="btnFullscreen">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="page-wrapper pos-pg-wrapper ms-0">
            <div class="content pos-design p-0">
                <div class="btn-row d-sm-flex align-items-center">
                    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary mb-xs-3" ><span class="me-1 d-flex align-items-center"><i data-feather="shopping-cart" class="feather-16"></i></span>Penjualan</a>
                </div>
                <div class="row align-items-start pos-wrapper">
                    <div class="col-md-12 col-lg-8">
                        <div class="pos-categories tabs_wrapper">
                            <div class="pos-products">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="mb-3">Produk</h5>
                                </div>
                                <div class="tabs_container">
                                    <div class="tab_content active" data-tab="all">
                                        <div class="row">
                                            @foreach ($product as $item)
                                            <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
                                                <div class="product-info default-cover card" data-id="{{ $item->id }}">
                                                    <a href="javascript:void(0);" class="img-bg">
                                                        <img src="{{ asset($item->gambar) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="Products">
                                                        <span><i data-feather="check" class="feather-16"></i></span>
                                                    </a>
                                                    <h6 class="product-name"><a href="javascript:void(0);">{{ $item->nama }}</a></h6>
                                                    <div class="d-flex align-items-center justify-content-between price">
                                                        <p>Rp. {{ number_format($item->harga) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 ps-0">
                        <aside class="product-order-list">
                            <div class="product-added block-section">
                                <div class="head-text d-flex align-items-center justify-content-between">
                                    <h6 class="d-flex align-items-center mb-0">Produk Ditambahkan<span class="count" id="produk-total">0</span></h6>
                                    <a href="javascript:void(0);" class="d-flex align-items-center text-danger"><span class="me-1"><i data-feather="x" class="feather-16"></i></span>Hapus Semua</a>
                                </div>
                                <div class="product-wrap" id="product-cart">
                                    <!-- Cart items will be dynamically added here -->
                                </div>
                            </div>
                            <div class="d-grid btn-block">
                                <a class="btn btn-secondary" id="btn-total" href="javascript:void(0);">
                                    Total : Rp. 0
                                </a>
                            </div>
                            <div class="btn-row d-sm-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" id="btn-bayar" class="btn btn-success btn-icon flex-fill" data-bs-toggle="modal" data-bs-target="#payment-completed"><span class="me-1 d-flex align-items-center"><i data-feather="credit-card" class="feather-16"></i></span>Bayar</a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-default" id="payment-completed" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="pos.html">
                        <div class="icon-head">
                            <a href="javascript:void(0);">
                                <i data-feather="check-circle" class="feather-40"></i>
                            </a>
                        </div>
                        <h4>Order Berhasil</h4>
                        <p class="mb-0">Apakah Anda Ingin Mencetak Struk?</p>
                        <div class="modal-footer d-sm-flex justify-content-between">
                            <button type="button" class="btn btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#print-receipt">Print Struk<i class="feather-arrow-right-circle icon-me-5"></i></button>
                            <button type="button" class="btn btn-secondary flex-fill" data-bs-dismiss="modal" id="btn-selanjutnya">Order Selanjutnya<i class="feather-arrow-right-circle icon-me-5"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="close p-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="icon-head text-center">
                        <a href="javascript:void(0);">
                            <img src="assets/img/logo/logo.png" width="100" height="30" alt="Receipt Logo">
                        </a>
                    </div>
                    <div class="text-center info text-center">
                        <h6>Abon Sapi Tiens</h6>
                        <p class="mb-0">Nomor : 0226805408</p>
                        <p class="mb-0">Email: abonsapitiens@gmail.com</a></p>
                    </div>
                    <table class="table-borderless w-100 table-fit">
                        <thead>
                            <tr>
                                <th># Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody id="receipt-items">
                            <!-- Dynamic receipt items will be rendered here -->
                        </tbody>

                    </table>
                    <div class="text-center invoice-bar">
                        <a href="javascript:void(0);">
                            <img src="assets/img/barcode/barcode-03.jpg" alt="Barcode">
                        </a>
                        <p>Terima Kasih Telah Berbelanja</p>
                        <a href="javascript:void(0);" class="btn btn-primary">Print Receipt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customizer-links" id="setdata">
        <ul class="sticky-sidebar">
            <li class="sidebar-icons">
                <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Theme">
                    <i data-feather="settings" class="feather-five"></i>
                </a>
            </li>
        </ul>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/js/moment.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/js/theme-script.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}" type="1ad873a0b6a2a6428df5232a-text/javascript"></script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" data-cf-settings="1ad873a0b6a2a6428df5232a-|49" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var cart = []; // Store the cart items
            var total = 0; // Store the total cost
            var produkTotal = $("#produk-total");
            var productCart = $("#product-cart"); 
            var btnBayar = $("#btn-bayar");
            var btnSelanjutnya = $("#btn-selanjutnya");

            btnBayar.on("click", function() {
                $.ajax({
                    url: `{{ route('pos.store') }}`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        cart: cart
                    }
                });
            });

            btnSelanjutnya.on("click", function() {
                clearCart();
            });
            // Function to add a product to the cart
            function addToCart(id, name, price, imgSrc) {
                // Check if the item is already in the cart
                var existingItem = cart.find(item => item.id === id);
                if (existingItem) {
                    existingItem.qty += 1;
                } else {
                    cart.push({
                        id: id,
                        name: name,
                        price: price,
                        imgSrc: imgSrc,
                        qty: 1
                    });
                    $('[data-id="' + id + '"]').addClass('active'); // Add active class
                }

                total += price; // Update total price
                renderCart(); // Render the updated cart
            }

            function clearCart() {
                for (var i = 0; i < cart.length; i++) {
                    $('[data-id="' + cart[i].id + '"]').removeClass('active'); // Remove active class
                }
                cart = [];
                total = 0;
                
                renderCart();
            }
            // Function to remove a product from the cart
            function removeFromCart(id) {
                var itemIndex = cart.findIndex(item => item.id === id);

                if (itemIndex > -1) {
                    total -= cart[itemIndex].price * cart[itemIndex].qty; // Deduct the price of the removed item from the total
                    cart.splice(itemIndex, 1); // Remove the item from the cart
                    $('[data-id="' + id + '"]').removeClass('active'); // Remove active class
                }

                renderCart(); // Render the updated cart
            }

            // Function to render the cart
            function renderCart() {
                productCart.empty(); // Clear the cart display

                cart.forEach(item => {
                    var cartItemHtml = `
                    <div class="product-list d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center product-info" data-id="${item.id}">
                            <a href="javascript:void(0);" class="img-bg">
                                <img src="${item.imgSrc}" alt="Products">
                            </a>
                            <div class="info">
                                <span>${item.name}</span>
                                <h6><a href="javascript:void(0);">${item.name}</a></h6>
                                <p>Rp. ${item.price.toLocaleString()}</p>
                            </div>
                        </div>
                        <div class="qty-item text-center">
                            <input type="text" class="form-control text-center" name="qty" value="${item.qty}" readonly>
                        </div>
                        <div class="d-flex align-items-center action">
                            <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);" data-id="${item.id}">
                                <i data-feather="trash-2" class="feather-14"></i>
                            </a>
                        </div>
                    </div>
                `;
                    productCart.append(cartItemHtml); // Add the item to the cart display
                });

                feather.replace(); // Refresh Feather icons
                updateTotal(); // Update the total price display
                updateProductCount(); // Update the product count
            }

            // Function to update the total price display
            function updateTotal() {
                $("#btn-total").text("Total : Rp. " + total.toLocaleString());
            }

            // Function to update the product count display
            function updateProductCount() {
                produkTotal.text(cart.length);
            }

            function renderReceipt() {
                var receiptItemsContainer = $("#receipt-items");
                receiptItemsContainer.empty(); // Clear existing items

                var subTotal = 0;

                cart.forEach((item, index) => {
                    var itemTotal = item.price * item.qty;
                    subTotal += itemTotal;
                    var itemHtml = `
            <tr>
                <td>${index + 1}. ${item.name}</td>
                <td>Rp. ${item.price.toLocaleString()}</td>
                <td>${item.qty}</td>
                <td class="text-end">Rp. ${itemTotal.toLocaleString()}</td>
            </tr>
        `;
                    receiptItemsContainer.append(itemHtml);
                });

                var totalHtml = `
        <tr>
            <td colspan="4">
                <table class="table-borderless w-100 table-fit">
                    <tr>
                        <td>Sub Total :</td>
                        <td class="text-end">Rp. ${subTotal.toLocaleString()}</td>
                    </tr>
                    <tr>
                        <td>Total Pembayaran :</td>
                        <td class="text-end">Rp. ${subTotal.toLocaleString()}</td>
                    </tr>
                </table>
            </td>
        </tr>
    `;
                receiptItemsContainer.append(totalHtml);
            }

            $(document).on("click", "[data-bs-target='#print-receipt']", function() {
                renderReceipt(); 
                clearCart();
            });

            // Handle clicking on a product to add it to the cart
            $(document).on("click", ".product-info", function() {
                var id = $(this).data("id");
                var name = $(this).find(".product-name a").text();
                var priceText = $(this).find(".price p").text().replace('Rp. ', '').replace('.', '');
                var price = parseInt(priceText.replace(/,/g, ''));
                var imgSrc = $(this).find("img").attr("src");

                var existingItem = cart.find(item => item.id === id);
                if (!existingItem) {
                    addToCart(id, name, price, imgSrc);
                } else {
                    existingItem.qty += 1;
                    total += price;
                    renderCart(); // Re-render the cart with the updated quantity
                }
            });

            // Handle clicking on the trash icon to remove an item from the cart
            $(document).on("click", ".delete-icon", function() {
                var id = $(this).data("id");
                removeFromCart(id);
            });
        });
    </script>
</body>

</html>