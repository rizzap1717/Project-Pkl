<!DOCTYPE html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Your custom CSS -->
    <link href="your-custom-style.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="card" style="background-color: rgb(137, 137, 137)">
            <div class="card-body">
                <div class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">
                    <div class="flex-grow-1">
                        <h1 class="fw-bold">KASIR</h1>
                    </div>
                    <h5 class="user-name mb-0 fw-bold">Admin &nbsp;</h5>
                    <img src="https://placehold.co/110x110/png" class="rounded-circle" width="45" height="45" alt="">
                </div>
            </div>
        </div>

        <!-- Product Section -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8 d-flex">
                    <!-- Main content -->
                    <div class="card">
                        <div style="overflow-x: hidden; overflow-y: scroll; width:100%; height:650px; border:1px solid white">
                            <div class="card-body ms-auto">
                                <h2 class="fw-bold">MENU</h2>
                                <div class="container-fluid">
                                    <div class="search-bar flex-grow-1 mb-4">
                                        <div class="position-relative">
                                            <i class="fas fa-search"></i>
                                            <input id="search-input" class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Search">
                                        </div>
                                    </div>

                                    <div id="menu-container" class="row justify-content-center">
                                        @foreach ($menu as $data)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">{{ $data->name }}</h5>
                                                    <img src="{{ asset('images/menu/' . $data->gambar) }}" class="open-modal img-fluid" alt="{{ $data->name }}" data-image="{{ asset('images/menu/' . $data->gambar) }}" data-menu="{{ $data->menu }}" data-harga="{{ $data->harga }}">
                                                    <p class="card-text">{{ $data->menu }}</p>
                                                    <p class="card-text">Harga: {{ $data->harga }}</p>
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

                <!-- Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close"></span>
                        <img id="modal-image" class="modal-img" src="" alt="Modal Image">
                        <div class="modal-text">
                            <p>Nama Produk : <span id="modal-name"></span></p>
                            <p>Harga : <span id="modal-price"></span></p>
                            <form id="order-form">
                                <label for="quantity">Jumlah Pesanan:</label>
                                <input type="number" id="quantity" name="quantity" min="1" value="1" class="small-input">
                                <br><br>
                                <button type="submit" class="small-button">Tambahkan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="card" style="width: 500px height:274;">
                        <div class="card-body">
                            <h4 class="card-title mb-4 fw-bold">Order Here</h4>
                            <div style="overflow-x: hidden; overflow-y: scroll; width:107%; height:300px; border:1px solid white">
                                <table class="table align-middle" style="background-color: rgb(174, 174, 173)">
                                    <thead class="table-light">
                                        <tr>
                                            <th><input type="checkbox" id="select-all-checkbox"></th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                            <th>Pajak</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-table-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <!-- Button group -->
                        <div class="d-grid gap-2 mb-3">
                            <button id="new-order-btn" type="button" class="btn btn-primary">Baru</button>
                            <button id="cancel-btn" type="button" class="btn btn-danger">Batal</button>
                            <button type="button" class="btn btn-info">Rekapan</button>
                            <button type="button" class="btn btn-warning">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get all images that open modals
        var openModals = document.querySelectorAll(".open-modal");

        // Function to handle clicks on images
        openModals.forEach(function(img) {
            img.onclick = function() {
                var imageSrc = this.getAttribute('data-image');
                var imageName = this.getAttribute('alt');
                var imageMenu = this.getAttribute('data-menu');
                var imageHarga = this.getAttribute('data-harga');

                var modalImg = document.getElementById("modal-image");
                var modalName = document.getElementById("modal-name");
                var modalPrice = document.getElementById("modal-price");

                modalImg.src = imageSrc;
                modalName.textContent = imageMenu;
                modalPrice.textContent = imageHarga;

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

        // Handle the form submission
        var orderForm = document.getElementById("order-form");

        orderForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            var productName = document.getElementById("modal-name").textContent;
            var productPrice = parseFloat(document.getElementById("modal-price").textContent);
            var quantity = parseInt(document.getElementById("quantity").value);

            var subTotal = productPrice * quantity;
            var tax = subTotal * 0.1; // Assuming 10% tax
            var total = subTotal + tax;

            var orderTableBody = document.getElementById("order-table-body");

            // logic modal
            var newRow = document.createElement("tr");

            newRow.innerHTML = `
                <td><input type="checkbox" class="order-checkbox"></td>
                <td>${productName}</td>
                <td>${productPrice.toFixed(2)}</td>
                <td>${quantity}</td>
                <td>${subTotal.toFixed(2)}</td>
                <td>10%</td>
                <td>${total.toFixed(2)}</td>
            `;

            // Append the new row to the table body
            orderTableBody.appendChild(newRow);

            // Close the modal
            modal.style.display = "none";
        });

        // untuk meng input search dan menemukan itemnya
        document.getElementById('search-input').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let menuItems = document.querySelectorAll('#menu-container .card');

            menuItems.forEach(function(item) {
                let itemName = item.querySelector('.card-title').textContent.toLowerCase();
                let itemMenu = item.querySelector('.card-text').textContent.toLowerCase();

                if (itemName.includes(filter) || itemMenu.includes(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Ketika menambahkan button baru
        var newOrderBtn = document.getElementById("new-order-btn");

        newOrderBtn.addEventListener("click", function() {
            var orderTableBody = document.getElementById("order-table-body");
            orderTableBody.innerHTML = ''; // mereset
        });

        // Tambahkan event listener pada tombol "Batal" untuk mereset checkbox
        var cancelBtn = document.getElementById("cancel-btn");

        cancelBtn.addEventListener("click", function() {
            var checkboxes = document.querySelectorAll('.order-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false; // Uncheck checkbox
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
