 <style>
   .icon-grid {
     display: grid;
     grid-template-columns: repeat(3, 1fr);
     /* 3 icons per row */
     gap: 80px;
     background-color: #0056b3;
     /* Blue background */
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
     margin-right: 15px;
     /* Adjust spacing between images */
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

   <img src="img/img16.jpg" alt="SIPA 2025" data-aos="fade-in">

   <div class="container position-relative">

     <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">

     </div><!-- End Welcome -->

     <div class="content row gy-4">
       <div class="col-lg-4 d-flex align-items-stretch">
         <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
           <h2 class="text-black">SIPA 2025</h2>
           <p class="">Salon International de la Pêche et de l'Aquaculture</p>
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
                 <h4>Visiteurs professionnels</h4>
                 <p>Inscrivez-vous en tant que visiteur pour découvrir les dernières innovations du secteur.</p>

                 <div style="margin-top:20px;">
                   <a href="/visiteurs" class="btn btn-primary btn-md">Inscription visiteurs</a>
                 </div>



               </div>
             </div><!-- End Icon Box -->

             <div class="col-xl-4 d-flex align-items-stretch">
               <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                 <i class="bi bi-pass"></i>
                 <h4>Visa</h4>
                 <p>Besoin d’un visa pour participer ? Remplissez votre demande dès maintenant en ligne.</p>
                 <div style="margin-top:43px;">
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



 <!-- Stats Section -->
 <section id="stats" class="stats-section py-5 light-background">
   <div class="container">
     <!-- 2024 Stats -->
     <div class="stats-container mb-5" data-aos="fade-up">
       <h3 class="text-center mb-4 position-relative">
         <span class="position-relative" style="color: #0056b3;">Sipa en chiffre 2024
           <span class="d-block position-absolute w-25 mx-auto" style="height: 3px; background-color: #0056b3; bottom: -10px; left: 0; right: 0;"></span>
         </span>
       </h3>

       <div class="row g-4 mt-3">
         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center bg-white">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-flag fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="11" data-purecounter-duration="1">11</div>
             <p class="stat-label text-muted mb-0">Pays</p>
           </div>
         </div>

         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center bg-white">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-store fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1">100</div>
             <p class="stat-label text-muted mb-0">Exposants</p>
           </div>
         </div>

         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center bg-white">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-building fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1">25</div>
             <p class="stat-label text-muted mb-0">Sociétés internationales</p>
           </div>
         </div>

         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center bg-white">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-users fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="22000" data-purecounter-duration="1">22000</div>
             <p class="stat-label text-muted mb-0">Visiteurs</p>
           </div>
         </div>
       </div>
     </div>

     <!-- Divider -->
     <div class="divider position-relative my-5">
       <hr style="border-color: rgba(0,86,179,0.2);">
     </div>

     <!-- 2025 Estimation Stats -->
     <div class="stats-container" data-aos="fade-up">
       <h3 class="text-center mb-4 position-relative" style="color: #0056b3;">
         <span class="position-relative">Estimation sur le salon SIPA 2025
           <span class="d-block position-absolute w-25 mx-auto" style="height: 3px; background-color: #0056b3; bottom: -10px; left: 0; right: 0;"></span>
         </span>
       </h3>

       <div class="row g-4 mt-4">
         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(145deg, #ffffff, #f0f7ff);">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-flag fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1">17</div>
             <p class="stat-label text-muted mb-0">Pays</p>
           </div>
         </div>

         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(145deg, #ffffff, #f0f7ff);">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-store fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="170" data-purecounter-duration="1">170</div>
             <p class="stat-label text-muted mb-0">Exposants</p>
           </div>
         </div>

         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(145deg, #ffffff, #f0f7ff);">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-building fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1">15</div>
             <p class="stat-label text-muted mb-0">Sociétés internationales</p>
           </div>
         </div>

         <div class="col-lg-3 col-md-6">
           <div class="stat-card p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(145deg, #ffffff, #f0f7ff);">
             <div class="stat-icon mb-3">
               <i class="fa-solid fa-users fa-2x" style="color: #0056b3;"></i>
             </div>
             <div class="stat-number fw-bold fs-1" data-purecounter-start="0" data-purecounter-end="22000" data-purecounter-duration="1">22000</div>
             <p class="stat-label text-muted mb-0">Visiteurs</p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End Stats Section -->

 <style>
   .stats-section {
     padding: 80px 0;
   }

   .stat-card {
     transition: all 0.3s ease;
     border: 1px solid rgba(0, 0, 0, 0.05);
   }

   .stat-card:hover {
     transform: translateY(-5px);
     box-shadow: 0 10px 20px rgba(0, 86, 179, 0.1) !important;
   }

   .stat-number {
     font-weight: 700;
     color: #0056b3;
     margin-bottom: 5px;
   }

   .stat-label {
     font-size: 1rem;
     font-weight: 500;
   }
 </style>
 <!-- Services Section -->
 <section id="services" class="services-section py-5">
   <!-- Section Title -->
   <div class="container mb-5" data-aos="fade-up">
     <div class="text-center position-relative mb-5">
       <h2 class="section-title fw-bold position-relative d-inline-block">Espaces & Opportunités</h2>
       <div class="title-underline"></div>
       <p class="section-subtitle mt-3">Un salon pour l'échange, l'information et l'investissement dans l'aquaculture et la pêche.</p>
     </div>
   </div><!-- End Section Title -->

   <div class="container">
     <div class="row g-4">
       <!-- Service Item 1 -->
       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
         <div class="service-card h-100">
           <div class="service-icon-wrapper">
             <div class="service-icon">
               <i class="fas fa-comments"></i>
             </div>
           </div>
           <div class="service-content">
             <h3 class="service-title">Espace d'échange b2b</h3>
             <p class="service-description">Un salon favorisant la concertation et les échanges dans le domaine de l'aquaculture.</p>
             <a href="#" class="service-link">
               <span>En savoir plus</span>
               <i class="fas fa-arrow-right ms-2"></i>
             </a>
           </div>
         </div>
       </div>

       <!-- Service Item 2 -->
       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
         <div class="service-card h-100">
           <div class="service-icon-wrapper">
             <div class="service-icon">
               <i class="fas fa-lightbulb"></i>
             </div>
           </div>
           <div class="service-content">
             <h3 class="service-title">Nouveautés</h3>
             <p class="service-description">Une occasion pour s'informer des nouveautés des filières de la pêche et de l'aquaculture.</p>
             <a href="#" class="service-link">
               <span>En savoir plus</span>
               <i class="fas fa-arrow-right ms-2"></i>
             </a>
           </div>
         </div>
       </div>

       <!-- Service Item 3 -->
       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
         <div class="service-card h-100">
           <div class="service-icon-wrapper">
             <div class="service-icon">
               <i class="fas fa-chart-line"></i>
             </div>
           </div>
           <div class="service-content">
             <h3 class="service-title">Investissement</h3>
             <p class="service-description">Il contribue à l'émergence d'opportunités d'investissement et la maturation des projets.</p>
             <a href="#" class="service-link">
               <span>En savoir plus</span>
               <i class="fas fa-arrow-right ms-2"></i>
             </a>
           </div>
         </div>
       </div>

     </div>
   </div>
 </section>
 <!-- End Services Section -->

 <style>
   .services-section {
     background-color: #f8fbff;
     position: relative;
     overflow: hidden;
   }

   .section-title {
     color: #333;
     font-size: 2.2rem;
     margin-bottom: 0.5rem;
   }

   .title-underline {
     height: 3px;
     width: 70px;
     background-color: #0056b3;
     margin: 0.7rem auto 0;
   }

   .section-subtitle {
     color: #666;
     max-width: 700px;
     margin: 0 auto;
     font-size: 1.1rem;
   }

   .service-card {
     background-color: #fff;
     border-radius: 10px;
     padding: 30px 25px;
     box-shadow: 0 8px 30px rgba(0, 86, 179, 0.08);
     transition: all 0.3s ease;
     position: relative;
     overflow: hidden;
     z-index: 1;
   }

   .service-card:hover {
     transform: translateY(-10px);
     box-shadow: 0 15px 35px rgba(0, 86, 179, 0.12);
   }

   .service-card:before {
     content: '';
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     height: 3px;
     background: #0056b3;
     z-index: 2;
     transform: scaleX(0);
     transform-origin: 0 50%;
     transition: transform 0.4s ease;
   }

   .service-card:hover:before {
     transform: scaleX(1);
   }

   .service-icon-wrapper {
     margin-bottom: 20px;
   }

   .service-icon {
     display: inline-flex;
     align-items: center;
     justify-content: center;
     width: 70px;
     height: 70px;
     background-color: rgba(0, 86, 179, 0.1);
     border-radius: 50%;
     margin-bottom: 15px;
     transition: all 0.3s ease;
   }

   .service-card:hover .service-icon {
     background-color: #0056b3;
   }

   .service-icon i {
     font-size: 28px;
     color: #0056b3;
     transition: all 0.3s ease;
   }

   .service-card:hover .service-icon i {
     color: #fff;
   }

   .service-title {
     font-size: 1.25rem;
     font-weight: 600;
     margin-bottom: 15px;
     color: #333;
   }

   .service-description {
     color: #666;
     font-size: 1rem;
     margin-bottom: 20px;
   }

   .service-link {
     display: inline-flex;
     align-items: center;
     color: #0056b3;
     font-weight: 600;
     text-decoration: none;
     font-size: 0.95rem;
     transition: all 0.3s ease;
     opacity: 0;
     transform: translateY(10px);
   }

   .service-card:hover .service-link {
     opacity: 1;
     transform: translateY(0);
   }

   .service-link i {
     transition: transform 0.3s ease;
   }

   .service-link:hover i {
     transform: translateX(5px);
   }

   @media (max-width: 768px) {
     .service-card {
       padding: 25px 20px;
     }

     .service-icon {
       width: 60px;
       height: 60px;
     }

     .service-icon i {
       font-size: 24px;
     }
   }
 </style>



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

 <style>
   /* Section Common Styles */
   .section {
     padding: 80px 0;
     position: relative;
   }

   .container {
     max-width: 1200px;
     margin: 0 auto;
     padding: 0 15px;
   }

   .section-header {
     text-align: center;
     margin-bottom: 50px;
     position: relative;
   }

   .section-title {
     font-size: 36px;
     font-weight: 700;
     color: #1a3b6e;
     text-transform: uppercase;
     margin-bottom: 15px;
     letter-spacing: 1.5px;
   }

   .section-title::after {
     content: '';
     width: 80px;
     height: 3px;
     background: #0099cc;
     position: absolute;
     bottom: -10px;
     left: 50%;
     transform: translateX(-50%);
     border-radius: 2px;
   }

   /* Partners Section */
   .partners-section {
     background-color: #ffffff;
     box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
   }

   .main-partners {
     display: flex;
     justify-content: space-around;
     align-items: center;
     flex-wrap: wrap;
     margin-bottom: 40px;
   }

   .main-partner {
     flex: 0 0 45%;
     max-width: 45%;
     padding: 30px;
     text-align: center;
     transition: all 0.3s ease;
   }

   .main-partner img {
     max-width: 100%;
     height: auto;
     transition: transform 0.3s ease;
   }

   .main-partner:hover img {
     transform: scale(1.03);
   }

   /* Sponsors Section */
   .sponsors-section {
     background: linear-gradient(to right, #f8f9fa, #eef1f5);
   }

   .major-sponsor {
     background-color: white;
     border-radius: 12px;
     box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
     padding: 30px;
     width: 100%;
     max-width: 600px;
     margin: 0 auto 50px;
     text-align: center;
     transition: transform 0.3s ease, box-shadow 0.3s ease;
   }

   .major-sponsor:hover {
     transform: translateY(-5px);
     box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
   }

   .major-sponsor h3 {
     font-size: 24px;
     color: #1a3b6e;
     margin-bottom: 20px;
     font-weight: 600;
   }

   .major-sponsor img {
     max-width: 80%;
     height: auto;
   }

   .sponsors-grid {
     display: grid;
     grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
     gap: 30px;
     justify-content: center;
   }

   .sponsor-logo {
     background-color: white;
     border-radius: 8px;
     box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
     height: 120px;
     display: flex;
     align-items: center;
     justify-content: center;
     padding: 15px;
     transition: all 0.3s ease;
   }

   .sponsor-logo:hover {
     transform: translateY(-5px);
     box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
   }

   .sponsor-logo img {
     max-width: 100%;
     max-height: 90px;
     object-fit: contain;
   }

   /* Media Partners Section */
   .media-partners-section {
     background-color: #ffffff;
   }

   .media-partners-grid {
     display: grid;
     grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
     gap: 30px;
     justify-content: center;
   }

   .media-partner-logo {
     background-color: #f8f9fa;
     border-radius: 8px;
     box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
     height: 130px;
     display: flex;
     align-items: center;
     justify-content: center;
     padding: 20px;
     transition: all 0.3s ease;
   }

   .media-partner-logo:hover {
     transform: translateY(-5px);
     box-shadow: 0 8px 15px rgba(0, 0, 0, 0.08);
     background-color: white;
   }

   .media-partner-logo img {
     max-width: 100%;
     max-height: 90px;
     object-fit: contain;
   }

   /* Responsive Styles */
   @media (max-width: 992px) {
     .section {
       padding: 60px 0;
     }

     .section-title {
       font-size: 32px;
     }

     .main-partner {
       flex: 0 0 100%;
       max-width: 100%;
       margin-bottom: 30px;
     }

     .sponsors-grid,
     .media-partners-grid {
       grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
       gap: 20px;
     }
   }

   @media (max-width: 768px) {
     .section {
       padding: 50px 0;
     }

     .section-title {
       font-size: 28px;
     }

     .sponsor-logo,
     .media-partner-logo {
       height: 100px;
     }

     .major-sponsor {
       padding: 20px;
     }

     .major-sponsor h3 {
       font-size: 20px;
     }
   }

   @media (max-width: 576px) {

     .sponsors-grid,
     .media-partners-grid {
       grid-template-columns: repeat(2, 1fr);
     }
   }
 </style>

 <!-- Partners Section -->
 <section class="section partners-section">
   <div class="container">
     <div class="section-header">
       <h2 class="section-title">NOS PARTENAIRES</h2>
     </div>

     <div class="main-partners">
       <!-- Left Partner -->
       <div class="main-partner">
         <img src="img/pr2.png" alt="Chambre Algérienne de la Pêche & de l'Aquaculture">
       </div>

       <!-- Right Partner -->
       <div class="main-partner">
         <img src="img/pr1.png" alt="Centre de Conventions Mohamed Ben Ahmed">
       </div>
     </div>
   </div>
 </section>

 <!-- Sponsors Section -->
 <section class="section sponsors-section">
   <div class="container">
     <div class="section-header">
       <h2 class="section-title">NOS SPONSORS</h2>
     </div>

     <!-- Major Sponsor -->
     <div class="major-sponsor">
       <h3>SPONSOR MAJEUR</h3>
       <img src="img/sponsor1.png" alt="Logo Sponsor Majeur">
     </div>

     <!-- Regular Sponsors Grid -->
     <div class="sponsors-grid">
       <!-- Using placeholder for demonstration, replace with actual images -->
       <div class="sponsor-logo">
         <img src="img/sponsor2.jpg" alt="Logo Sponsor 2">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor3.jpg" alt="Logo Sponsor 3">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor4.png" alt="Logo Sponsor 4">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor5.png" alt="Logo Sponsor 5">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor6.png" alt="Logo Sponsor 6">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor7.png" alt="Logo Sponsor 7">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor8.jpeg" alt="Logo Sponsor 8">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor9.jpg" alt="Logo Sponsor 9">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor10.jpg" alt="Logo Sponsor 10">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor11.jpg" alt="Logo Sponsor 11">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor12.png" alt="Logo Sponsor 12">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor13.png" alt="Logo Sponsor 13">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor14.png" alt="Logo Sponsor 14">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor15.png" alt="Logo Sponsor 15">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor16.png" alt="Logo Sponsor 16">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor17.png" alt="Logo Sponsor 17">
       </div>
       <div class="sponsor-logo">
         <img src="img/sponsor18.png" alt="Logo Sponsor 18">
       </div>
     </div>
   </div>
 </section>

 <!-- Media Partners Section -->
 <section class="section media-partners-section">
   <div class="container">
     <div class="section-header">
       <h2 class="section-title">PARTENAIRES MÉDIAS</h2>
     </div>

     <div class="media-partners-grid">
       <div class="media-partner-logo">
         <img src="img/p1.png" alt="Logo Samira">
       </div>
       <div class="media-partner-logo">
         <img src="img/p2.png" alt="Logo El Bilad">
       </div>
       <div class="media-partner-logo">
         <img src="img/p3.png" alt="Logo El Iqtisadia">
       </div>
       <div class="media-partner-logo">
         <img src="img/p4.png" alt="Logo La Watania">
       </div>
       <div class="media-partner-logo">
         <img src="img/p5.png" alt="Logo El Hayat TV">
       </div>
       <div class="media-partner-logo">
         <img src="img/p6.png" alt="Logo Echorouk News">
       </div>
       <div class="media-partner-logo">
         <img src="img/p7.png" alt="Logo ANEP">
       </div>
       <div class="media-partner-logo">
         <img src="img/p8.png" alt="Logo Média 8">
       </div>
       <div class="media-partner-logo">
         <img src="img/p9.png" alt="Logo Média 9">
       </div>
     </div>
   </div>
 </section>
 <!-- Contact Section -->
 <section id="contact" class="contact section py-5">
   <!-- Section Title -->
   <div class="container section-title text-center mb-5" data-aos="fade-up">
     <h2 class="fw-bold position-relative d-inline-block pb-3">Contact</h2>
     <div class="title-underline"></div>
     <p class="text-muted mt-3 col-lg-8 mx-auto">Nous sommes là pour répondre à toutes vos questions et demandes concernant l'événement.</p>
   </div><!-- End Section Title -->

   <div class="container">
     <div class="row g-5">
       <!-- Left Column: Info + Images -->
       <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
         <!-- Contact Info Cards -->
         <div class="info-cards mb-4">
           <div class="info-card mb-4 p-4 rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="300">
             <div class="d-flex align-items-start">
               <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                 <i class="bi bi-geo-alt text-primary fs-4"></i>
               </div>
               <div>
                 <h5 class="fw-bold">Localisation</h5>
                 <p class="mb-0 text-muted">Cité 400 Logements Bât. 3A, N° 3/4 El Hammamet, Chéraga, ALGER</p>
               </div>
             </div>
           </div>

           <div class="info-card mb-4 p-4 rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="400">
             <div class="d-flex align-items-start">
               <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                 <i class="bi bi-telephone text-primary fs-4"></i>
               </div>
               <div>
                 <h5 class="fw-bold">Appelez-nous</h5>
                 <p class="mb-1"><span class="fw-medium">Whatsapp:</span> +213-560-364-008</p>
                 <p class="mb-0"><span class="fw-medium">Fixe/Fax:</span> +213-20-30-56-54</p>
               </div>
             </div>
           </div>

           <div class="info-card mb-4 p-4 rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="500">
             <div class="d-flex align-items-start">
               <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                 <i class="bi bi-envelope text-primary fs-4"></i>
               </div>
               <div>
                 <h5 class="fw-bold">Envoyez-nous un e-mail</h5>
                 <p class="mb-0"><span class="fw-medium">Email:</span> sipa@capaalgerie.dz</p>
               </div>
             </div>
           </div>
         </div>

         <!-- Images Gallery -->
         <div class="image-gallery mt-5" data-aos="fade-up">
           <div class="row g-3">
             <div class="col-6">
               <img src="img/oran1.jpg" alt="Oran" class="img-fluid rounded-3 shadow hover-scale" />
             </div>
             <div class="col-6">
               <img src="img/oran3.jpg" alt="Oran" class="img-fluid rounded-3 shadow hover-scale" />
             </div>
           </div>
         </div>
       </div>

       <!-- Right Column: Map + Form -->
       <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
         <!-- Map -->
         <div class="map-container rounded-4 overflow-hidden shadow mb-5" style="height: 300px;">
           <iframe
             style="border:0; width: 100%; height: 100%;"
             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163508.3121578399!2d-0.7483913985274642!3d35.697069660511634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7314f2f2253bd1%3A0xa4088f0f0e08472a!2sOran!5e0!3m2!1sfr!2sdz!4v1712916079899!5m2!1sfr!2sdz"
             allowfullscreen=""
             loading="lazy"
             referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>

         <!-- Contact Form -->
         <div class="contact-form bg-light p-4 rounded-4 shadow">
           <h4 class="mb-4 text-center">Envoyez-nous un message</h4>
           <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up">
             <div class="row g-3">
               <div class="col-md-6">
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="name" name="name" placeholder="Votre Nom" required>
                   <label for="name">Votre Nom</label>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-floating mb-3">
                   <input type="email" class="form-control" id="email" name="email" placeholder="Votre E-mail" required>
                   <label for="email">Votre E-mail</label>
                 </div>
               </div>
               <div class="col-12">
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" required>
                   <label for="subject">Sujet</label>
                 </div>
               </div>
               <div class="col-12">
                 <div class="form-floating mb-3">
                   <textarea class="form-control" id="message" name="message" rows="5" style="height: 150px" placeholder="Message" required></textarea>
                   <label for="message">Message</label>
                 </div>
               </div>
               <div class="col-12 text-center">
                 <div class="loading">Chargement...</div>
                 <div class="error-message"></div>
                 <div class="sent-message">Votre message a bien été envoyé. Merci !</div>
                 <button type="submit" class="btn btn-primary btn-lg px-4 py-2">Envoyer le Message</button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>

 <style>
   /* Custom styles for contact section */
   .title-underline {
     height: 3px;
     width: 50px;
     margin: 0 auto;
     margin-top: 10px;
   }

   .contact .icon-box {
     width: 50px;
     height: 50px;
     display: flex;
     align-items: center;
     justify-content: center;
     transition: all 0.3s ease;
   }

   .contact .info-card {
     transition: all 0.3s ease;
     border-left: 4px solid transparent;
   }

   .contact .info-card:hover {
     border-left: 4px solid var(--primary);
     transform: translateX(5px);
   }

   .hover-scale {
     transition: all 0.3s ease;
   }

   .hover-scale:hover {
     transform: scale(1.03);
   }

   .form-control:focus {
     border-color: var(--primary);
     box-shadow: 0 0 0 0.25rem rgba(var(--primary-rgb), 0.25);
   }

   

   /* Animation for loading */
   .loading {
     display: none;
   }

   .error-message,
   .sent-message {
     display: none;
     padding: 10px;
     margin-bottom: 15px;
     border-radius: 4px;
   }

   .error-message {
     background: #f8d7da;
     color: #842029;
   }

   .sent-message {
     background: #d1e7dd;
     color: #0f5132;
   }
 </style>