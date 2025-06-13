<?php
require_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../controllers/BeritaControllers.php';

// Perbaikan: Cek status session sebelum memanggil session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$beritaController = new BeritaControllers($connect);

$hotNews = $beritaController->getBerita();

function formatTimeTag($datetime) {
            $bulanIndo = [
                1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            $timestamp = strtotime($datetime);

            $hari = date('j', $timestamp);
            $bulan = $bulanIndo[(int)date('n', $timestamp)];
            $tahun = date('Y', $timestamp);
            $jamMenit = date('H:i', $timestamp);

            $isoDatetime = date('Y-m-d\TH:i:s', $timestamp);

            $displayText = "{$hari} {$bulan} {$tahun}, {$jamMenit} WIB";

            return "<span> <time datetime=\"{$isoDatetime}\">{$displayText}</time></span>";
        }

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($beritaController->deleteBerita($id)) {
        header("Location: index.php?page=admin&msg=deleted");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Upload Berita</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Kustom -->
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
/* Sidebar Lebar */
.sidebar {
    width: 250px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* Wrapper Utama */
.wrapper {
    min-height: 100vh;
    background-color: #f8f9fa;
}

/* Responsif: Sidebar jadi compact di mobile */
@media (max-width: 768px) {
    .sidebar {
        width: 80px;
        overflow: hidden;
    }

    .sidebar .nav-link span,
    .sidebar h4 {
        display: none;
    }

    .sidebar .nav-link {
        text-align: center;
        padding: 10px 5px;
    }

    .sidebar .nav-link i {
        margin-right: 0;
        font-size: 1.2rem;
    }
}

/* Efek hover menu */
.nav-link {
    border-radius: 5px;
    margin-bottom: 5px;
    transition: all 0.2s;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.nav-link.active {
    background-color: #0d6efd;
}

/* Card Form */
.card {
    border: none;
    border-radius: 10px;
}
</style>

<body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="?page=admin">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=home">
                        <i class="fas fa-newspaper me-2"></i> Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=unggah">
                        <i class="fas fa-upload me-2"></i> Upload Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=perbaikan">
                        <i class="fas fa-cog me-2"></i> Pengaturan
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-danger" href="?page=logout">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1 p-4">
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
            <div class="alert alert-success">Data berhasil dihapus.</div>
            <?php endif; ?>
            <!-- Daftar Berita Terakhir (Opsional) -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i> Berita Terakhir</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hotNews as $item): ?>
                                <tr>
                                    <td><?= $no++ ?></td> <!-- nomor urut -->
                                    <td><?= htmlspecialchars($item['judul']) ?></td>
                                    <td><span class="badge bg-info"><?= htmlspecialchars($item['kategori']) ?></span>
                                    </td>
                                    <td><?= formatTimeTag($item['created_at']) ?> </td>
                                    <td>
                                        <a href="?page=edit&id=<?= $item['id'] ?>"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="?page=admin&action=delete&id=<?= htmlspecialchars($item['id']) ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JS Kustom (Opsional) -->
    <script src="js/script.js"></script>
</body>

</html>