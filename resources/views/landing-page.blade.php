<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Keringanan UKT - FATISDA</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top"><img class="img-fluid" style="width: auto; height: 70px;" src="assets/img/LOGO 1.png" alt="..." /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Guide</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 mb-2 text-uppercase">SISTEM KERINGANAN UANG KULIAH TUNGGAL (UKT) </h1>
                        <h2 class="text-white-50 mx-auto mt-2 fs-6">FAKULTAS TEKNOLOGI INFORMASI DAN SAINS DATA</h2>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5 fs-2">FATISDA</h2>
                        @auth
                            @if(auth()->user()->user_type === 'Admin')
                                <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
                            @else
                                <a class="btn btn-primary" href="{{ route('kuesioner') }}">Kuesioner</a>
                            @endif
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        @endauth

                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Sistem Keringan UKT FATISDA: Menjadikan Pendidikan Lebih Inklusif</h2>
                        <p class="text-white-50">
                            Di FATISDA, kami memahami pentingnya menciptakan kesempatan pendidikan yang setara bagi semua orang, 
                            tanpa memandang latar belakang ekonomi. Itulah sebabnya kami telah mengimplementasikan Sistem Keringan Uang Kuliah Tunggal (UKT) yang bertujuan untuk memberikan akses pendidikan yang lebih inklusif bagi mahasiswa kami.
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets\img\TOWER-UNS.jpg" alt="..." />
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5 bg-black">
                <h1 class="text-center text-white bg-black mb-5 pt-5">GUIDE</h1>
                <!-- Project One Row-->
                <div class="row mb-6 justify-content-center">
                    <div class="col-lg-6 mb-5"><img class="img-fluid" src="assets\img\step1.png" alt="..." /></div>
                    <div class="col-lg-6 mb-5">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Daftar / Login</h4>
                                    <p class="mb-0 text-white-50">Untuk mahasiswa yang belum daftar bisa mendaftar dahulu baru login. Untuk mahasiswa yang sudah daftar bisa langsung login.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row mb-6 justify-content-center">
                    <div class="col-lg-6 mb-5"><img class="img-fluid" src="assets\img\step2.png" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first mb-5">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Isi Form Kuesioner</h4>
                                    <p class="mb-0 text-white-50">Isi form kuesioner sesuai dengan kondisi Anda. Wajib mengisi semua form.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row mb-6 justify-content-center">
                    <div class="col-lg-6 mb-5" ><img class="img-fluid" src="assets\img\step3.png" alt="..." /></div>
                    <div class="col-lg-6 mb-5">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Riwayat Pengajuan</h4>
                                    <p class="mb-0 text-white-50">Setelah mengisi kuesioner otomatis akan direct ke riwayat pengajuan. Pada riwayat pengajuan ini, mahasiswa bisa melihat status pengajuan apakah sudah di approve oleh admin atau belum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Jl. Ir. Sutami No. 36 A 57126 Kentingan Surakarta</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">(0271) 663375</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://www.instagram.com/fatisda_uns/"><i class="fab fa-instagram"></i></a>
                    <a class="mx-2" href="https://if.fatisda.uns.ac.id/"><i class="fa-solid fa-globe"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Sistem Keringanan UKT FATISDA 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
