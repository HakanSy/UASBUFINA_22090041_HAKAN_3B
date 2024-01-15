<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "cstomer");

// Cek apakah parameter ID diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan ID
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE id=$id");

    // Pastikan data dengan ID tersebut ada
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $nomor_hp = $row['nomor_hp'];
        $gender_id_gender = $row['gender_id_gender'];
    } else {
        // Redirect atau tindakan lainnya jika data tidak ditemukan
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    // Redirect atau tindakan lainnya jika ID tidak diberikan
    echo "ID tidak diberikan";
    exit;
}

// Proses form update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nomor_hp = $_POST["nomor_hp"];
    $gender_id_gender = $_POST["gender_id_gender"];

    // Update data ke database
    $query = "UPDATE customer SET nama='$nama', alamat='$alamat', nomor_hp='$nomor_hp', gender_id_gender='$gender_id_gender' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php"); // Redirect ke halaman lain setelah update berhasil
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $nama ?>">

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?= $alamat ?>">

        <label for="nomor_hp">Nomor HP:</label>
        <input type="text" name="nomor_hp" value="<?= $nomor_hp ?>">

        <label for="gender_id_gender">Gender ID:</label>
        <input type="text" name="gender_id_gender" value="<?= $gender_id_gender ?>">

        <input type="submit" value="Update">
    </form>
</body>

</html>
