<?php
session_start();
if (!isset($_SESSION['users'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="text-align: centers">
  <h1>Yok Nyoblos Yok </h1>
  <a href="logout.php">logout</a>
  <hr>
  <h3>Selamat Datang, <?php echo $_SESSION['users']['nama']; ?>! Silahkan Nyoblos </h3>

</body>

</html>