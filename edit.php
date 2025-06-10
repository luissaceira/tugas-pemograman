<?php include 'db.php'; $id = $_GET['id'];
$data = $conn->query("SELECT * FROM buku WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Buku</title>
</head>
<body>
  <h2>Edit Buku</h2>
  <form method="POST">
    <label>Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>" required></label><br>
    <label>Penulis: <input type="text" name="penulis" value="<?= $data['penulis'] ?>" required></label><br>
    <label>Tahun: <input type="number" name="tahun" value="<?= $data['tahun'] ?>" required></label><br>
    <button type="submit">Update</button>
  </form>
  <a href="index.php">⬅️ Kembali</a>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $conn->query("UPDATE buku SET judul='$judul', penulis='$penulis', tahun='$tahun' WHERE id=$id");
    header("Location: index.php");
  }
  ?>
</body>
</html>