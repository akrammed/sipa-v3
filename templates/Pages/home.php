 <style>
 
 
 .icon-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 icons per row */
  gap: 80px;
  background-color: #0056b3; /* Blue background */
  padding: 40px;
  border-radius: 12px;
  width: 500px;
  height: 500px;
}

.icon-grid i {
  font-size: 40px;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 80px;
  width: 80px;
  background-color: #007bff;
  border-radius: 12px;
  transition: transform 0.3s ease;
}

.icon-grid i:hover {
  transform: scale(1.1);
}

/* Custom Styles for Gallery Slider */
.gallery-slider {
    padding: 20px;
}

.gallery-item {
    margin-right: 15px; /* Adjust spacing between images */
}

.gallery-item img {
    width: 1000px;
    height: 200px;
    display: block;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.gallery-item img:hover {
    transform: scale(1.05);
}

        
.partenaires-section {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }
        
        .section-title {
            font-size: 42px;
            font-weight: 700;
            color: #2d4b8e;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .blue-divider {
            width: 120px;
            height: 4px;
            background-color: #0099cc;
            margin: 0 auto 50px;
            display: block;
        }
        
        .partners-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            gap: 30px;
        }
        
        .partner-logo {
            width: 160px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
            transition: all 0.3s ease;
        }
        
        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            filter: grayscale(0%);
            transition: all 0.3s ease;
        }
        
        .partner-logo:hover img {
            transform: scale(1.05);
        }
        
        .plan-section {
            margin-top: 100px;
            padding-bottom: 60px;
        }
        
        .plan-button {
            display: inline-block;
            background-color: #0099cc;
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 4px;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }
        
        .plan-button:hover {
            background-color: #0077aa;
        }
        
        @media (max-width: 768px) {
            .section-title {
                font-size: 32px;
            }
            
            .partners-container {
                gap: 15px;
            }
            
            .partner-logo {
                width: 120px;
                height: 80px;
                margin: 5px;
            }
        }
 </style>
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="img/header.jpg" alt="SIPA 2025" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">

        </div><!-- End Welcome -->

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h2 class="text-black">SIPA 2025</h2>
              <p  class="">Salon International de la Pêche et de l'Aquaculture</p>
              <p style="text-align: justify;">
                La 10ᵉ édition du Salon International de la Pêche et de l’Aquaculture se tiendra à Oran du 6 au 9
                novembre 2025.
                Cet événement incontournable réunit les professionnels, institutionnels, chercheurs et investisseurs du
                secteur.
                Une plateforme idéale pour découvrir les innovations, développer des partenariats et explorer le
                potentiel de la pêche et de l’aquaculture en Algérie.
              </p>
              <div class="text-center">
                <a href="/presentationdesalon" class="more-btn"><span>En savoir plus</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-shop-window"></i>
                    <h4>Exposants</h4>
                    <p>Réservez votre stand pour présenter vos produits et services aux professionnels du secteur.</p>
                    <div class="text-center mt-3">
                      <a href="/reservationstand" class="btn btn-primary btn-md">Réserver stand</a>
                    </div>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-person-check"></i>
                    <h4>Visiteurs</h4>
                    <p>Inscrivez-vous en tant que visiteur pour découvrir les dernières innovations du secteur.</p>

                    <div style="margin-top:20px;" >
                      <a href="/visiteurs" class="btn btn-primary btn-md">Inscription visiteurs</a>
                    </div>


                    
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-pass"></i>
                    <h4>Visa</h4>
                    <p>Besoin d’un visa pour participer ? Remplissez votre demande dès maintenant en ligne.</p>
                    <div style="margin-top:43px;" >
                      <a href="/formulairevisa" class="btn btn-primary btn-md">Inscription visa</a>
                    </div>
                  </div>
                </div><!-- End Icon Box -->

              </div>
            </div>
          </div>
        </div><!-- End  Content-->

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->

    <section id="about" class="about section">
  <div class="container">
    <div class="row gy-4 gx-5">
      <!-- Image -->
      <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
        <img src="img/safe_in.jpg" class="img-fluid" alt="Filières SIPA 2025">
      </div>

      <!-- Icon Grid Only -->
      <div class="col-lg-6 content  d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <div class="icon-grid">
          <i class="fa-solid fa-fish-fins"></i>
          <i class="fa-solid fa-network-wired"></i>
          <i class="fa-solid fa-ship"></i>
          <i class="fa-solid fa-seedling"></i>
          <i class="fa-solid fa-dna"></i>
          <i class="fa-solid fa-syringe"></i>
          <i class="fa-solid fa-water"></i>
          <i class="fa-solid fa-industry"></i>
          <i class="fa-solid fa-anchor"></i>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">


        <div class="row gy-4">

        <h3>Sipa en chiffre 2024</h3>

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fa-solid fa-flag"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="11" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Pays</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fa-solid fa-store"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Exposants</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fa-solid fa-building"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Sociétés internationales</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fa-solid fa-users"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="22000" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Visiteurs</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

        <hr>

        <div class="row gy-4 mt-3">

                <h3 style="margin-top:32px; color : #0056b3; ">Estimation sur le salon SIPA 2025</h3>

  <div class="col-lg-3 col-md-6 d-flex mt-3 flex-column align-items-center">
    <i class="fa-solid fa-flag"></i>
     <div class="stats-item">
    <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1"
      class="purecounter"></span>
    <p>Pays</p>
  </div>
