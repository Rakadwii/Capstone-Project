<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Zero Waste Kitchen</title>
    <link href="{{ asset('assets/css/globals.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styleguide.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">
</head>

<body>
    <div class="landing-page">

        {{-- ===================== NAVBAR ===================== --}}
        <div class="frame-7">
            <div class="group">
                <div class="group-2">
                    <img class="gemini-generated" src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
                    <div class="text-wrapper-30">Zero</div>
                    <div class="text-wrapper-31">Waste</div>
                    <div class="text-wrapper-32">Kitchen</div>
                </div>
                <div class="heading-name">
                    <div class="label-wrapper"><a href="#hero" class="label-2">Home</a></div>
                    <div class="label-wrapper"><a href="#about" class="label-3">About</a></div>
                    <div class="label-wrapper"><a href="#feature" class="label-3">Feature</a></div>
                    <div class="label-wrapper"><a href="#benefits" class="label-3">Benefits</a></div>
                    <div class="label-wrapper"><a href="#teams" class="label-3">Our Team</a></div>
                </div>
            </div>
            <div class="login">
                <a href="{{ route('login') }}">
                    <button class="button-2">
                        <div class="text-wrapper-28">Login</div>
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="button-3">
                        <div class="text-wrapper-29">Sign up</div>
                    </button>
                </a>
            </div>
        </div>

        {{-- ===================== HERO ===================== --}}
        <section id="hero" class="home">
            <div class="hero-section">
                <div class="frame">
                    <div class="text">
                        <p class="zero-waste-kitchen">
                            <span class="text-wrapper">Zero </span><span class="span">Waste</span><span
                                class="text-wrapper"> Kitchen</span>
                        </p>
                        <p class="div">Solusi Cerdas Kelola Dapur Ramah Lingkungan. Pantau produksi sampah organik Anda,
                            dapatkan ide resep kreatif dari bahan sisa, dan pelajari cara menerapkan gaya hidup minim
                            limbah setiap hari.</p>
                    </div>
                    <a href="{{ route('rekomendasi.cari') }}">
                        <button class="button">
                            <div class="label">Mulai Analisis</div>
                        </button>
                    </a>
                </div>
                <img class="aacfb-f-cd" src="{{ asset('assets/img/masak.png') }}" alt="Hero Illustration" />
            </div>
        </section>

        {{-- ===================== ABOUT ===================== --}}
        <section id="about" class="body">
            <div class="unlock">
                <img class="element" src="{{ asset('assets/img/about.png') }}" alt="About" />
                <div class="frame-wrapper">
                    <div class="frame-2">
                        <div class="text-wrapper-2">About</div>
                        <p class="when-joining-the">
                            Zero Waste Kitchen adalah inisiatif untuk membantu Anda mengelola sisa makanan dan
                            meminimalkan limbah rumah tangga. Dengan mengadopsi prinsip ini, Anda tidak hanya menghemat
                            uang, tetapi juga memberikan kontribusi positif bagi lingkungan dengan mengurangi emisi gas
                            rumah kaca dari TPA. Aplikasi ini menyediakan analisis, tips praktis, dan resep kreatif
                            untuk
                            mengubah sisa bahan makanan menjadi hidangan lezat.
                            <br />Temukan cara-cara inovatif untuk menjalani gaya hidup yang lebih berkelanjutan mulai
                            dari dapur Anda.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== FEATURE ===================== --}}
        <section id="feature" class="body-2">
            <div class="unlock">
                <p class="apa-saja-fiturnya">
                    <span class="text-wrapper-3">Apa saja</span><span class="text-wrapper-4">&nbsp;</span><span
                        class="text-wrapper-5">fiturnya?</span>
                </p>
                <div class="when-joining-the-wrapper">
                    <p class="p">Fitur pada aplikasi ini dirancang untuk membantu pengguna meminimalkan dan mengelola
                        limbah dapur, mulai dari riwayat analisis sisa bahan pangan, analisis pola pemborosan, hingga
                        pemberian rekomendasi resep kreatif kebiasaan memasak Anda.</p>
                </div>

                {{-- Feature content: grid kiri + gambar kanan --}}
                <div class="feature-content">
                    <div class="features-grid">
                        <div class="feature-item">
                            <img class="mdi-basket-fill" src="{{ asset('assets/img/input.png') }}" alt="Input" />
                            <div class="text-wrapper-6">Input Bahan Sisa Praktis</div>
                            <div class="div-wrapper">
                                <p class="when-joining-the-2">Pengguna dapat memasukkan daftar bahan makanan apa saja
                                    yang
                                    masih layak pakai dan tersedia di rumah atau di dalam kulkas mereka.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <img class="fluent-brain-sparkle" src="{{ asset('assets/img/rekomendasi.png') }}"
                                alt="Rekomendasi" />
                            <div class="text-wrapper-7">Rekomendasi Menu Pintar</div>
                            <div class="frame-3">
                                <p class="when-joining-the-3">Sistem pintar kami akan otomatis menghitung tingkat
                                    kemiripan
                                    antara bahan sisa yang Anda miliki dengan ratusan database resep, memberikan saran
                                    hidangan
                                    paling pas dalam hitungan detik.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <img class="material-symbols" src="{{ asset('assets/img/panduan.png') }}" alt="Panduan" />
                            <div class="text-wrapper-8">Panduan Resep Masakan</div>
                            <div class="frame-4">
                                <p class="when-joining-the-3">Menyediakan informasi detail mengenai resep,
                                    langkah-langkah
                                    memasak secara berurutan, estimasi waktu pembuatan, hingga catatan bahan tambahan
                                    yang
                                    diperlukan.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <img class="iconamoon-history" src="{{ asset('assets/img/riwayat.png') }}" alt="Riwayat" />
                            <div class="text-wrapper-9">Riwayat Analisis</div>
                            <div class="frame-5">
                                <p class="when-joining-the-3">Lacak semua analisis yang telah Anda lakukan, pantau pola
                                    penggunaan bahan, dan lihat rekomendasi resep dari riwayat sebelumnya.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Gambar di kanan --}}
                    <div class="feature-image">
                        <img class="beea-ba-e" src="{{ asset('assets/img/gambar-fitur.png') }}"
                            alt="Fitur Illustration" />
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== BENEFITS ===================== --}}
        <section id="benefits" class="unlock-wrapper">
            <div class="unlock">
                <div class="text-wrapper-10">Benefits</div>
                <div class="when-joining-the-wrapper">
                    <p class="when-joining-the-4">Berikut ini adalah manfaat yang akan Anda dapatkan jika Anda
                        menerapkan gaya hidup minim sampah dapur (zero waste) untuk kelestarian lingkungan dan efisiensi
                        rumah tangga Anda.</p>
                </div>

                <div class="benefits-grid">
                    <div class="benefit-card">
                        <img class="fluent-bin-recycle" src="{{ asset('assets/img/dompet.png') }}" alt="Recycle" />
                        <div class="text-wrapper-15">Hemat Anggaran Belanja Dapur</div>
                        <p class="text-wrapper-12">Kurangi pengeluaran dengan mengolah bahan yang tersedia menjadi menu
                            yang praktis dan lezat.</p>
                    </div>

                    <div class="benefit-card">
                        <img class="fluent-bin-recycle" src="{{ asset('assets/img/sampah.png') }}" alt="Recycle" />
                        <div class="text-wrapper-15">Kurangi Sampah Organik</div>
                        <p class="text-wrapper-12">Kurangi food waste dengan mengolah bahan yang tersedia menjadi
                            hidangan yang bermanfaat.</p>
                    </div>

                    <div class="benefit-card">
                        <img class="ri-lightbulb-ai-line" src="{{ asset('assets/img/lampu.png') }}" alt="Lightbulb" />
                        <p class="inspirasi-masak">Inspirasi Masak Instan &amp; Anti-Ribet</p>
                        <p class="text-wrapper-13">Punya bahan seadanya? Temukan ide masakan lezat dan praktis secara
                            instan.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== OUR TEAMS ===================== --}}
        <section id="teams" class="body-3">
            <div class="unlock">
                <div class="text-wrapper-16">Our Teams</div>

                <div class="catalogue-car">
                    {{-- Veno --}}
                    <div class="catalog-wrapper">
                        <div class="catalog">
                            <div class="text-wrapper-17">AI Engineer</div>
                            <img src="{{ asset('assets/img/veno.png') }}" alt="Moh. Veno Renanda" />

                            <div class="price">
                                <div class="text-wrapper-18">Moh. Veno Renanda</div>
                            </div>
                        </div>
                    </div>

                    {{-- Raka --}}
                    <div class="catalog-wrapper">
                        <div class="catalog">
                            <div class="text-wrapper-17">AI Engineer</div>
                            <img src="{{ asset('assets/img/raka.png') }}" alt="Moh. Veno Renanda" />

                            <div class="price">
                                <div class="text-wrapper-18">Raka Dwi Irsyad Firdaus</div>
                            </div>
                        </div>
                    </div>

                    {{-- Angga --}}
                    <div class="catalog-wrapper">
                        <div class="catalog">
                            <div class="text-wrapper-17">AI Engineer</div>
                            <img src="{{ asset('assets/img/angga.png') }}" alt="Moh. Veno Renanda" />

                            <div class="price">
                                <div class="text-wrapper-18">Angga Prasetio</div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="catalogue-car">
                    {{-- Ratna --}}
                    <div class="catalog-wrapper">
                        <div class="catalog">
                            <div class="text-wrapper-17">AI Engineer</div>
                            <img src="{{ asset('assets/img/Ratna.png') }}" alt="Moh. Veno Renanda" />

                            <div class="price">
                                <div class="text-wrapper-18">Ratna Indah Anggraini</div>
                            </div>
                        </div>
                    </div>

                    {{-- Pitria --}}
                    <div class="catalog-wrapper">
                        <div class="catalog">
                            <div class="text-wrapper-17">AI Engineer</div>
                            <img src="{{ asset('assets/img/pitria.png') }}" alt="Moh. Veno Renanda" />

                            <div class="price">
                                <div class="text-wrapper-18">Pitria Bais Mawarti</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== FOOTER ===================== --}}
        <footer class="footer">
            <div class="frame-6"></div>

            <div class="footer-big">
                <div class="company-info">
                    <div class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
                    </div>
                    <div class="copyright">
                        <p class="copyright-2">Copyright &copy; 2026 | ZeroWasteKitchen</p>
                        <div class="text-wrapper-26">All rights reserved</div>
                    </div>
                </div>

                <div class="links">
                    <div class="col">
                        <div class="company">Tentang Kami</div>
                        <div class="list-items">
                            <a href="#hero" class="about-us">Home</a>
                            <a href="#about" class="text-wrapper-27">About</a>
                            <a href="#feature" class="text-wrapper-27">Feature</a>
                            <a href="#benefits" class="text-wrapper-27">Benefits</a>
                            <a href="#teams" class="text-wrapper-27">Our Teams</a>
                        </div>
                    </div>
                </div>

                <div class="social-links">
                    <div class="text-wrapper-33">Contact with us</div>
                    <div class="social-icons-wrapper">
                        <a href="#" aria-label="Website">
                            <img class="social-icons-2" src="{{ asset('assets/img/web.png') }}" alt="Website" />
                        </a>
                        <a href="#" aria-label="Instagram">
                            <img class="social-icons-3" src="{{ asset('assets/img/instagram.png') }}" alt="Instagram" />
                        </a>
                        <a href="#" aria-label="WhatsApp">
                            <img class="social-icons-4" src="{{ asset('assets/img/whatsapp.png') }}" alt="WhatsApp" />
                        </a>
                        <a href="#" aria-label="YouTube">
                            <img class="social-icons" src="{{ asset('assets/img/youtube.png') }}" alt="YouTube" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-brand">
                <div class="text-wrapper-25">Zero</div>
                <div class="text-wrapper-24">Waste</div>
                <div class="text-wrapper-23">Kitchen</div>
            </div>
        </footer>

    </div>
</body>

</html>