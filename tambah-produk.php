<?php
// 1. Hubungkan ke database
include 'koneksi.php';

// 2. Ambil data kategori untuk pilihan di form (dropdown)
$ambil_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

// 3. Proses ketika tombol "Simpan Produk" diklik
if (isset($_POST['submit'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];
    $deskripsi   = $_POST['deskripsi'];

    // Perintah SQL untuk memasukkan data ke tabel produk
    $query_simpan = mysqli_query($koneksi, "INSERT INTO produk (id_kategori, nama_produk, harga, stok, deskripsi) 
                    VALUES ('$id_kategori', '$nama_produk', '$harga', '$stok', '$deskripsi')");

    if ($query_simpan) {
        // Jika sukses, munculkan pesan dan kembali ke dashboard utama
        echo "<script>
                alert('Produk berhasil ditambahkan!');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menambahkan produk: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Baru</title>
    <!-- Mengambil gaya tampilan (CSS) bawaan dari AdminLTE v4 -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <style>
        body { background-color: #f4f6f9; padding: 50px; font-family: sans-serif; }
        .form-box { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-control { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ced4da; border-radius: 4px; }
        .btn-submit { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        .btn-submit:hover { background-color: #218838; }
        .btn-back { display: block; text-align: center; margin-top: 15px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

<div class="form-box">
    <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Tambah Produk Baru</h2>
    
    <!-- Form Input -->
    <form action="" method="POST">
        
        <div class="form-group">
            <label>Pilih Kategori Produk</label>
            <select name="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while($kat = mysqli_fetch_array($ambil_kategori)) { ?>
                    <option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['nama_kategori']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Sepatu Sneakers Nike" required>
        </div>

        <div class="form-group">
            <label>Harga Produk (Rupiah)</label>
            <input type="number" name="harga" class="form-control" placeholder="Contoh: 150000" required>
        </div>

        <div class="form-group">
            <label>Stok Barang</label>
            <input type="number" name="stok" class="form-control" placeholder="Contoh: 10" required>
        </div>

        <div class="form-group">
            <label>Deskripsi Produk</label>
            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis deskripsi singkat produk di sini..."></textarea>
        </div>

        <button type="submit" name="submit" class="btn-submit">Simpan Produk</button>
        <a href="index.php" class="btn-back">Kembali ke Dashboard</a>
        
    </form>
</div>

</body>
</html>