</div><!-- End Stats Item -->

<div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
  <i class="fa-solid fa-store"></i>
  <div class="stats-item">
    <span data-purecounter-start="0" data-purecounter-end="170" data-purecounter-duration="1"
      class="purecounter"></span>
    <p>Exposants</p>
  </div>
</div><!-- End Stats Item -->

<div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
  <i class="fa-solid fa-building"></i>
  <div class="stats-item">
    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
      class="purecounter"></span>
    <p>Sociétés internationales</p>
  </div>
</div><!-- End Stats Item -->

<div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
  <i class="fa-solid fa-users"></i>
  <div class="stats-item">
    <span data-purecounter-start="0" data-purecounter-end="22000" data-purecounter-duration="1"
      class="purecounter"></span>
    <p>Visiteurs</p>
  </div>
</div><!-- End Stats Item -->

</div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Espaces & Opportunités</h2>
        <p style="font-size:px;">Un salon pour l’échange, l'information et l’investissement dans l’aquaculture et la pêche.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Espace d'échange b2b</h3>
              </a>
              <p>Un salon favorisant la concertation et les échanges dans le domaine de l’aquaculture.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-lightbulb"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Nouveautés</h3>
              </a>
              <p>Une occasion pour s’informer des nouveautés des filières de la pêche et de l’aquaculture.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Investissement</h3>
              </a>
              <p>Il contribue à l’émergence d’opportunités d’investissement et la maturation des projets.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->



    
    <!-- Gallery Section -->

    <section id="gallery" class="gallery section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Galerie</h2>
        <p>Découvrez nos images et moments forts</p>
    </div><!-- End Section Title -->

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

            <!-- Slider Container -->
            <div class="gallery-slider">

                <div class="gallery-item">
                    <a href="img/i1.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/i1.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/i2.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/i2.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/i3.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/i3.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/i4.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/i4.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="img/i5.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/i5.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="img/i6.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/i6.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>
     
                <div class="gallery-item">
                    <a href="img/imag1.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/imag1.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img2.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img2.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img3.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img3.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img4.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img4.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img5.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img5.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img6.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img6.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img7.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img7.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img8.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img8.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <!-- Additional Images (if needed) -->
                <div class="gallery-item">
                    <a href="img/img9.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img9.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img11.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img11.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="img/img12.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img12.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img10.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img10.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img14.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img14.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img15.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img15.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>

                <div class="gallery-item">
                    <a href="img/img16.jpg" class="glightbox" data-gallery="images-gallery">
                        <img src="img/img16.jpg" alt="" class="img-fluid rounded">
                    </a>
                </div>



            </div><!-- End Gallery Slider -->

        </div>

    </div>

</section><!-- /Gallery Section -->

