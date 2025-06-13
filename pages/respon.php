<?php
require_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../controllers/BeritaControllers.php';

$beritaController = new BeritaControllers($connect);

$slug = $_GET['slug'] ?? null;

if ($slug) {
    $dataBerita = $beritaController->getBeritaBySlug($slug);
    if (!$dataBerita) {
        echo "Berita tidak ditemukan.";
        exit;
    }
} else {
    echo "Slug tidak ditemukan.";
    exit;
}

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

    return "<span>Dipublikasikan: <time datetime=\"{$isoDatetime}\">{$displayText}</time></span>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respons Mitra Dagang Atas Tarif AS - PortalPolmed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .article-part-pagination-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .hidden-by-search {
        display: none !important;
    }
    </style>
</head>

<body class="bg-gray-100 font-sans">


    <div class="container mx-auto px-4 sm:px-6 py-8">
        <div id="search-message" class="mb-4 text-center text-gray-700 font-semibold"></div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            <?php include 'bagian/template/kategori.php';?>

            <main class="lg:col-span-3 bg-white p-6 rounded-lg shadow-lg animate-fadeIn">
                <article id="main-article-container">
                    <h1 id="main-article-title" class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                        <?= htmlspecialchars($dataBerita['judul']) ?>
                    </h1>
                    <div id="main-article-meta" class="text-sm text-gray-600 mb-4">
                        <?= formatTimeTag($dataBerita['created_at']) ?> |
                        <span>Oleh: <?= htmlspecialchars($dataBerita['author']) ?></span>
                    </div>
                    <figure id="main-article-figure" class="mb-6">
                        <img src="./upload/<?= htmlspecialchars($dataBerita['image']) ?>" alt="Detail"
                            class="w-full h-auto rounded-md shadow-md border-4 border-red-100">
                        <figcaption
                            class="w-full text-justify text-sm md:text-base text-gray-600 mt-3 px-0 leading-tight">
                            <?= 
                                // Proses teks: ganti titik+spasi dengan titik+baris baru
                                nl2br(htmlspecialchars(
                                    preg_replace('/\.\s+/', '.', $dataBerita['description'])
                                )) 
                            ?>
                        </figcaption>
                    </figure>

                    <div id="article-body-content" class="prose prose-lg max-w-none text-gray-700 space-y-4">
                    </div>
                </article>
            </main>


            <?php include 'bagian/template/hotnews.php';?>

        </div>
    </div>

    <?php include 'bagian/template/footer.php';?>

    <script>
    document.getElementById('currentYear').textContent = new Date().getFullYear();


    const currentArticleStaticData = {
        title: <?= htmlspecialchars($dataBerita['judul']) ?>,
    };

    let currentArticlePart = 1;
    const articleBodyContentDiv = document.getElementById('article-body-content');
    const prevArticlePartButton = document.getElementById('prev-article-part');
    const nextArticlePartButton = document.getElementById('next-article-part');
    const articlePageInfoSpan = document.getElementById('article-page-info');

    const mainArticleTitleEl = document.getElementById('main-article-title');
    const mainArticleMetaEl = document.getElementById('main-article-meta');
    const mainArticleFigureEl = document.getElementById('main-article-figure');

    function loadStaticArticleData() {
        if (mainArticleTitleEl) mainArticleTitleEl.textContent = currentArticleStaticData.title;
        if (mainArticleMetaEl) {
            mainArticleMetaEl.innerHTML = `
                    <span>Dipublikasikan: <time datetime="${new Date(currentArticleStaticData.date.split(',')[0]).toISOString().split('T')[0]}">${currentArticleStaticData.date}</time></span> |
                    <span>Oleh: ${currentArticleStaticData.author}</span>
                `;
        }
        if (mainArticleFigureEl) {
            mainArticleFigureEl.innerHTML = `
                    <img src="${currentArticleStaticData.imageSrc}" alt="${currentArticleStaticData.imageAlt}" class="w-full h-auto rounded-md shadow-md border-4 border-red-100">
                    <figcaption class="text-center text-xs text-gray-500 mt-2">${currentArticleStaticData.imageCaption}</figcaption>
                `;
        }
    }


    function displayArticlePart(pageNumber) {
        if (!articleBodyContentDiv || pageNumber < 1 || pageNumber > articleContentParts.length) {
            return;
        }
        currentArticlePart = pageNumber;
        articleBodyContentDiv.innerHTML = articleContentParts[pageNumber - 1];

        articleBodyContentDiv.classList.remove('animate-fadeIn');
        void articleBodyContentDiv.offsetWidth;
        articleBodyContentDiv.classList.add('animate-fadeIn');

        if (articlePageInfoSpan) {
            articlePageInfoSpan.textContent = `Bagian ${currentArticlePart} dari ${articleContentParts.length}`;
        }
        if (prevArticlePartButton) {
            prevArticlePartButton.disabled = currentArticlePart === 1;
        }
        if (nextArticlePartButton) {
            nextArticlePartButton.disabled = currentArticlePart === articleContentParts.length;
        }
    }

    if (prevArticlePartButton && nextArticlePartButton) {
        prevArticlePartButton.addEventListener('click', () => {
            if (currentArticlePart > 1) {
                displayArticlePart(currentArticlePart - 1);
            }
        });

        nextArticlePartButton.addEventListener('click', () => {
            if (currentArticlePart < articleContentParts.length) {
                displayArticlePart(currentArticlePart + 1);
            }
        });
    }
    loadStaticArticleData();
    if (articleContentParts.length > 0) {
        displayArticlePart(1);
    } else {
        const paginationControls = document.getElementById('article-pagination-controls');
        if (paginationControls) paginationControls.style.display = 'none';
    }


    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-navbar-input');
    const searchMessage = document.getElementById('search-message');
    const hotNewsListContainer = document.getElementById('hot-news-list');
    const allHotNewsItems = Array.from(hotNewsListContainer.querySelectorAll('.hot-news-item'));
    const resetSearchButton = document.getElementById('reset-search-button');
    const mainArticleContainer = document.getElementById('main-article-container');

    if (searchForm) {
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const query = searchInput.value.toLowerCase().trim();
            searchMessage.textContent = '';
            resetSearchButton.classList.remove('hidden');
            let mainArticleFound = false;
            let hotNewsFoundCount = 0;

            mainArticleContainer.classList.remove('search-highlight-article');
            allHotNewsItems.forEach(item => {
                item.classList.remove('hidden-by-search', 'search-highlight-hotnews');
            });

            if (query === "") {
                searchMessage.textContent = "Silakan masukkan kata kunci pencarian.";
                return;
            }
            if (mainArticleTitleEl && mainArticleTitleEl.textContent.toLowerCase().includes(query)) {
                mainArticleContainer.classList.add('search-highlight-article');
                mainArticleFound = true;
            }

            const fullArticleTextForSearch = articleContentParts.join(" ").toLowerCase();
            if (fullArticleTextForSearch.includes(query)) {
                mainArticleContainer.classList.add('search-highlight-article');
                mainArticleFound = true;
            }

            allHotNewsItems.forEach(item => {
                const titleElement = item.querySelector('.hot-news-title');
                if (titleElement) {
                    const title = titleElement.textContent.toLowerCase();
                    if (title.includes(query)) {
                        item.classList.remove('hidden-by-search');
                        item.classList.add('search-highlight-hotnews');
                        hotNewsFoundCount++;
                    } else {
                        item.classList.add('hidden-by-search');
                    }
                }
            });

            if (!mainArticleFound && hotNewsFoundCount === 0) {
                searchMessage.textContent = `Tidak ada hasil ditemukan untuk "${searchInput.value}".`;
            } else {
                let foundLocations = [];
                if (mainArticleFound) foundLocations.push("artikel utama");
                if (hotNewsFoundCount > 0) foundLocations.push("Hot News");
                searchMessage.textContent =
                    `Hasil untuk "${searchInput.value}" ditemukan di: ${foundLocations.join(' dan ')}.`;
            }
        });
    }

    if (resetSearchButton) {
        resetSearchButton.addEventListener('click', function() {
            searchInput.value = '';
            searchMessage.textContent = '';
            allHotNewsItems.forEach(item => {
                item.classList.remove('hidden-by-search', 'search-highlight-hotnews');
            });
            mainArticleContainer.classList.remove('search-highlight-article');
            resetSearchButton.classList.add('hidden');
        });
    }
    </script>

</body>

</html>