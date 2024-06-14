<?php
$host = 'localhost';
$dbname = 'journals'; // Ganti dengan nama database Anda
$username = 'root';
$password = '';

$results = []; // Inisialisasi variabel $results dengan array kosong

try {
    // Buat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buat query SQL untuk mengambil data jurnal
    $sql = "SELECT * FROM journals ORDER BY tanggal DESC"; // Sesuaikan dengan nama tabel dan struktur kolom Anda

    // Persiapkan statement PDO
    $stmt = $pdo->prepare($sql);

    // Eksekusi statement
    $stmt->execute();

    // Ambil semua baris hasil sebagai array asosiatif
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Gagal mengambil data jurnal: " . $e->getMessage());
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
        body {
            font-size: .875rem;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .navbar {
            background-color: #495057;
        }
        .navbar-brand, .navbar-brand:hover {
            color: #ffffff;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            background-color: #495057;
            color: #ffffff;
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .sidebar .nav-link, .sidebar .nav-link:hover {
            font-weight: 500;
            color: #ffffff;
        }
        .sidebar .nav-link.active {
            color: #ffd700;
        }
        .card {
            background-color: #e9ecef;
            border: 1px solid #dee2e6;
            border-radius: 15px;
            margin-top: 2rem;
        }
        .card-header {
            background-color: #495057;
            color: white;
            font-size: 1.25rem;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #495057;
            border-color: #6f42c1;
            border-radius: 25px;
            padding: 0.25rem 1rem; 
            font-size: 0.875rem;
        }
        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            color: #495057;
            border-radius: 25px;
        }
        .form-control:focus {
            background-color: #ffffff;
            color: #495057;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .container {
            margin-top: 5%;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            color: #ffd700; 
        }
        .option-tercapai {
            background-color: #28a745; 
        }
        .option-tidak-tercapai {
            background-color: #dc3545; 
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Dashboard Jurnal</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="title">Tambah Jurnal</h2>
                            </div>
                            <div class="card-body">
                                <form action="simpan_jurnal.php" method="POST">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori_pekerjaan">Kategori Pekerjaan</label>
                                        <select class="form-control" id="kategori_pekerjaan" name="kategori_pekerjaan" required>
                                            <option value="webinar">Webinar</option>
                                            <option value="penilaian">Penilaian</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="instruksi_dari">Instruksi Dari</label>
                                        <select class="form-control" id="instruksi_dari" name="instruksi_dari" required>
                                            <option value="Mas Aji">Mas Aji</option>
                                            <option value="Mas Bariq">Mas Bariq</option>
                                            <option value="Mas Bakhtiar">Mas Bakhtiar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi Singkat</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="target">Target</label>
                                        <div id="target" class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                            <label class="btn btn-success option-tercapai flex-fill">
                                                <input type="radio" name="target" value="tercapai" autocomplete="off"> Tercapai
                                            </label>
                                            <label class="btn btn-danger option-tidak-tercapai flex-fill">
                                                <input type="radio" name="target" value="tidak_tercapai" autocomplete="off"> Tidak Tercapai
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="title">Daftar Jurnal</h2>
            <div class="card">
                <div class="card-header">
                    Daftar Jurnal Terbaru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kategori Pekerjaan</th>
                                    <th>Instruksi Dari</th>
                                    <th>Deskripsi</th>
                                    <th>Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $row): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                                    <td><?php echo htmlspecialchars($row['kategori_pekerjaan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['instruksi_dari']); ?></td>
                                    <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                                    <td><?php echo htmlspecialchars($row['target']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-danger">Danger</button>
                    <button type="button" class="btn btn-warning">Warning</button>
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
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
</body>
</html>