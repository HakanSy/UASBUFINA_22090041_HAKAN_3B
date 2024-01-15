<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nomor_hp = $_POST["nomor_hp"];
    $gender_id_gender = $_POST["gender_id_gender"];

    $conn = mysqli_connect("localhost", "root", "", "cstomer");

    // Mencegah SQL injection
    $nama = mysqli_real_escape_string($conn, $nama);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $nomor_hp = mysqli_real_escape_string($conn, $nomor_hp);
    $gender_id_gender = mysqli_real_escape_string($conn, $gender_id_gender);

    // Tambahkan pesan koneksi error
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $query = "INSERT INTO customer (nama, alamat, nomor_hp, gender_id_gender) VALUES ('$nama', '$alamat', '$nomor_hp', '$gender_id_gender')";

    // Tambahkan pesan kesalahan saat eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
