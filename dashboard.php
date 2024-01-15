\<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    .share__container {
        max-width: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        white-space: nowrap; /* Mencegah wrap teks ke bawah */
        overflow: hidden; /* Menyembunyikan overflow jika ada */
        text-overflow: ellipsis; /* Menyembunyikan teks yang melebihi lebar dengan elipsis */
    }

    th {
        background-color: #f2f2f2; /* Memberikan latar belakang pada header */
    }
</style>


    <!--========== BOX ICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>UAS Bu Fina</title>
</head>
<body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-up-arrow-alt scrolltop__icon'></i>
    </a>
   <!--========== HEADER ==========-->
<header class="l-header" id="header">
    <nav class="nav bd-container">
        <a href="#" class="nav__logo">RENTAL PS</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                <li class="nav__item"><a href="#customer" class="nav__link">Customer</a></li>
                <li class="nav__item"><a href="#bilik" class="nav__link">Bilik</a></li>
                <li class="nav__item"><a href="#decoration" class="nav__link">Permainan</a></li><!-- Updated link to connect to the Permainan section -->
                
               
                <li><i class='bx bx-toggle-left change-theme' id="theme-button"></i></li>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-grid-alt'></i>
        </div>
    </nav>
</header>


    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbOWJ_Xgs22dfufFA8fLHsNB8pCzHNdTxkBE5msSBlfw&s" alt="">
                </div>

                <div class="home__data">
                    <h1 class="home__title">3B Playstation</h1>
                    <p class="home__description">Bingung cari hiburan di rumah?
                        Kalian bisa cobain main game bersama teman kalia di Rental 3B
                        Terdapat banyak pilihan game untuk kalian mainkan, Buruan coba dan rasakan sensasi bermainnya.</p>
                   
                </div>   
            </div>
        </section>

        <!--========== CUSTOMER ==========-->
        <section class="customer section bd-container" id="customer">
    <div class="share__container bd-grid">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cstomer");
        $result = mysqli_query($conn, "select * from customer");
        ?>
        <table style="width: 100%">
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>alamat</th>
                <th>nomor_hp</th>
                <th>gender_id_gender</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["alamat"]; ?></td>
                    <td><?= $row["nomor_hp"]; ?></td>
                    <td><?= $row["gender_id_gender"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row["id"]; ?>">edit</a> |
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <!-- Tambahkan formulir di sini -->
        <form action="simpan.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" name="nomor_hp" required>

            <label for="gender_id_gender">ID Gender:</label>
            <input type="text" name="gender_id_gender" required>

            <button type="submit">Simpan</button>
        </form>
        <!-- Akhir formulir -->
    </div>
</section>

<!--========== BILIK ==========-->
<section class="bilik section bd-container" id="bilik">
    <div class="share__container bd-grid">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cstomer");
        $result = mysqli_query($conn, "SELECT * FROM bilik");
        ?>
        <table style="width: 100%">
            <tr>
                <th>ID</th>
                <th>Ukuran</th>
                <th>Fasilitas</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["ukuran"]; ?></td>
                    <td><?= $row["fasilitas"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>
<!--========== PERMAINAN ==========-->
<section class="decoration section bd-container" id="decoration">
                <h2 class="section-title">Kumpulan Permainan<br> For Your Home</h2>
                <div class="decoration__container bd-grid">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "cstomer");
                $result = mysqli_query($conn, "SELECT * FROM permainan");
                ?>
                    <div class="decoration__data">
                        <img src="game 3.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Red Dead Redemption</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 2.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Uncharted 3: Drake's Deception</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 1.webp" alt="" class="decoration__img">
                        <h3 class="decoration__title">Grand Theft Auto V</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 4.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Call of Duty: Black Ops</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 5.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Assassin's Creed II</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 6.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">The Last of Us</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 7.jpg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Burnout Paradise</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 8.jpg" alt="" class="decoration__img">
                        <h3 class="decoration__title">God of War: Ascension</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 9.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Pro Evolution Soccer 2018</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 10.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Bomberman ULTRA</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 11.jpeg" alt="" class="decoration__img">
                        <h3 class="decoration__title">Captain America: Super Soldier</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>

                    <div class="decoration__data">
                        <img src="game 12.webp" alt="" class="decoration__img">
                        <h3 class="decoration__title">	Crystal Defenders</h3>
                        <a href="#" class="button button-link">Mainkan</a>
                    </div>
                </div>
            </section>
           
            


        <!--========== DECORATION ==========-->
        <!-- ... (Bagian Dekorasi dan lainnya) ... -->

        <!--========== ACCESSORIES ==========-->
        <!-- ... (Bagian Aksesoris dan lainnya) ... -->

        <!--========== SEND GIFT ==========-->
        <!-- ... (Bagian Kirim Hadiah dan lainnya) ... -->
    </main>

    <!--========== FOOTER ==========-->
    <!-- ... (Bagian Footer dan lainnya) ... -->

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>
</html>