<!-- Section Container -->
<!-- Section Container -->
<section class="bg-light py-5">
  <div class="container">
    <div class="text-center mb-5">
      <!-- Title -->
      <h1 class="section-title">NOS PARTENAIRES</h1>
      <!-- Underline -->
      <div class="w-25 mx-auto bg-primary-subtle" style="height: 2px;"></div>
    </div>

    <!-- Row for Logos -->
    <div class="row justify-content-between">

      <!-- Left Column: Chambre Algérienne de la Pêche & de l'Aquaculture -->
      <div class="col-md-5 text-center">
        <img src="img/pr2.png" alt="Chambre Algérienne de la Pêche & de l'Aquaculture" style="max-width: 100%; height: auto;margin-top: 50px">
      </div>

      <!-- Right Column: Centre de Conventions Mohamed Ben Ahmed -->
      <div class="col-md-5 text-center">
        <img src="img/pr1.png" alt="Centre de Conventions Mohamed Ben Ahmed" style="max-width: 50%; height: auto; margin-bottom: 50px;">
      </div>

    </div> <!-- /.row -->
  </div> <!-- /.container -->
</section>
<section class="sponsors-section">
    <h2 class="section-title">NOS SPONSORS</h2>
    <span class="blue-divider"></span>
    
    <div class="sponsors-container">


       
    <div style="background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; width: 600px; text-align: center;">
        
        <!-- Title -->
        <h2 style="font-size: 28px; color: #003366; margin-top: 0; margin-bottom: 20px; ">SPONSOR MAJEUR</h2>
        
        <!-- Logo Image -->
        <img src="img/sponsor1.png" alt="Logo Sponsor 1 " style="max-width: 100%; height: auto; margin-bottom: 20px;">
        
   
    </div>
     
        
        <!-- Sponsor 2 -->
        <div class="sponsor-logo">
            <img src="img/sponsor2.jpg" alt="Logo Sponsor 2">
        </div>
        
        <!-- Sponsor 3 -->
        <div class="sponsor-logo">
            <img src="img/sponsor3.jpg" alt="Logo Sponsor 3">
        </div>
        
        <!-- Sponsor 4 -->
        <div class="sponsor-logo">
            <img src="img/sponsor4.png" alt="Logo Sponsor 4">
        </div>
        
        <!-- Sponsor 5 -->
        <div class="sponsor-logo">
            <img src="img/sponsor5.png" alt="Logo Sponsor 5">
        </div>
        
        <!-- Sponsor 6 -->
        <div class="sponsor-logo">
            <img src="img/sponsor6.png" alt="Logo Sponsor 6">
        </div>
        
        <!-- Sponsor 7 -->
        <div class="sponsor-logo">
            <img src="img/sponsor7.png" alt="Logo Sponsor 7">
        </div>
        
        <!-- Sponsor 8 -->
        <div class="sponsor-logo">
            <img src="img/sponsor8.jpeg" alt="Logo Sponsor 8">
        </div>
        
        <!-- Sponsor 9 -->
        <div class="sponsor-logo">
            <img src="img/sponsor9.jpg" alt="Logo Sponsor 9">
        </div>
        
        <!-- Sponsor 10 -->
        <div class="sponsor-logo">
            <img src="img/sponsor10.jpg" alt="Logo Sponsor 10">
        </div>
        
        <!-- Sponsor 11 -->
        <div class="sponsor-logo">
            <img src="img/sponsor11.jpg" alt="Logo Sponsor 11">
        </div>
        
        <!-- Sponsor 12 -->
        <div class="sponsor-logo">
            <img src="img/sponsor12.png" alt="Logo Sponsor 12">
        </div>
        
        <!-- Sponsor 13 -->
        <div class="sponsor-logo">
            <img src="img/sponsor13.png" alt="Logo Sponsor 13">
        </div>
        
        <!-- Sponsor 14 -->
        <div class="sponsor-logo">
            <img src="img/sponsor14.png" alt="Logo Sponsor 14">
        </div>
        
        <!-- Sponsor 15 -->
        <div class="sponsor-logo">
            <img src="img/sponsor15.png" alt="Logo Sponsor 15">
        </div>
        
        <!-- Sponsor 16 -->
        <div class="sponsor-logo">
            <img src="img/sponsor16.png" alt="Logo Sponsor 16">
        </div>
        
        <!-- Sponsor 17 -->
        <div class="sponsor-logo">
            <img src="img/sponsor17.png" alt="Logo Sponsor 17">
        </div>
        
        <!-- Sponsor 18 -->
        <div class="sponsor-logo">
            <img src="img/sponsor18.png" alt="Logo Sponsor 18">
        </div>
        

    </div>
