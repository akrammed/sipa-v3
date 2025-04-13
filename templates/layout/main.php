<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Sipa-algerie: 2025';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['main']) ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"> 

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <style>
        .header .logo img {
            max-height: 85px;
            margin-right: 8px;
        }
        .header-item{
            text-decoration: none;
            font-weight: 600;
        }
    </style>
    <header id="header" class="header sticky-top">


        <!-- Branding + Navigation -->
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">

                <!-- Logo -->
                <a href="/" class="logo d-flex align-items-center me-auto">
                    <img src="img/IMG-20250328-WA0000.jpg" alt="CAPA">
                </a>

                <!-- Navigation -->
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="/" class="active header-item">ACCUEIL</a></li>
                        <li class="dropdown"><a class="header-item" href="#"><span>QUI SOMMES NOUS</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a class="header-item" href="/presentationdesalon">Présentation de salon</a></li>
                                <li><a class="header-item" href="/lalgerie">L'Algérie</a></li>
                                <li><a class="header-item" href="/presentationdesecteur">Présentation de secteur</a></li>
                                <li><a class="header-item" href="/fichetechniquesalon">Fiche technique de salon</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="header-item" href="#"><span>ESPACE EXPOSANT</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a class="header-item" href="/formulaireinscriptionnational">Exposant national</a></li>
                                <li><a class="header-item" href="/formulaireinscription">Exposant international</a></li>
                            </ul>
                        </li>
                        <li><a class="header-item" href="#">PLAN DU SALON</a></li>
                       
                        <li><a class="header-item" href="/contact">CONTACT</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <!-- CTA Buttons -->
                

            </div>
        </div>

    </header>

    <!-- Boutons petits style -->
    <style>
        .btn-sm {
            font-size: 13px;
            padding: 6px 8px;
            border-radius: 4px;
        }
    </style>

    <main class="main">

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Capa algerie</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p><strong>Mobile:</strong> +213-555-57-80-16</p>
                        <!-- <p><strong>Mobile (English):</strong> +213-661-13-11-17</p> -->
                        <p><strong>Whatsapp:</strong>  +213-560-364-008</p>
                        <p><strong>Fixe/Fax:</strong> +213-20-30-56-54</p>
                        <p><strong>Adresse:</strong> Cité 400 Logements Bât. 3A, N° 3/4 El Hammamet, Chéraga, ALGER</p>
                        <p><strong>Site du ministère:</strong> <a href="http://www.mpeche.gov.dz"
                                target="_blank">www.mpeche.gov.dz</a></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://web.facebook.com/capa.Algeria?mibextid=ZbWKwL&_rdc=3&_rdr#" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.youtube.com/@capaalgerie" target="_blank"><i class="bi bi-youtube"></i></a>
                        <a href="ttps://www.linkedin.com/company/capaalgerie/" target="_blank"><i class="bi bi-linkedin"></i></a>
                        <a href="https://twitter.com/capaalgerie#" target="_blank"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Visiter le site</h4>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Qui sommes-nous</a></li>
                        <li><a href="#">Espace Exposant</a></li>
                        <li><a href="#">Plan du Salon</a></li>
                        <li><a href="#">Édition Précédente</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Programmes et Événements</h4>
                    <ul>
                        <li><a href="#">Programmes</a></li>
                        <li><a href="#">Événements</a></li>
                        <li><a href="#">Invitation VISA</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 footer-links">
                    <h5>Le jour J est arrivé !</h5>
                    <p>Ne vous contentez pas de visiter notre site, il est temps de venir nous visiter au salon !</p>
                </div>

            </div>
        </div>



        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Capa algerie</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                Designed by <a href="https://catalyst-dz.com/">Catalyst-dz</a>
            </div>
        </div>

    </footer>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>   


    <?= $this->Html->script(['main']) ?>
</body>

</html>