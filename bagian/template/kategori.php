<?php
// Ambil kategori aktif dari URL (jika ada)
$kategoriAktif = isset($_GET['kategori']) ? $_GET['kategori'] : '';
?>

<aside class="lg:col-span-1 animate-fadeIn" style="animation-delay: 0.2s;">
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-pink-700 mb-4 border-b-2 border-red-200 pb-2">Kategori</h2>
        <ul class="space-y-2">
            <li>
                <a href="?page=home&kategori=politik" 
                   class="block p-2 rounded hover:text-red-600 hover:bg-red-50
                   <?= $kategoriAktif === 'politik' ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                    Politik
                </a>
            </li>
            <li>
                <a href="?page=home&kategori=ekonomi" 
                   class="block p-2 rounded hover:text-red-600 hover:bg-red-50
                   <?= $kategoriAktif === 'ekonomi' ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                    Ekonomi & Bisnis
                </a>
            </li>
            <li>
                <a href="?page=home&kategori=teknologi" 
                   class="block p-2 rounded hover:text-red-600 hover:bg-red-50
                   <?= $kategoriAktif === 'teknologi' ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                    Teknologi
                </a>
            </li>
            <li>
                <a href="?page=home&kategori=hiburan" 
                   class="block p-2 rounded hover:text-red-600 hover:bg-red-50
                   <?= $kategoriAktif === 'hiburan' ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                    Hiburan
                </a>
            </li>
            <li>
                <a href="?page=home&kategori=gayahidup" 
                   class="block p-2 rounded hover:text-red-600 hover:bg-red-50
                   <?= $kategoriAktif === 'gayahidup' ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                    Gaya Hidup
                </a>
            </li>
            <li>
                <a href="?page=home&kategori=olahraga" 
                   class="block p-2 rounded hover:text-red-600 hover:bg-red-50
                   <?= $kategoriAktif === 'olahraga' ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                    Olahraga
                </a>
            </li>
        </ul>
    </div>
</aside>
