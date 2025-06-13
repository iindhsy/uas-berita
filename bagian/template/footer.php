<footer class="bg-gradient-to-b from-pink-800 to-pink-900 text-white py-12 mt-16 shadow-lg">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-8">
            <!-- Logo & Deskripsi -->
            <div class="text-center md:text-left max-w-md">
                <div class="flex items-center justify-center md:justify-start space-x-2 mb-4">
                    <!-- Logo Hukum Merah -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="currentColor"
                        viewBox="0 0 24 24">
                        <g>
                            <path
                                d="M12 2a1 1 0 0 1 1 1v1.07c3.39.49 6 3.39 6 6.93 0 2.39-1.19 4.5-3 5.74V19a3 3 0 0 1-6 0v-2.26C6.19 14.5 5 12.39 5 10c0-3.54 2.61-6.44 6-6.93V3a1 1 0 0 1 1-1zm0 2C9.24 4 7 6.24 7 9c0 1.93 1.02 3.63 2.56 4.5a1 1 0 0 1 .44.83V19a1 1 0 0 0 2 0v-4.67a1 1 0 0 1 .44-.83C15.98 12.63 17 10.93 17 9c0-2.76-2.24-5-5-5z" />
                            <rect x="10" y="20" width="4" height="2" rx="1" fill="#b91c1c" />
                        </g>
                    </svg>
                    <span class="text-2xl font-bold">PortalMerahKebanggan</span>
                </div>
                <p class="text-red-100 mb-4">Menyajikan informasi terkini dengan semangat kebangsaan Indonesia.</p>
                <p class="text-sm text-red-300">&copy; <span id="currentYear"></span> PortalMerahKebanggan. All rights
                    reserved.</p>
            </div>

            <!-- Kontak -->
            <div class="text-center md:text-right">
                <h3
                    class="text-xl font-bold mb-4 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-16 after:h-1 after:bg-white after:rounded-full">
                    Hubungi Kami
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-center justify-center md:justify-end space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:kontak@portalMerahKebanggan.id"
                            class="hover:text-red-300 transition">blogNews@gmail.com</a>
                    </li>
                    <li class="flex items-center justify-center md:justify-end space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="tel:+628123456789" class="hover:text-red-300 transition">+62 812 6116 3339</a>
                    </li>
                    <li class="flex items-center justify-center md:justify-end space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <a href="https://www.instagram.com/rassidrsdslpa05_?igsh=dWJld2pwY21ndjdv&utm_source=qr"
                            target="_blank" class="hover:text-red-300 transition">@blogNews</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Lokasi & Copyright -->
        <div class="mt-12 pt-6 border-t border-red-700 text-center">
            <div class="flex justify-center items-center space-x-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-red-200">Medan, Indonesia</span>
            </div>
        </div>
    </div>
</footer>

<script>
document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>