<?php
// Pastikan hanya didefinisikan sekali
if (!class_exists('BeritaControllers')) {
    class BeritaControllers {
        private $connect;

        public function __construct($dbConnection) {
            $this->connect = $dbConnection;
        }

        public function getBerita() {
            $stmt = $this->connect->prepare("SELECT id, judul, description, slug, author, image, kategori, created_at FROM berita ORDER BY created_at DESC");
            $stmt->execute();
            $result = $stmt->get_result();

            $berita = [];
            while ($row = $result->fetch_assoc()) {
                $berita[] = $row;
            }

            $stmt->close();
            return $berita;
        }

        public function getBeritaOld($limit, $offset) {
            $stmt = $this->connect->prepare("SELECT id, judul, description, slug, author, image, kategori, created_at FROM berita ORDER BY created_at ASC LIMIT ? OFFSET ?");
            $stmt->bind_param("ii", $limit, $offset);
            $stmt->execute();
            $result = $stmt->get_result();

            $berita = [];
            while ($row = $result->fetch_assoc()) {
                $berita[] = $row;
            }

            $stmt->close();
            return $berita;
        }

        public function countBerita() {
            $stmt = $this->connect->prepare("SELECT COUNT(*) AS total FROM berita");
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return isset($row['total']) ? (int)$row['total'] : 0;
        }

        public function getBeritaBySlug($slug) {
            $stmt = $this->connect->prepare("SELECT * FROM berita WHERE slug = ?");
            $stmt->bind_param("s", $slug);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();

            $stmt->close();
            return $data;
        }

        public function createBerita($judul, $author, $kategori, $description, $slug, $uploadFileName) {
            $stmt = $this->connect->prepare("INSERT INTO berita (judul, description, kategori, image, slug, author) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $judul, $description, $kategori, $uploadFileName, $slug, $author);

            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }

        public function deleteBerita($id) {
            // Hapus file gambar jika ada
            $stmt = $this->connect->prepare("SELECT image FROM berita WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();

            if ($row && !empty($row['image'])) {
                $filePath = __DIR__ . '/../upload/' . $row['image'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $stmtDelete = $this->connect->prepare("DELETE FROM berita WHERE id = ?");
            $stmtDelete->bind_param("i", $id);
            $success = $stmtDelete->execute();
            $stmtDelete->close();

            return $success;
        }

        public function searchBeritaBySlug($query, $limit, $offset) {
            $likeQuery = "%{$query}%";
            $stmt = $this->connect->prepare("SELECT id, judul, description, slug, author, image, kategori, created_at 
                                            FROM berita 
                                            WHERE slug LIKE ? 
                                            ORDER BY created_at DESC 
                                            LIMIT ? OFFSET ?");
            $stmt->bind_param("sii", $likeQuery, $limit, $offset);
            $stmt->execute();
            $result = $stmt->get_result();

            $berita = [];
            while ($row = $result->fetch_assoc()) {
                $berita[] = $row;
            }

            $stmt->close();
            return $berita;
        }

        public function countBeritaBySlug($query) {
            $likeQuery = "%{$query}%";
            $stmt = $this->connect->prepare("SELECT COUNT(*) as total FROM berita WHERE slug LIKE ?");
            $stmt->bind_param("s", $likeQuery);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $stmt->close();
            return isset($row['total']) ? (int)$row['total'] : 0;
        }

        public function getBeritaByKategori($kategori, $limit, $offset) {
            $stmt = $this->connect->prepare("SELECT id, judul, description, slug, author, image, kategori, created_at 
                                            FROM berita WHERE kategori = ? ORDER BY created_at DESC LIMIT ? OFFSET ?");
            $stmt->bind_param("sii", $kategori, $limit, $offset);
            $stmt->execute();
            $result = $stmt->get_result();

            $berita = [];
            while ($row = $result->fetch_assoc()) {
                $berita[] = $row;
            }

            $stmt->close();
            return $berita;
        }

        public function countBeritaByKategori($kategori) {
            $stmt = $this->connect->prepare("SELECT COUNT(*) as total FROM berita WHERE kategori = ?");
            $stmt->bind_param("s", $kategori);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return isset($row['total']) ? (int)$row['total'] : 0;
        }
    }
}
?>