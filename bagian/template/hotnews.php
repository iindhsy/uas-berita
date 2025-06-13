<?php
require_once __DIR__ . '/../../config/db.php';
include_once __DIR__ . '/../../controllers/BeritaControllers.php';

$beritaController = new BeritaControllers($connect);

$perPage = 7;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);

$hotNews = $beritaController->getBerita();
$totalHotNews = count($hotNews);
$totalPages = ceil($totalHotNews / $perPage);

$offset = ($page - 1) * $perPage;
$hotNews = array_slice($hotNews, $offset, $perPage);

function truncateText($text, $maxLength) {
    if (strlen($text) <= $maxLength) {
        return $text;
    }
    return substr($text, 0, $maxLength) . '...';
}
?>


<aside class="lg:col-span-1 animate-fadeIn" style="animation-delay: 0.4s;">
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-pink-700 mb-4 border-b-2 border-red-200 pb-2">Hot News 🔥</h2>
        <div id="hot-news-list" class="space-y-4">
            <?php foreach ($hotNews as $item): ?>
            <div class="hot-news-item flex items-start space-x-3 group">
                <img src="./upload/<?= htmlspecialchars($item['image']) ?>" alt="Thumbnail"
                    class="w-20 h-20 object-cover rounded-md border border-red-100 group-hover:opacity-80">
                <div>
                    <a href="index.php?page=respon&slug=<?= urlencode($item['slug']) ?>"
                        class="hot-news-title text-sm font-semibold text-gray-800 hover:text-red-600 leading-tight block">
                        <?= htmlspecialchars(truncateText($item['judul'], 50)) ?>
                    </a>
                    <p class="text-xs text-gray-500 mt-1">
                        <?= htmlspecialchars(truncateText($item['description'], 20)) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</aside>