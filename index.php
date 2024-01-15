<?php
session_start();

// Jika sudah login, redirect ke halaman lain
if (isset($_SESSION['session_username'])) {
    header("location: dashboard.php");
    exit();
}

// Jika form login di-submit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "cstomer");

    if ($conn->connect_error) {
        http_response_code(500);
        die();
    }

    $sql = "SELECT 1 from tb_login where username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['session_username'] = $username;
            header("location: dashboard.php");
            exit();
        } else {
            $error = "Username atau password salah.";
        }
    } else {
        http_response_code(500);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="login-container">
        <h2>Login</h2>

        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>

</body>
</html>
