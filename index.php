<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku Perpustakaan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>📚 Daftar Buku Perpustakaan</h1>

  <form method="GET" action="index.php">
    <input type="text" name="cari" placeholder="Cari judul atau penulis..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
    <button type="submit">🔍 Cari</button>
    <a href="index.php">🔄 Reset</a>
  </form>

  <a href="tambah.php">➕ Tambah Buku</a>
  <table>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Tahun</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $where = "";
    if (isset($_GET['cari'])) {
        $keyword = $conn->real_escape_string($_GET['cari']);
        $where = "WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%'";
    }

    $result = $conn->query("SELECT * FROM buku $where ORDER BY id DESC");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>{$row['judul']}</td>";
            echo "<td>{$row['penulis']}</td>";
            echo "<td>{$row['tahun']}</td>";
            echo "<td>
                    <a href='edit.php?id={$row['id']}'>✏️</a> |
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin hapus?\")'>🗑️</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data ditemukan.</td></tr>";
    }
    ?>
  </table>
</body>
</html>
