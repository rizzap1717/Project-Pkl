<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS</title>
    <!--favicon-->
    {{-- <link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png"> --}}
    <!-- loader-->
    <link href="    assets/css/pace.min.css')}}" rel="stylesheet">
    <script src="{{asset('backend/assets/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/plugins/metismenu/metisMenu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/plugins/metismenu/mm-vertical.css')}}">
    <link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet">
    <!--bootstrap css-->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/main.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/dark-theme.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/blue-theme.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/semi-dark.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/bordered-theme.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/responsive.css')}}" rel="stylesheet">

</head>

<body class="bg-primary" style="overflow-x: hidden;">
    <div class="main-content">
        <div class="card bg-primary" style="margin-bottom: 0.4rem">
            <div class="card-body">
                <div class="d-flex align-items-lg-center justify-content-between gap-3">
                    <div class="flex-grow-1" style="margin-left: 20px">
                        <h1 class="fw-bold pl text-light">KASIR</h1>
                    </div>
                    <h5 class="user-name mb-0 fw-bold text-light">{{ Auth::user()->name}}</h5>

                    <li class="nav-item dropdown" style="list-style:none;">
                        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                            <img src="https://placehold.co/110x110/png" class="rounded-circle p-1" width="40" height="40" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                            {{-- <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                                <div class="text-center">
                                    <img src="https://placehold.co/110x110/png" class="rounded-circle p-1 shadow mb-3" width="90" height="90" alt="">
                                    <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name}}</h5>
                        </div>
                        </a> --}}
                        {{-- <hr class="dropdown-divider"> --}}
                        {{-- <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i class="material-icons-outlined">person_outline</i>Profile</a>
                            <hr class="dropdown-divider"> --}}
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons-outlined">power_settings_new</i>Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
                </li>
                {{-- <img src="https://placehold.co/110x110/png" class="rounded-circle" width="45" height="45" alt=""> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 d-flex" style="margin-left:0.5rem;margin-top: -1rem">
            <div class="card w-100 ">
                <div class="card-body">
                    <nav class="navbar navbar-expand align-items-center gap-4">
                        <h2 class="fw-bold" style="margin-left: 20px">Kategori</h2>
                        <div class="search-bar flex-grow-1" style="padding-left: 30rem">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="position-relative">
                                    <input name="search" class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="search" placeholder="Cari Menu">
                                    <span class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                                </div>
                            </form>
                        </div>
                    </nav>
                    <hr>
                    <div class="product-table">
                        <div class="table-responsive">
                            <div style=" overflow-x: hidden; overflow-y: scroll; width:100%px; height:410px; padding:50px; border:1px solid white">
                                <div class="row row-cols-1 row-cols-xl-4">

                                    @foreach ($menu as $data)

                                    <div class="card">

                                        <h5 class="card-title">{{ $data->name }}</h5>
                                        <div class="img-hover-zoom">
                                            <img src="{{ asset('images/menu/' . $data->gambar) }}" class="open-modal img-fluid" alt="{{ $data->name }}" data-menu="{{ $data->menu }}" data-harga="{{ $data->harga }}">
                                        </div>
                                        <div class="pt-3">
                                            <p class="card-text">{{ $data->menu }}</p>
                                            <p class="card-text">Rp. {{ $data->harga }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="myModal" class="modal" style=" background-color: rgba(0, 0, 0, 0.5); transition: opacity 0.3s ease-in-out">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <nav class="bg-primary">
                                                    <div class="modal-header border-bottom-0 py-2">
                                                        <h5 class="modal-title text-light">Pesan</h5>
                                                        <button type="button" class="btn-close close" aria-label="Close"></button>
                                                    </div>
                                                </nav>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="modal-text">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="mb-0 fw-bold">Menu :</h5>
                                                                <h5 class="mb-0 fw-bold"><span id="data-menu"></span></h5>
                                                            </div>
                                                            <div class="d-flex justify-content-between pt-4">
                                                                <h5 class="mb-0 fw-bold">Harga :</h5>
                                                                <h5 class="mb-0 fw-bold"><span id="data-harga"></span></h5>
                                                            </div>

                                                            <form id="order-form">
                                                                <div class="d-flex justify-content-between pt-4">
                                                                    <h5 class="mb-0 fw-bold">Jumlah Pesanan:</h5>
                                                                    <h5 class="mb-0 fw-bold">
                                                                        <input class="form-control" type="number" id="quantity" name="quantity" min="1" value="1" class="small-input">
                                                                    </h5>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" class="btn btn-primary" id="pesanMenuBtn">Pesan Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="row row-cols-auto g-4 justify-content-space-between">
                                    @foreach ($kategori as $data)
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary px-5 p-4">{{$data->nama_kategori}}</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex" style="margin-left:-1rem;margin-top: -1rem">
            <div class="w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 fw-bold">Order Status</h4>
                        <div style=" overflow-x: hidden; overflow-y: scroll; width:100%px; height:264px; border:1px solid white ">
                            <table id="orderStatusTable" class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            <input class="form-check-input ms-0" type="checkbox" id="checkAll">
                                        </th>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Baris-baris order akan ditambahkan dinamis menggunakan JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-danger px-5" id="hapusOrderBtn" style="margin-left: 350px">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Subtotal :</p>
                                <p class="fw-semi-bold" id="subtotal"></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Pajak :</p>
                                <p class="fw-semi-bold" id="pajak"></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-4">
                            <h5 class="mb-0 fw-bold">Total :</h5>
                            <h5 class="mb-0 fw-bold" id="totalAkhir"></h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row row-cols-auto g-4 justify-content-space-between">
                            <div class="col">
                                <button type="button" class="btn btn-primary px-5">Baru</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary px-5">Rekapan</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#BayarModal">Bayar</button>
                            </div>
                        </div>
                    </div>
                    {{-- modal --}}
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="BayarModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <nav class="bg-dark">
                                        <div class="modal-header border-bottom-0 py-2">
                                            <h5 class="modal-title text-light">Pesan</h5>
                                        </div>
                                    </nav>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="mb-0 fw-bold">Subtotal :</h5>
                                                <h5 class="mb-0 fw-bold"></h5>
                                            </div>
                                            <div class="d-flex justify-content-between pt-4">
                                                <h5 class="mb-0 fw-bold">Pajak :</h5>
                                                <h5 class="mb-0 fw-bold"></h5>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between pt-4">
                                                <h5 class="mb-0 fw-bold">Total :</h5>
                                                <h5 class="mb-0 fw-bold"></h5>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between pt-4">
                                                <h5 class="mb-0 fw-bold">Bayar :</h5>
                                                <h5 class="mb-0 fw-bold">
                                                    <input type="number" name="jumlah" class="form-control">
                                                </h5>
                                            </div>
                                            <div class="d-flex justify-content-between pt-4">
                                                <h5 class="mb-0 fw-bold">Kembalian :</h5>
                                                <h5 class="mb-0 fw-bold"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                        <a href="{{url('/')}}" type="button" class="btn btn-info">Bayar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
    </div>




    </div>
    </main>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get all images that open modals
        var openModals = document.querySelectorAll(".open-modal");

        // Function to handle clicks on images
        openModals.forEach(function(data) {
            data.onclick = function() {
                var dataMenu = this.getAttribute('data-menu');
                var dataHarga = this.getAttribute('data-harga');

                var modalMenu = document.getElementById("data-menu");
                var modalHarga = document.getElementById("data-harga");

                modalMenu.textContent = dataMenu;
                modalHarga.textContent = dataHarga;

                modal.style.display = "block";
            }
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>

    <script>
        var subtotal = 0;

    </script>

    <script>
        // Ketika tombol "Pesan Menu" di modal ditekan
        document.getElementById("pesanMenuBtn").addEventListener("click", function() {
            var menu = document.getElementById("data-menu").innerText;
            var harga = document.getElementById("data-harga").innerText;
            var quantity = document.getElementById("quantity").value;

            var total = harga * quantity;

            // Tambahkan ke subtotal
            subtotal += total;

            // Hitung pajak (11%)
            var pajak = subtotal * 0.11;

            // Hitung total akhir
            var totalAkhir = subtotal + pajak;

            // Lakukan pengiriman data
            $.ajax({
                type: 'POST'
                , url: '{{ route("pembayaran.store") }}'
                , data: {
                    menu: menu
                    , harga: harga
                    , quantity: quantity
                    , _token: '{{ csrf_token() }}'
                }
                , success: function(response) {

                    // Akan menambahkan baris baru ke tabel order status
                    var newRow = '<tr>' +
                        '<td><input class="form-check-input ms-0" type="checkbox"></td>' +
                        '<td>' + menu + '</td>' +
                        '<td>Rp. ' + harga + '</td>' + // Ganti dengan harga yang sesuai
                        '<td>' + quantity + '</td>' +
                        '<td>Rp. ' + total + '</td>' + // Ganti dengan perhitungan total yang sesuai
                        '</tr>';
                    $('#orderStatusTable tbody').append(newRow);


                    // Format angka menjadi string dengan dua angka di belakang koma dan menggunakan pemisah ribuan
                    document.getElementById("subtotal").innerText = 'Rp. ' + subtotal.toLocaleString('id-ID');
                    document.getElementById("pajak").innerText = 'Rp. ' + pajak.toLocaleString('id-ID');
                    document.getElementById("totalAkhir").innerText = 'Rp. ' + totalAkhir.toLocaleString('id-ID');

                    // Tutup modal setelah berhasil memproses
                    $('#myModal').modal('hide');
                }

            });
        });

    </script>

    <script>
        // Ketika tombol "Hapus" ditekan
        document.getElementById("hapusOrderBtn").addEventListener("click", function() {
            // Ambil semua checkbox yang dicentang
            var checkboxes = document.querySelectorAll('#orderStatusTable tbody input[type="checkbox"]:checked');

            checkboxes.forEach(function(checkbox) {
                var row = checkbox.closest('tr'); // Temukan baris terdekat yang mengandung checkbox ini
                var totalRow = row.querySelector('td:last-child').innerText;
                var total = parseFloat(totalRow.replace('Rp. ', '').replace(',', ''));

                // Kurangi dari subtotal
                subtotal -= total;

                row.remove(); // Hapus baris dari DOM
            });

            // Hitung ulang pajak dan total akhir setelah pengurangan
            var pajak = subtotal * 0.11;
            var totalAkhir = subtotal + pajak;

            // Tampilkan kembali subtotal, pajak, dan total akhir di UI
            document.getElementById("subtotal").innerText = 'Rp. ' + subtotal.toLocaleString('id-ID');
            document.getElementById("pajak").innerText = 'Rp. ' + pajak.toLocaleString('id-ID');
            document.getElementById("totalAkhir").innerText = 'Rp. ' + totalAkhir.toLocaleString('id-ID');
        });


        // Checkbox untuk memilih semua
        document.getElementById("checkAll").addEventListener("change", function() {
            var checkboxes = document.querySelectorAll('#orderStatusTable tbody input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById("checkAll").checked;
            });

            // Hitung ulang subtotal, pajak, dan total akhir
            subtotal = total;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var row = checkbox.closest('tr');
                    var totalRow = row.querySelector('td:last-child').innerText;
                    var total = parseFloat(totalRow.replace('Rp. ', '').replace(',', ''));
                    subtotal += total;
                }
            });

            var pajak = subtotal * 0.11;
            var totalAkhir = subtotal + pajak;

            // Tampilkan kembali subtotal, pajak, dan total akhir di UI
            document.getElementById("subtotal").innerText = 'Rp. ' + subtotal.toLocaleString('id-ID');
            document.getElementById("pajak").innerText = 'Rp. ' + pajak.toLocaleString('id-ID');
            document.getElementById("totalAkhir").innerText = 'Rp. ' + totalAkhir.toLocaleString('id-ID');
        });

    </script>


    <!--bootstrap js-->
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!--plugins-->
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script>
        new PerfectScrollbar(".user-list")

    </script>
    <script src="{{asset('backend/assets/js/main.js')}}"></script>


</body>

</html>