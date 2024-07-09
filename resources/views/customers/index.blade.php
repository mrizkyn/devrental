@extends('customers.layouts.app')

@section('content')
<section class="py-0" id="home">
    <div class="container">
      <div class="row align-items-center min-vh-md-75 mt-7">
        <div class="col-md-6 col-lg-6 py-6 text-sm-start text-center">
          <h1 class="mt-6 mb-sm-4 display-4 fw-light lh-sm fs-4 fs-lg-6 fs-xxl-7">SEWA MOBIL <br> <span class="fw-bold" style="color: #102C42;">BANDUNG</span></h1>
          <p class="mb-5 fs-1 lh-lg">DEVRental Platform Sewa Mobil Termurah <br> Se-Kota <span class="fw-bold">Bandung</span></p>
          <div class="search-container" style="margin-left: 9px;">
            <input type="text" class="search-input" placeholder="Cari Mobil Kebutuhan Anda" style="color: #102C42;">
            <button class="search-button">
              <svg class="bi bi-search" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.742 1.356a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"></path>
              </svg>
            </button>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 py-6 text-center">
            <img src="{{ asset('executive/public/assets/img/gallery/Background.png') }}" alt="Image" class="img-fluid">        </div>
      </div>
    </div>
  </section>


  <section id="testimonial">

    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto text-center my-5">
          <h5 class="fw-light fs-3 fs-lg-5 lh-sm mb-4">Testimonial Pelanggan</h5>
        </div>
      </div>
      <div class="row flex-center h-100">
        <div class="col-xl-9">
          <div class="carousel slide" id="carouselTestimonials" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="row h-100 justify-content-center">
                  <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow card-span p-3">
                      <div class="card-body">
                        <div class="d-flex align-items-center"><img class="img-fluid" src="assets/img/gallery/user-1.png" alt="testimonials" />
                          <div class="flex-1 ms-4">
                            <h6 class="fw-light fs-lg-1 mb-1">Haris Sulaiman</h6>
                            <p class="fw-normal mb-0 text-800">Penyewa Mobil</p>
                          </div>
                        </div>
                        <p class="mb-0 mt-4 fw-light lh-lg">Mobil yang kami sewa dari DEVRENTAL sangat baik dan layanan mereka profesional. Kami pasti akan merekomendasikan kepada teman-teman kami!</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow card-span p-3">
                      <div class="card-body">
                        <div class="d-flex align-items-center"><img class="img-fluid" src="assets/img/gallery/user-2.png" alt="testimonials" />
                          <div class="flex-1 ms-4">
                            <h6 class="fw-light fs-lg-1 mb-1">Adipati</h6>
                            <p class="fw-normal mb-0 text-800">Penyewa Mobil</p>
                          </div>
                        </div>
                        <p class="mb-0 mt-4 fw-light lh-lg">Saya sangat senang dengan mobil yang disewa dari DEVRENTAL. Pelayanan mereka ramah dan efisien!</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Tambahkan item carousel lainnya sesuai kebutuhan -->
            </div>
            <div class="row mt-5 flex-center">
              <div class="col-auto position-relative z-index-2">
                <ol class="carousel-indicators">
                  <li class="active mx-2" data-bs-target="#carouselTestimonials" data-bs-slide-to="0"></li>
                  <li class="mx-2" data-bs-target="#carouselTestimonials" data-bs-slide-to="1"></li>
                  <!-- Tambahkan indicator lainnya sesuai jumlah testimoni -->
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->
  
  </section>
  
  <!-- <section> close ============================-->
  <!-- ============================================-->
@endsection
