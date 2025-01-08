@extends('layouts.book')
@section('content')
<br><br>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <!-- Ikon Buku -->
        <symbol id="book-icon" viewBox="0 0 24 24">
            <path fill="currentColor" d="M3 4v16h18V4H3zm16 14H5V6h14v12zm-2-6h-4v-2h4v2zm-6 0H7v-2h4v2z" />
        </symbol>
        <!-- Ikon Membaca -->
        <symbol id="reading-icon" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2L3 6v12l9 4 9-4V6l-9-4zm7 15.26l-7 3.11-7-3.11V7.6l7-3.11 7 3.11v9.66z" />
        </symbol>
        <!-- Ikon Selesai -->
        <symbol id="check-icon" viewBox="0 0 24 24">
            <path fill="currentColor" d="M9 16.17L4.83 12 3.41 13.41 9 19l12-12-1.41-1.41z" />
        </symbol>
    </svg>

    <section id="company-services" class="padding-large pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Jumlah Seluruh Buku -->
                <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                    <div class="icon-box d-flex">
                        <div class="icon-box-icon pe-3 pb-3">
                            <!-- Ikon Buku -->
                            <svg class="book-icon">
                                <use xlink:href="#book-icon" />
                            </svg>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="card-title mb-1 text-capitalize text-dark">Jumlah Seluruh Buku</h4>
                            <p>{{ json_decode($data)->bukuDibaca + json_decode($data)->bukuSedangDibaca + json_decode($data)->bukuBelumDibaca }}
                                buku (Milik Anda)</p>


                        </div>
                    </div>
                </div>

                <!-- Jumlah Buku Yang Sedang Dibaca -->
                <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                    <div class="icon-box d-flex">
                        <div class="icon-box-icon pe-3 pb-3">
                            <!-- Ikon Membaca -->
                            <svg class="reading-icon">
                                <use xlink:href="#reading-icon" />
                            </svg>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="card-title mb-1 text-capitalize text-dark">Jumlah Buku Yang Sedang Dibaca</h4>
                            <p>{{ json_decode($data)->bukuSedangDibaca }} buku</p>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Buku Yang Sudah Selesai Dibaca -->
                <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
                    <div class="icon-box d-flex">
                        <div class="icon-box-icon pe-3 pb-3">
                            <!-- Ikon Selesai -->
                            <svg class="check-icon">
                                <use xlink:href="#check-icon" />
                            </svg>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="card-title mb-1 text-capitalize text-dark">Jumlah Buku Yang Sudah Selesai Dibaca
                            </h4>
                            <p>{{ json_decode($data)->bukuDibaca }} buku</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br>
    <section id="categories" class="padding-large pt-0">
        <div class="container">
            <div class="section-title overflow-hidden mb-4">
                <h3 class="d-flex align-items-center">Categories</h3>
            </div>
            <div class="row">
                <!-- Kategori Romance -->
                <div class="col-md-4">
                    <div class="card mb-4 border-0 rounded-3 position-relative">
                        <a href="{{ route('books.filterByGenre', 'Romance') }}">
                            <img src="/book/images/category1.jpg" class="img-fluid rounded-3" alt="Romance">
                            <h6 class="position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3 text-white">Romance
                            </h6>
                        </a>
                    </div>
                </div>
                <!-- Kategori Fantasy -->
                <div class="col-md-4">
                    <div class="card text-center mb-4 border-0 rounded-3">
                        <a href="{{ route('books.filterByGenre', 'Fantasy') }}">
                            <img src="/book/images/category2.jpg" class="img-fluid rounded-3" alt="Fantasy">
                            <h6 class="position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3 text-white">Fantasy
                            </h6>
                        </a>
                    </div>
                </div>
                <!-- Kategori Motivation -->
                <div class="col-md-4">
                    <div class="card text-center mb-4 border-0 rounded-3">
                        <a href="{{ route('books.filterByGenre', 'Motivasi') }}">
                            <img src="/book/images/category3.jpg" class="img-fluid rounded-3" alt="Motivation">
                            <h6 class="position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3 text-white">
                                Motivation</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div id="donutchart" style="width: 900px; height: 500px;"></div>
    </section>

    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Ambil data dari server
            var dataFromServer = JSON.parse(`{!! $data !!}`);

            // Konversi data ke format Google Chart
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Jumlah Buku'],
                ['Ingin Dibaca', dataFromServer.bukuBelumDibaca],
                ['Sudah Dibaca', dataFromServer.bukuDibaca],
                ['Sedang Dibaca', dataFromServer.bukuSedangDibaca],
            ]);

            // Opsi untuk diagram
            var options = {
                title: 'Diagram Berdasarkan Status Bacaan',
                pieHole: 0.4,
            };

            // Buat diagram donat
            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>

</body>