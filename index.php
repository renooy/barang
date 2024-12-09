
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'barang.php';
require_once 'BarangManager.php';

$BarangManager = new BarangManager();

//Menangani from tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $BarangManager->tambahBarang($nama, $harga, $stok);
    header('Location : index.php'); //Redirrect untuk mencegah Resubmission
}

//Menangani Penghapusan Barang
if (isset($_GET['hapus'])) {
    $id= $_GET['hapus'];
    $BarangManager->hapusBarang($id);
    header('Location: index.php'); //redirrect setelah menghapus
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Barang</title>
    <link rel="stylesheet" href="style.css?ver=1.0">

</head>
<body>
<nav class="navbar">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="index.php">Barang</a></li>
        <li><a href="dataCostumer.php">Data Customer</a></li>
    </ul>
</nav>

    <div class="container">
        <h1> Pencatatan Harga Barang</h1>
        <form method="POST" aciton="">
            <div>
                <label for="nama">Nama Barang</label><br>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
            <label for="harga">Harga Barang</label><br>
            <input type="number" id="harga" name="harga" required> 
            </div>
            <div>
            <label for="stok">Stok Barang</label><br>
            <input type="number" id="stok" name="stok" required> 
            </div>
            <br>
            <button type="submit" name="tambah" class="btm btn-add">tambah Barang</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($BarangManager ->getBarang() as $barang): ?>
                    <tr>
                        <td><?= $barang['id'] ?></td>
                        <td><?= $barang['nama'] ?></td>
                        <td><?= $barang['harga'] ?></td>
                        <td><?= $barang['stok'] ?></td>
                        <td>
                            <a href="?hapus=<?= $barang['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>