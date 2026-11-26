<?php
include "auth.php";
include "koneksi.php";

$cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';

$query = mysqli_query($koneksi, "SELECT buku.*, kategori.gambar
FROM buku
LEFT JOIN kategori ON buku.kategori = kategori.nama_kategori
WHERE buku.kode_buku LIKE '%$cari%'
OR buku.judul_buku LIKE '%$cari%'
OR CAST(buku.stok AS CHAR) LIKE '%$cari%'
OR buku.sinopsis LIKE '%$cari%'
OR buku.status_pinjam LIKE '%$cari%'
OR buku.kategori LIKE '%$cari%'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css?v=6">
</head>
<body>

<h2>Daftar Buku Perpustakaan</h2>

<div class="menu-atas">
    <a href="tambah.php">+ Tambah Buku</a>
    <a href="kategori/index.php">Kelola Kategori</a>
    <a href="logout.php" class="btn-logout"
    onclick="return confirm('Yakin ingin logout?')">
        Logout
    </a>
</div>

<form method="GET">
    <input type="text" name="cari"
    placeholder="Cari buku, stok, kategori..."
    value="<?php echo htmlspecialchars($cari); ?>">

    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
</form>

<table>
<tr>
    <th>No</th>
    <th>Kode Buku</th>
    <th>Judul Buku</th>
    <th>Stok</th>
    <th>Sinopsis</th>
    <th>Status Pinjam</th>
    <th>Kategori</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
while ($data = mysqli_fetch_assoc($query)) {
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo htmlspecialchars($data['kode_buku']); ?></td>
    <td><?php echo htmlspecialchars($data['judul_buku']); ?></td>
    <td><?php echo $data['stok']; ?></td>
    <td><?php echo htmlspecialchars($data['sinopsis']); ?></td>
    <td><?php echo htmlspecialchars($data['status_pinjam']); ?></td>
    <td><?php echo htmlspecialchars($data['kategori']); ?></td>

    <td>
        <?php if ($data['gambar'] != '') { ?>
            <img src="gambar/<?php echo htmlspecialchars($data['gambar']); ?>" width="80">
        <?php } else { ?>
            Tidak ada gambar
        <?php } ?>
    </td>

    <td>
        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?php echo $data['id']; ?>"
        onclick="return confirm('Yakin hapus data ini?')">
            Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>