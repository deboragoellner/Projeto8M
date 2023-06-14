<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Maria Maria</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('storage/img/favicon.png')}}" rel="icon">
  <link href="{{asset('storage/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('storage/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('storage/vendor/aos/aos.css" rel="stylesheet')}}">
  <link href="{{asset('storage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('storage/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('storage/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('storage/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('storage/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{-- asset('css/app.css') --}}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    @include('base.menu')

    <div class="container">
        <br>
        @include('base.flash-message')
        @yield('conteudo')
    </div>

    <!-- ======= Footer ======= -->
<footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Mais</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Início</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="team.html">Indicações</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Depoimentos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="paginaajuda.html">Ajuda</a></li>

            </ul>
          </div>



          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Maria Maria</h3>
            <p></p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  <script src="{{asset('storage/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('storage/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('storage/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('storage/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('storage/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('storage/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('storage/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('storage/js/main.js')}}"></script>

</body>

</html>

