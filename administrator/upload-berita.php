<?php
require_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../controllers/BeritaControllers.php';

$beritaController = new BeritaControllers($connect);

function generateSlug($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
    $text = preg_replace('/[\s-]+/', '-', $text);
    $text = trim($text, '-');
    return $text;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = $_POST['judul'] ?? '';
    $author = $_POST['author'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $description = $_POST['konten'] ?? '';
    $slug = generateSlug($judul);

    // Proses upload file
    $uploadDir = dirname(__DIR__) . '/upload/';
    $uploadFileName = '';

    // Pastikan folder upload ada
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['gambar']['tmp_name'];
        $originalName = basename($_FILES['gambar']['name']);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);

        $newFileName = uniqid() . '.' . $extension;
        $destination = $uploadDir . $newFileName;

        if (move_uploaded_file($tmpName, $destination)) {
            $uploadFileName = $newFileName;
        } else {
            echo "Gagal upload gambar.";
            exit;
        }
    } else {
        echo "Gambar wajib diupload.";
        exit;
    }

    // Masukkan lewat controller
    $success = $beritaController->createBerita($judul, $author, $kategori, $description, $slug, $uploadFileName);

    if ($success) {
        header('Location: ?page=admin');
        exit;
    } else {
        echo "Gagal menyimpan berita.";
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
    background-color:rgb(255, 138, 166);
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
        <div class="sidebar bg-danger text-white p-3">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page=admin">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page=home">
                        <i class="fas fa-newspaper me-2"></i> Berita
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white active" href="#">
                        <i class="fas fa-upload me-2"></i> Upload Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
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
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-upload me-2"></i> Upload Berita</h2>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="?page=logout">Logout</a></li>
                    </ul>
                </div>
            </header>

            <!-- Form Upload Berita -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="?page=unggah" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" name="judul" class="form-control" id="judul"
                                placeholder="Masukkan judul berita">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" id="author"
                                placeholder="Masukkan author berita">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori" id="kategori">
                                <option selected>Pilih kategori</option>
                                <option value="politik">Politik</option>
                                <option value="olahraga">Olahraga</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="hiburan">Hiburan</option>
                                <option value="ekonomi">Ekonomi</option>
                                <option value="gayahidup">Gaya Hidup</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Utama</label>
                            <input class="form-control" type="file" name="gambar" id="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Isi Berita</label>
                            <textarea class="form-control" name="konten" id="konten" rows="8"
                                placeholder="Tulis konten berita di sini..."></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <button type="submit" class="btn btn-danger">Publish Berita</button>
                        </div>
                    </form>
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