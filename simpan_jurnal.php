<?php

include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $kategori_pekerjaan = $_POST['kategori_pekerjaan'];
    $instruksi_dari = $_POST['instruksi_dari'];
    $deskripsi = $_POST['deskripsi'];
    $target = $_POST['target'];


    $sql = "INSERT INTO journals (tanggal, kategori_pekerjaan, instruksi_dari, deskripsi, target) 
            VALUES (:tanggal, :kategori_pekerjaan, :instruksi_dari, :deskripsi, :target)";
    
    try {
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':kategori_pekerjaan', $kategori_pekerjaan);
        $stmt->bindParam(':instruksi_dari', $instruksi_dari);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':target', $target);

        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Gagal menyimpan data jurnal: " . $e->getMessage());
    }
}
?>
