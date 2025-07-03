<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 1 Batang Gasan - Website Resmi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#1e3a8a',
                        accent: '#fbbf24',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .nav-link {
                @apply px-3 py-2 text-sm font-medium text-white hover:text-accent transition duration-300;
            }
            .btn-primary {
                @apply px-4 py-2 bg-accent text-primary font-semibold rounded hover:bg-yellow-500 transition duration-300;
            }
            .section-title {
                @apply text-2xl md:text-3xl font-bold text-primary mb-6 relative;
            }
            .section-title::after {
                content: '';
                @apply absolute bottom-0 left-0 w-20 h-1 bg-accent;
            }
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-primary text-white py-2 px-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-4">
                <span class="flex items-center"><i class="fas fa-phone mr-2"></i> (0752) 12345</span>
                <span class="flex items-center"><i class="fas fa-envelope mr-2"></i> info@sman1batanggasan.sch.id</span>
            </div>
            <div class="flex space-x-4 mt-2 md:mt-0">
                <a href="#" class="text-white hover:text-accent"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white hover:text-accent"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white hover:text-accent"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center mb-4 md:mb-0">
                <img src="/R.png" alt="Logo SMAN 1 Batang Gasan" class="h-16 mr-4">
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-primary">SMAN 1 BATANG GASAN</h1>
                    <p class="text-sm text-gray-600">Unggul dalam Prestasi, Berkarakter, dan Berwawasan Lingkungan</p>
                </div>
            </div>
            <div class="flex items-center">
                <button class="md:hidden text-primary text-2xl" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="hidden md:flex space-x-1">
                    <a href="#" class="nav-link bg-secondary rounded">Beranda</a>
                    <a href="#" class="nav-link">Profil</a>
                    <a href="#" class="nav-link">Akademik</a>
                    <a href="#" class="nav-link">Kesiswaan</a>
                    <a href="#" class="nav-link">Fasilitas</a>
                    <a href="#" class="nav-link">PPDB</a>
                    <a href="#" class="nav-link">Berita</a>
                    <a href="#" class="nav-link">Galeri</a>
                    <a href="#" class="nav-link">Kontak</a>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-secondary w-full" id="mobile-menu">
            <div class="container mx-auto px-4 py-2 flex flex-col">
                <a href="#" class="nav-link py-3 border-b border-blue-800">Beranda</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">Profil</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">Akademik</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">Kesiswaan</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">Fasilitas</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">PPDB</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">Berita</a>
                <a href="#" class="nav-link py-3 border-b border-blue-800">Galeri</a>
                <a href="#" class="nav-link py-3">Kontak</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative">
        <div class="relative">
            <div class="w-full h-[500px] bg-gray-300 overflow-hidden">
                <img src="/R.png" alt="SMAN 1 Batang Gasan" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h2 class="text-3xl md:text-5xl font-bold mb-4">Selamat Datang di SMAN 1 Batang Gasan</h2>
                    <p class="text-lg md:text-xl mb-8">Mencetak Generasi Unggul, Berkarakter, dan Berwawasan Lingkungan</p>
                    <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                        <a href="/login" class="btn-primary">PPDB Online</a>
                        <a href="#" class="btn-primary">Profil Sekolah</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Info Cards -->
        <div class="container mx-auto px-4 -mt-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center">
                    <div class="bg-primary rounded-full p-4 mr-4 text-white">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-primary">Pendidikan Berkualitas</h3>
                        <p class="text-gray-600">Kurikulum terkini dan pembelajaran inovatif</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center">
                    <div class="bg-primary rounded-full p-4 mr-4 text-white">
                        <i class="fas fa-medal text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-primary">Prestasi Siswa</h3>
                        <p class="text-gray-600">Berbagai prestasi akademik dan non-akademik</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center">
                    <div class="bg-primary rounded-full p-4 mr-4 text-white">
                        <i class="fas fa-chalkboard-teacher text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-primary">Tenaga Pengajar</h3>
                        <p class="text-gray-600">Guru profesional dan berpengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="section-title pb-2">Sambutan Kepala Sekolah</h2>
                    <p class="text-gray-700 mb-4">Assalamu'alaikum Wr. Wb.</p>
                    <p class="text-gray-700 mb-4">
                        Puji syukur kita panjatkan ke hadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya sehingga website SMAN 1 Batang Gasan dapat hadir di hadapan Bapak/Ibu semuanya.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Sebagai salah satu sekolah unggulan di Kabupaten Padang Pariaman, SMAN 1 Batang Gasan berkomitmen untuk terus meningkatkan kualitas pendidikan dan pelayanan kepada masyarakat. Website ini merupakan salah satu upaya kami untuk memberikan informasi yang akurat dan terkini tentang sekolah kami.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Kami berharap website ini dapat menjadi jembatan komunikasi antara sekolah, siswa, orang tua, dan masyarakat luas. Terima kasih atas dukungan semua pihak dalam memajukan pendidikan di SMAN 1 Batang Gasan.
                    </p>
                    <p class="text-gray-700 mb-4">Wassalamu'alaikum Wr. Wb.</p>
                    <div class="mt-6">
                        <p class="font-semibold text-primary">Drs. Ahmad Fauzi, M.Pd.</p>
                        <p class="text-gray-600">Kepala SMAN 1 Batang Gasan</p>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-primary rounded-lg transform -rotate-6"></div>
                        <img src="/R.png" alt="Kepala Sekolah" class="relative w-64 h-80 object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="section-title pb-2 mb-8">Berita Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Berita 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/R.pngFlokasi" alt="Berita 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>15 Maret 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-primary mb-2">Siswa SMAN 1 Batang Gasan Raih Juara Olimpiade Sains</h3>
                        <p class="text-gray-600 mb-4">Prestasi membanggakan kembali diraih oleh siswa SMAN 1 Batang Gasan dalam ajang Olimpiade Sains Nasional tingkat Provinsi...</p>
                        <a href="#" class="text-primary font-medium hover:text-secondary">Baca selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Berita 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/R.pngFlokasi" alt="Berita 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>10 Maret 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-primary mb-2">Peringatan Hari Pendidikan Nasional 2023</h3>
                        <p class="text-gray-600 mb-4">SMAN 1 Batang Gasan mengadakan upacara dan berbagai kegiatan dalam rangka memperingati Hari Pendidikan Nasional...</p>
                        <a href="#" class="text-primary font-medium hover:text-secondary">Baca selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Berita 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/R.pngFlokasi" alt="Berita 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>5 Maret 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-primary mb-2">Kunjungan Dinas Pendidikan ke SMAN 1 Batang Gasan</h3>
                        <p class="text-gray-600 mb-4">Dinas Pendidikan Kabupaten Padang Pariaman melakukan kunjungan kerja ke SMAN 1 Batang Gasan untuk meninjau...</p>
                        <a href="#" class="text-primary font-medium hover:text-secondary">Baca selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="#" class="btn-primary">Lihat Semua Berita</a>
            </div>
        </div>
    </section>



    <!-- Agenda Kegiatan -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="section-title pb-2 mb-8">Agenda Kegiatan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-primary text-white rounded-lg p-4 text-center mr-4 flex-shrink-0">
                            <span class="block text-2xl font-bold">20</span>
                            <span class="block text-sm">April</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-primary mb-2">Ujian Sekolah Kelas XII</h3>
                            <p class="text-gray-600 mb-2">Waktu: 08.00 - 12.00 WIB</p>
                            <p class="text-gray-600">Tempat: Ruang Kelas</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-primary text-white rounded-lg p-4 text-center mr-4 flex-shrink-0">
                            <span class="block text-2xl font-bold">25</span>
                            <span class="block text-sm">April</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-primary mb-2">Rapat Orang Tua Siswa</h3>
                            <p class="text-gray-600 mb-2">Waktu: 09.00 - 11.00 WIB</p>
                            <p class="text-gray-600">Tempat: Aula Sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-primary text-white rounded-lg p-4 text-center mr-4 flex-shrink-0">
                            <span class="block text-2xl font-bold">1</span>
                            <span class="block text-sm">Mei</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-primary mb-2">Peringatan Hari Buruh</h3>
                            <p class="text-gray-600 mb-2">Waktu: 08.00 - 10.00 WIB</p>
                            <p class="text-gray-600">Tempat: Lapangan Sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-primary text-white rounded-lg p-4 text-center mr-4 flex-shrink-0">
                            <span class="block text-2xl font-bold">10</span>
                            <span class="block text-sm">Mei</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-primary mb-2">Lomba Kebersihan Kelas</h3>
                            <p class="text-gray-600 mb-2">Waktu: 08.00 - 14.00 WIB</p>
                            <p class="text-gray-600">Tempat: Seluruh Ruang Kelas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="#" class="btn-primary">Lihat Semua Agenda</a>
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="section-title pb-2 mb-8">Fasilitas Sekolah</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Perpustakaan</h3>
                    <p class="text-gray-600">Koleksi buku lengkap untuk menunjang pembelajaran</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-flask text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Laboratorium IPA</h3>
                    <p class="text-gray-600">Fasilitas praktikum lengkap untuk Fisika, Kimia, dan Biologi</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-desktop text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Lab Komputer</h3>
                    <p class="text-gray-600">Komputer modern dengan akses internet cepat</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-futbol text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Lapangan Olahraga</h3>
                    <p class="text-gray-600">Lapangan basket, voli, dan futsal</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-pray text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Musholla</h3>
                    <p class="text-gray-600">Tempat ibadah yang nyaman dan bersih</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-first-aid text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">UKS</h3>
                    <p class="text-gray-600">Fasilitas kesehatan untuk pertolongan pertama</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Kantin</h3>
                    <p class="text-gray-600">Kantin sehat dengan makanan bergizi</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md hover:shadow-lg transition duration-300">
                    <div class="bg-primary inline-block p-4 rounded-full text-white mb-4">
                        <i class="fas fa-wifi text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">Wifi</h3>
                    <p class="text-gray-600">Akses internet cepat di seluruh area sekolah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center">SMAN 1 Batang Gasan dalam Angka</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold mb-2">750</div>
                    <div class="text-xl">Siswa</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">45</div>
                    <div class="text-xl">Guru & Staf</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">24</div>
                    <div class="text-xl">Ruang Kelas</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">15</div>
                    <div class="text-xl">Ekstrakurikuler</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->


    <!-- PPDB -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="bg-primary rounded-lg shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 p-8 md:p-12">
                        <h2 class="text-3xl font-bold text-white mb-4">Penerimaan Peserta Didik Baru 2023/2024</h2>
                        <p class="text-white mb-6">SMAN 1 Batang Gasan membuka pendaftaran untuk siswa baru tahun ajaran 2023/2024. Segera daftarkan diri Anda untuk mendapatkan pendidikan berkualitas!</p>
                        <ul class="text-white mb-8 space-y-2">
                            <li class="flex items-center"><i class="fas fa-check-circle mr-2 text-accent"></i> Fasilitas lengkap</li>
                            <li class="flex items-center"><i class="fas fa-check-circle mr-2 text-accent"></i> Guru berpengalaman</li>
                            <li class="flex items-center"><i class="fas fa-check-circle mr-2 text-accent"></i> Lingkungan belajar kondusif</li>
                            <li class="flex items-center"><i class="fas fa-check-circle mr-2 text-accent"></i> Beragam ekstrakurikuler</li>
                        </ul>
                        <a href="#" class="btn-primary">Daftar Sekarang</a>
                    </div>
                    <div class="md:w-1/2 bg-white p-8 md:p-12">
                        <h3 class="text-2xl font-semibold text-primary mb-4">Jadwal Pendaftaran</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Pendaftaran Online</h4>
                                    <p class="text-gray-600">1 - 30 April 2023</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Verifikasi Berkas</h4>
                                    <p class="text-gray-600">1 - 5 Mei 2023</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Tes Seleksi</h4>
                                    <p class="text-gray-600">10 - 12 Mei 2023</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Pengumuman Hasil</h4>
                                    <p class="text-gray-600">20 Mei 2023</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Daftar Ulang</h4>
                                    <p class="text-gray-600">21 - 25 Mei 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="section-title pb-2 mb-8">Hubungi Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="text-xl font-semibold text-primary mb-4">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Alamat</h4>
                                    <p class="text-gray-600">Jl. Raya Batang Gasan, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Telepon</h4>
                                    <p class="text-gray-600">(0752) 12345</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Email</h4>
                                    <p class="text-gray-600">info@sman1batanggasan.sch.id</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary text-white rounded p-2 mr-4 flex-shrink-0">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary">Jam Operasional</h4>
                                    <p class="text-gray-600">Senin - Jumat: 07.00 - 15.00 WIB</p>
                                    <p class="text-gray-600">Sabtu: 07.00 - 12.00 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold text-primary mb-4">Sosial Media</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-primary text-white p-3 rounded-full hover:bg-secondary transition duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="bg-primary text-white p-3 rounded-full hover:bg-secondary transition duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="bg-primary text-white p-3 rounded-full hover:bg-secondary transition duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="bg-primary text-white p-3 rounded-full hover:bg-secondary transition duration-300">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-primary mb-4">Kirim Pesan</h3>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                            <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Lokasi -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <h2 class="text-xl font-semibold text-primary p-4 border-b">Lokasi Sekolah</h2>
                <div class="h-96 bg-gray-200">
                    <!-- Placeholder for Google Maps -->
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-5xl text-primary mb-4"></i>
                            <p class="text-gray-600">Peta Lokasi SMAN 1 Batang Gasan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">SMAN 1 Batang Gasan</h3>
                    <p class="mb-4">Unggul dalam Prestasi, Berkarakter, dan Berwawasan Lingkungan</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-accent"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white hover:text-accent"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white hover:text-accent"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white hover:text-accent"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Beranda</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Profil Sekolah</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Berita</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Galeri</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">PPDB Online</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Program</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">MIPA</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">IPS</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Ekstrakurikuler</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Adiwiyata</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Literasi</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span>Jl. Raya Batang Gasan, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <span>(0752) 12345</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>info@sman1batanggasan.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-blue-800 pt-6 text-center">
                <p>&copy; 2023 SMAN 1 Batang Gasan. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Sticky Header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle('sticky-header', window.scrollY > 100);
        });
    </script>
</body>
</html>
