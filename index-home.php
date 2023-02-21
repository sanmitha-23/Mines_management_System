<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>MineIt</title>
  <link rel="icon" href="favicon.ico">

  <!-- Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu&display=swap" rel="stylesheet">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/5778745214.js" crossorigin="anonymous"></script>

  <!-- CSS link -->
  <link rel="stylesheet" href="styles.css">

</head>


<body>

  <section id="title">

    <!-- Nav Bar -->
    <div class="container-fluid headNav">  
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid navContent">
          <!-- icon -->
          <i class="fa-regular fa-pickaxe"></i> 
          <!-- title -->
          <a class="navbar-brand" href="#title">MineIt</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link login" href="index.php">Login</a>
              </li>
            </ul>
          </div>
        </div> 
     </nav>

      <!-- Title -->

      <div>
        <h1>A one stop destination to organize all your mines information.</h1>
      </div>
    </div>
  </section>


  <!-- Features -->

  <section id="features">

    <div class="row">

      <div class="feature-row col-lg-4">
        <!-- icon -->
        <i class="fa-sharp fa-solid fa-circle-check fa-4x feature-icons"></i>
        <!-- desc -->
        <h3 class="feature-list">Easy to use.</h3>
        <p class="feature-desc">Anyone can access the features easily.</p>
      </div>

      <div class="feature-row col-lg-4">
        <!-- icon -->
        <i class="fa-sharp fa-solid fa-shield-halved fa-4x feature-icons"></i>
        <!-- desc -->
        <h3 class="feature-list">Secure.</h3>
        <p class="feature-desc">No threats. Your data is secure with us.</p>
      </div>
      
      <div class="feature-row col-lg-4">
        <!-- icon -->
        <i class="fa-sharp fa-solid fa-table-list fa-4x feature-icons"></i>
        <!-- desc -->
        <h3 class="feature-list">Organised.</h3>
        <p class="feature-desc">No chaos. Find what you want easily.</p>
      </div>

    </div>

  </section>


  <!-- Testimonials -->

  <section id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-bs-ride="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="carousel-pic" src="https://www.cummins.com/sites/default/files/2021-09/mining_excavator_banner_0.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img class="carousel-pic" src="https://d2c0zrx8qw0prh.cloudfront.net/image-handler/ts/20220615083201/ri/1000/src/images/Article_Images/ImageForArticle_1690_16552963210546606.jpg" alt="mine-benches">        
        </div>
        <div class="carousel-item">
          <img class="carousel-pic" src="https://www.cummins.com/sites/default/files/2021-04/Mining%20Industry.jpg" alt="workers">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>

  </section>

  <!-- About -->

  <section id="about">

    <p>Mining is the extraction of valuable minerals or other geological materials from the Earth. Our Earth has rich deposits of various minerals like gold, iron, magnesium and lots more.</p>
    <p>The field of mining is vast and has enormous amount of data pertaining to various sub-fields like ore grade, environment safety, machinery, geology and many more. MineIt will help you to store your precious data. So far there are separate technologies for different purposes, MineIt will help you to integrate all different fields and store different data on a single platform, which will not only provide ease of access and but also clarity about the related data. MineIt aims to provide a platform where the data can be stored safely, easily and efficiently.</p>

  </section>

  <!-- Footer -->

  <footer id="footer">
    <div class="container-fluid">
      <!-- icons -->
      <i class="fa-brands fa-facebook footer-btn"></i>
      <i class="fa-brands fa-linkedin footer-btn"></i>
      <i class="fa-brands fa-instagram footer-btn"></i>
      <i class="fa-solid fa-phone footer-btn"></i>

      <p>Website by S&S</p>
      <p>© MineIt 2023</p>
    </div> 

  </footer>


</body>

</html>