</section>

<style>
    .sponsors-section {
        padding: 60px 0;
        background-color: #fff;
        text-align: center;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .section-title {
        font-size: 42px;
        font-weight: 700;
        color: #2d4b8e;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .blue-divider {
        width: 120px;
        height: 4px;
        background-color: #0099cc;
        margin: 0 auto 50px;
        display: block;
    }
    
    .sponsors-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 30px;
        padding: 0 20px;
    }
    
    .sponsor-logo {
        width: 160px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .sponsor-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: all 0.3s ease;
    }
    
    .sponsor-logo:hover img {
        transform: scale(1.05);
    }
    
    @media (max-width: 768px) {
        .section-title {
            font-size: 32px;
        }
        
        .sponsors-container {
            gap: 20px;
        }
        
        .sponsor-logo {
            width: 120px;
            height: 80px;
        }
    }
</style>
<section class="partenaires-section">
        <h2 class="section-title">PARTENAIRES MÉDIAS</h2>
        <span class="blue-divider"></span>
        
        <div class="partners-container">
            <!-- Partenaire 1 -->
            <div class="partner-logo">
                <img src="img/p1.png" alt="Logo Samira">
            </div>
            
            <!-- Partenaire 2 -->
            <div class="partner-logo">
                <img src="img/p2.png" alt="Logo El Bilad">
            </div>
            
            <!-- Partenaire 3 -->
            <div class="partner-logo">
                <img src="img/p3.png" alt="Logo El Iqtisadia">
            </div>
            
            <!-- Partenaire 4 -->
            <div class="partner-logo">
                <img src="img/p4.png" alt="Logo La Watania">
            </div>
            
            <!-- Partenaire 5 -->
            <div class="partner-logo">
                <img src="img/p5.png" alt="Logo El Hayat TV">
            </div>
            
            <!-- Partenaire 6 -->
            <div class="partner-logo">
                <img src="img/p6.png" alt="Logo Echorouk News">
            </div>
            
            <!-- Partenaire 7 -->
            <div class="partner-logo">
                <img src="img/p7.png" alt="Logo ANEP">
            </div>
            
            <!-- Partenaire 8 -->
            <div class="partner-logo">
                <img src="img/p8.png" alt="Logo Média 8">
            </div>
            
            <!-- Partenaire 9 -->
            <div class="partner-logo">
                <img src="img/p9.png" alt="Logo Média 9">
            </div>
        </div>
        
     
    </section>
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Nous sommes là pour répondre à toutes vos questions et demandes concernant l'événement.</p>
      </div><!-- End Section Title -->

      <div style="display: flex; flex-wrap: wrap; margin-left:50px; margin-right:50px; align-items: stretch;">
  
  <!-- Images Section -->
  <div style="flex: 1; min-width: 300px;">
    <img src="img/oran1.jpg" alt="Image 1" style="width: 45%;border-radios:15px; height: auto;  margin-bottom: 100px;" />
    <img src="img/oran3.jpg" alt="Image 2" style="width: 45%; height: auto;" />
  </div>

  <!-- Map Section -->
  <div style="flex: 1;  min-width: 300px; height: 270px; margin-bottom:30px;" data-aos="fade-up" data-aos-delay="200">
    <iframe
      style="border:0; width: 100%; height: 100%;"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163508.3121578399!2d-0.7483913985274642!3d35.697069660511634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7314f2f2253bd1%3A0xa4088f0f0e08472a!2sOran!5e0!3m2!1sfr!2sdz!4v1712916079899!5m2!1sfr!2sdz"
      frameborder="0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </div>

</div>


      <!-- End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Localisation</h3>
                <p>Cité 400 Logements Bât. 3A, N° 3/4 El Hammamet, Chéraga, ALGER</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Appelez-nous</h3>
                    <p><strong>Whatsapp:</strong>  +213-560-364-008</p>
                    <p><strong>Fixe/Fax:</strong> +213-20-30-56-54</p>
                   
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Envoyez-nous un e-mail</h3>
                <p><strong>Email:</strong> sipa@capaalgerie.dz</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Votre Nom" required="">
                </div>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Votre E-mail" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Sujet" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Chargement...</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Votre message a bien été envoyé. Merci !</div>

                  <button type="submit">Envoyer le Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

