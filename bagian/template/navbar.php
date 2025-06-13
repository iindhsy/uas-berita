<?php
include_once __DIR__ . '/../../controllers/AuthController.php';
$auth = new AuthController($connect);
?>

<nav class="bg-gradient-to-r from-pink-600 to-pink-700 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="index.php?page=home" class="flex items-center space-x-2 group">
                    <!-- Logo Hukum Merah -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 text-white group-hover:text-red-200 transition-colors" fill="currentColor"
                        viewBox="0 0 24 24">
                        <g>
                            <path
                                d="M12 2a1 1 0 0 1 1 1v1.07c3.39.49 6 3.39 6 6.93 0 2.39-1.19 4.5-3 5.74V19a3 3 0 0 1-6 0v-2.26C6.19 14.5 5 12.39 5 10c0-3.54 2.61-6.44 6-6.93V3a1 1 0 0 1 1-1zm0 2C9.24 4 7 6.24 7 9c0 1.93 1.02 3.63 2.56 4.5a1 1 0 0 1 .44.83V19a1 1 0 0 0 2 0v-4.67a1 1 0 0 1 .44-.83C15.98 12.63 17 10.93 17 9c0-2.76-2.24-5-5-5z" />
                            <rect x="10" y="20" width="4" height="2" rx="1" fill="#b91c1c" />
                        </g>
                    </svg>
                    <span
                        class="text-2xl font-bold text-white group-hover:text-red-200 transition-colors">blogNews</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <div class="flex space-x-4">
                    <a href="/beritaDw/index.php?page=home"
                        class="nav-link px-3 py-2 rounded-md text-sm font-medium relative group">
                        <span>Home</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
            <div class="hidden md:flex items-center space-x-6">
                <div class="flex space-x-4">
                    <a href="/beritaDw/index.php?page=unggah"
                        class="nav-link px-3 py-2 rounded-md text-sm font-medium relative group">
                        <span>Upload</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
            <div class="hidden md:flex items-center space-x-6">
                <div class="flex space-x-4">
                    <a href="/beritaDW/index.php?page=regis"
                        class="nav-link px-3 py-2 rounded-md text-sm font-medium relative group">
                        <span>Sign Up</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="relative">
                    <form id="search-form" class="flex items-center">
                        <div class="relative">
                            <input type="search" id="search-navbar-input" name="query" placeholder="Cari berita..."
                                class="pl-10 pr-4 py-2 text-sm bg-white/90 text-gray-900 rounded-full border-0 
                                          focus:ring-2 focus:ring-white focus:bg-white focus:outline-none 
                                          transition-all duration-300 shadow-sm w-64"
                                style="backdrop-filter: blur(4px);">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <button type="submit"
                            class="ml-2 p-2 rounded-full bg-white/20 hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                    <button id="reset-search-button"
                        class="hidden absolute -right-4 top-0 transform translate-x-full px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">Reset</button>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button"
                    class="text-white hover:text-red-200 focus:outline-none transition-colors">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-red-700 px-4 pb-4">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/portal-polmed/index.php?page=home"
                class="nav-link block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-red-600">Home</a>
        </div>
        <div class="mt-2">
            <form id="mobile-search-form" class="flex">
                <input type="search" placeholder="Cari berita..."
                    class="flex-1 px-4 py-2 rounded-l-full bg-white/90 focus:outline-none focus:bg-white">
                <button type="submit" class="px-4 py-2 rounded-r-full bg-red-800 text-white hover:bg-red-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>

<script>
// Highlight active nav link
const urlParams = new URLSearchParams(window.location.search);
const currentPage = urlParams.get('page') || 'home';
const links = document.querySelectorAll('.nav-link');

links.forEach(link => {
    const linkPage = new URL(link.href).searchParams.get('page');
    if (linkPage === currentPage) {
        link.classList.add('bg-white/10', 'text-red-200');
        const underline = link.querySelector('span:last-child');
        if (underline) underline.classList.add('w-full');
    } else {
        link.classList.add('text-white', 'hover:text-red-200');
    }
});

// Mobile menu toggle
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});
</script>