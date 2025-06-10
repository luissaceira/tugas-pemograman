<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Buku</title>
</head>
<body>
  <h2>Tambah Buku</h2>
  <form method="POST">
    <label>Judul: <input type="text" name="judul" required></label><br>
    <label>Penulis: <input type="text" name="penulis" required></label><br>
    <label>Tahun: <input type="number" name="tahun" required></label><br>
    <button type="submit">Simpan</button>
  </form>
  <a href="index.php">⬅️ Kembali</a>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];

    $conn->query("INSERT INTO buku (judul, penulis, tahun) VALUES ('$judul', '$penulis', '$tahun')");
    header("Location: index.php");
  }
  ?>
</body>
</html>