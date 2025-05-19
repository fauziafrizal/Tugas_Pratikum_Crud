<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Pasien.php';

$pasien = new Pasien();


if (isset($_GET['hapus_id'])) {
    $id_hapus = (int)$_GET['hapus_id'];
    $pasien->hapusData($id_hapus);
    
    header('Location: index.php');
    exit();
}

$data = $pasien->ambilData();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pasien Klinik</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            background-color: #343a40;
            padding-top: 60px;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 240px;
            padding: 40px 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                width: 100%;
                height: auto;
                padding-top: 0;
            }
            .content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

   
    <div class="sidebar d-none d-md-block">
        <h4 class="text-center py-3">Klinik Sehat</h4>
        <a href="#">Dashboard</a>
        <a href="crud/tambah.php">Tambah Pasien</a>
        
    </div>

    
    <div class="content">
        <div class="container-fluid">
            <h2 class="mb-4">Dashboard Data Pasien</h2>
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID Pasien</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id_pasien']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['umur']) ?></td>
            <td><?= htmlspecialchars($row['keluhan']) ?></td>
            <td>
                <a href="crud/ubah.php?id=<?= $row['id_pasien'] ?>" class="btn btn-sm btn-warning" title="Edit">
                    <i class="bi bi-pencil-square"></i> 
                </a>
                <a href="?hapus_id=<?= $row['id_pasien'] ?>" 
   class="btn btn-sm btn-danger" 
   title="Hapus"
   onclick="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?');">
    <i class="bi bi-trash"></i> 
</a>

            </td>
        </tr>
    <?php endwhile; ?>
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
