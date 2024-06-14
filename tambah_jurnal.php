<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $tanggal = $_POST['tanggal'];
    $kategori_pekerjaan = $_POST['kategori_pekerjaan'];
    $instruksi_dari = $_POST['nama'];
    $target = $_POST['target'];

    try {
        $sql = "INSERT INTO Journals (tanggal, kategori_pekerjaan, instruksi, target_tercapai) 
                VALUES (:tanggal, :kategori_pekerjaan, :instruksi, :target)";
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':kategori_pekerjaan', $kategori_pekerjaan);
        $stmt->bindParam(':instruksi', $instruksi_dari);
        $stmt->bindParam(':target', $target);
        
        
        $stmt->execute();

        header("Location: index.php?status=sukses");
        exit;
    } catch (PDOException $e) {
        die("Gagal menyimpan data jurnal: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jurnal Sekolah</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="title">Tambah Jurnal</h2>
                            </div>
                            <div class="card-body">
                                <form action="tambah_jurnal.php" method="POST">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
