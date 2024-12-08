<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Website</title>
    <link rel="stylesheet" href="/navbar/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <section>

        <nav>

            <div class="logo">
                <img src="/navbar/image/logo.png">
            </div>
            <ul>
                <li><a href="#Home">Home</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="#Featured">Featured</a></li>
                <li><a href="#Arrivals">Arrivals</a></li>
                <li><a href="#Reviews">Reviews</a></li>
                <li><a href="#Blog">Blog</a></li>
            </ul>
            <div class="social_icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-heart"></i>
            </div>
            <!-- Icon Hamburger -->
            <div class="burger" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>

        <div class="main">

        </div>

    </section>

</body>

</html>
<style>
    /* Gaya Hamburger Menu */
    .burger {
        display: none;
        /* Default: Tidak terlihat di layar besar */
        flex-direction: column;
        cursor: pointer;
        gap: 5px;
    }

    .burger div {
        width: 25px;
        height: 3px;
        background-color: #00bcd4;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    /* Responsive: Tampilkan Hamburger Menu di Layar Kecil */
    @media (max-width: 768px) {

        ul{
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            /* Mulai tepat di bawah navbar */
            right: 0;
            /* Tetap di sisi kanan layar */
            width: 250px;
            /* Atur lebar menu (tidak memenuhi layar) */
            background-color: #fff;
            /* Latar putih */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Bayangan untuk efek */
            z-index: 100;
            /* Letakkan di atas elemen lain */
            border-left: 1px solid #ddd;
            /* Garis pemisah di sisi kiri */
            border-bottom: 1px solid #ddd;
            /* Garis pemisah di bawah */
        }

        ul.show {
            display: flex;
            transition: all 0.3s ease;
        }

        ul li {
            margin: 10px 20px;
            /* Jarak antar item menu */
            text-align: left;
            /* Rata kiri */
        }

        ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }

        ul li a:hover {
            color: #00bcd4;
        }

        .burger {
            display: flex;
            /* Tampilkan Hamburger di layar kecil */
        }

        /* nav ul,
        .social_icon {
            display: none; */
        /* Sembunyikan navigasi default */
        /* flex-direction: column;
            background-color: #333;
            position: absolute;
            top: 60px;
            right: 0;
            width: 200px;
            padding: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        } */

        /* nav ul.show {
            display: flex; */
        /* Tampilkan navigasi jika burger menu diklik */
        /* } */
    }
</style>
<script>
    function toggleMenu() {
        const navLinks = document.querySelector('nav ul');
        navLinks.classList.toggle('show');
    }
</script>
