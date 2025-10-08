<?php
session_start();
if (!isset($_SESSION['users'])) {
  header('location:login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yok Nyoblos Yok</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, #ff0000 50%, #ffffff 50%);
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      color: #d32f2f;
      margin-top: 30px;
      font-size: 32px;
      font-weight: 700;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    hr {
      width: 60%;
      border: 1px solid #d32f2f;
      margin-bottom: 10px;
    }

    h3 {
      color: #333;
      font-weight: 500;
      margin-bottom: 40px;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 10px 20px;
      border-radius: 8px;
    }

    .paslon-container {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
      margin-bottom: 50px;
    }

    .paslon {
      background: #fff;
      border-radius: 15px;
      width: 200px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      text-align: center;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .paslon:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .paslon img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 10px;
      border: 3px solid #d32f2f;
      object-fit: cover;
    }

    .paslon h4 {
      color: #d32f2f;
      margin: 10px 0;
      font-size: 18px;
    }

    .paslon button {
      padding: 8px 16px;
      background-color: #d32f2f;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .paslon button:hover {
      background-color: #b71c1c;
    }

    .logout {
      position: fixed;
      top: 15px;
      right: 20px;
      background: #b71c1c;
      color: white;
      padding: 8px 14px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .logout:hover {
      background: #880808;
    }
  </style>
</head>

<body>
  <a href="logout.php" class="logout">Logout</a>
  <h1>🇮🇩 Yok Nyoblos Yok 🇮🇩</h1>
  <hr>
  <h3>Selamat Datang, <b><?php echo $_SESSION['users']['username']; ?></b>! Silakan pilih pasangan calon Anda.</h3>

  <div class="paslon-container">
    <form action="Sudah.php" method="POST" class="paslon">
      <img src="Assets/download (29).jpeg" alt="Paslon 1">
      <h4>Paslon 1</h4>
      <input type="hidden" name="vote" value="paslon1">
      <button type="submit">Pilih</button>
    </form>

    <form action="Sudah.php" method="POST" class="paslon">
      <img src="Assets/download (29).jpeg" alt="Paslon 2">
      <h4>Paslon 2</h4>
      <input type="hidden" name="vote" value="paslon2">
      <button type="submit">Pilih</button>
    </form>

    <form action="Sudah.php" method="POST" class="paslon">
      <img src="Assets/download (29).jpeg" alt="Paslon 3">
      <h4>Paslon 3</h4>
      <input type="hidden" name="vote" value="paslon3">
      <button type="submit">Pilih</button>
    </form>
  </div>
</body>

</html>