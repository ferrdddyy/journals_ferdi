<?php
$host = 'localhost';
$dbname = 'journals';
$username = 'root';
$password = '';

try {
  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tanggal = '2';
    $kategori_pekerjaan = '';
    $instruksi_dari = '';

    $sql = "INSERT INTO journals (tanggal, kategori_pekerjaan, instruksi_dari) 
            VALUES (:tanggal, :kategori_pekerjaan, :instruksi_dari)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':kategori_pekerjaan', $kategori_pekerjaan);
    $stmt->bindParam(':instruksi_dari', $instruksi_dari);

    $stmt->execute();

    echo "Data berhasil dimasukkan ke dalam tabel!";
} catch (PDOException $e) {
    die("Gagal menyimpan data jurnal: " . $e->getMessage());
}
?>
