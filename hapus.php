<?php
$conn = mysqli_connect("localhost", "root", "", "cstomer");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $deleteQuery = "DELETE FROM customer WHERE id = $id";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah penghapusan
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
