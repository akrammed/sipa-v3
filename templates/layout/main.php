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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


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

        .header-item {
            text-decoration: none;
            font-weight: 600;


        }

        .navmenu .dropdown.active>a {
            color: #007bff;
            /* Or your highlight color */

        }

        .social-fixed {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 15px;
            background: transparent;
            padding: 10px;
            z-index: 9999;
        }

        .social-fixed a {
            width: 45px;
            height: 45px;
            background: #1977cc;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-fixed a:hover {
            background: #007bff;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentPath = window.location.pathname;
            const headerLinks = document.querySelectorAll(".navmenu .header-item");

            headerLinks.forEach(link => {
                const linkPath = link.getAttribute("href");

                // If exact path or current path starts with the link href
                if (linkPath && currentPath.startsWith(linkPath)) {
                    // Remove active class from all
                    headerLinks.forEach(l => l.classList.remove("active"));

                    // Add active to current link
                    link.classList.add("active");

                    // Also add active class to parent <li> if in dropdown
                    const parentLi = link.closest("li");
                    if (parentLi) {
                        parentLi.classList.add("active");

                        // Also activate grandparent dropdown li (for nested links)
                        const dropdownLi = parentLi.closest(".dropdown");
                        if (dropdownLi) {
                            dropdownLi.classList.add("active");
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll(".navmenu .header-item");
            const currentPath = window.location.pathname;

            links.forEach(link => {
                // Match path only, ignore domain
                if (link.getAttribute("href") === currentPath) {
                    links.forEach(l => l.classList.remove("active")); // Remove from all
                    link.classList.add("active"); // Add to current
                }
            });
        });
    </script>

    <header id="header" class="header sticky-top">

        <div class="social-fixed">
            <a href="https://api.whatsapp.com/send/?phone=213555381574&text&type=phone_number&app_absent=0" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://www.facebook.com/SipaAlgerie/?locale=fr_FR" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://x.com/capaalgerie" target="_blank">
                <i class="fab fa-x"></i>
            </a>

            <a href="https://www.youtube.com/@capaalgerie" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
        </div>



        <!-- Branding + Navigation -->
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">

                <!-- Logo -->
                <img width="60" src="img/Flag_of_Algeria.gif" alt="">
                <a href="https://capaalgerie.dz" class="logo d-flex align-items-center me-auto"><img src="img/logo.jpg" alt="CAPA"> </a>

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


            </div>
        </div>

    </header>

    <style>
        .btn-sm {
            font-size: 13px;
            padding: 6px 8px;
            border-radius: 4px;
        }

        /* Flash messages */
        .message {
            padding: .5rem 1rem;
            background: var(--color-message-info-bg);
            color: var(--color-message-info-text);
            border-color: var(--color-message-info-border);
            border-width: 1px;
            border-style: solid;
            border-radius: 4px;
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .message.hidden {
            display: none;
        }

        .message.success {
            background: var(--color-message-success-bg);
            color: var(--color-message-success-text);
            border-color: var(--color-message-success-border);
        }

        .message.warning {
            background: var(--color-message-warning-bg);
            color: var(--color-message-warning-text);
            border-color: var(--color-message-warning-border);
        }

        .message.error {
            background: var(--color-message-error-bg);
            color: var(--color-message-error-text);
            border-color: var(--color-message-error-border);
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
                    <a href="https://capaalgerie.dz" class="logo d-flex align-items-center">
                        <span class="sitename">sipa algerie</span>
                    </a>
                    <div class="footer-contact pt-3">

                        <p><strong>Whatsapp:</strong> +213-560-364-008</p>
                        <p><strong>Fixe/Fax:</strong> +213-20-30-56-54</p>
                        <p><strong>Email:</strong> sipa@capaalgerie.dz</p>


                        <p><strong>Site du ministère:</strong> <a href="https://madr.gov.dz/?fbclid=IwZXh0bgNhZW0CMTEAAR40szYdnp4NMmPGIMHzYvaajPm6clyPLXEOiACmqdNzkQE2hOhEq1_ZhEiRzg_aem_5ps350ptoyqzsP51KxC00w&playlist=4a0503b&video=2a1281c"
                                target="_blank">www.madr.gov.dz</a></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://web.facebook.com/capa.Algeria?mibextid=ZbWKwL&_rdc=3&_rdr#" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.youtube.com/@capaalgerie" target="_blank"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.linkedin.com/company/capaalgerie/" target="_blank"><i class="bi bi-whatsapp"></i></a>
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

                <div class="col-lg-4 col-md-6 footer-links" style="">
                    <h5 style="font-size: 20px; font-weight: 600; color: #333; margin-bottom: 10px;">
                        <i class="fas fa-calendar-alt" style="color: #3498db; margin-right: 8px;"></i>
                        Le jour J approche !
                    </h5>
                    <p style="">
                        <i class="fas fa-map-marker-alt" style="color: #3498db; margin-right: 6px;"></i>
                        Ne vous contentez pas de visiter notre site, venez nous rencontrer au salon !
                    </p>
                    <div id="countdown" style="
    font-size: 20px;
    font-weight: 600;
    margin-top: 15px;
    padding: 15px 20px;
    background: #f4f6f8;
    border-left: 5px solid #3498db;
    border-radius: 10px;
    color: #2c3e50;
    display: inline-block;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
">
                        <i class="fas fa-hourglass-start" style="color: #3498db; margin-right: 10px;"></i>
                        <span id="days">00</span> <small>jours</small>
                        <span id="hours">00</span> <small>h</small>
                        <span id="minutes">00</span> <small>min</small>
                        <span id="seconds">00</span> <small>s</small>
                    </div>

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

    <!-- Countdown Script -->
    <script>
        // Set the date of the SIPA 2025 event (change it as needed)
        const eventDate = new Date("2025-10-15T09:00:00").getTime();

        const countdown = () => {
            const now = new Date().getTime();
            const distance = eventDate - now;

            if (distance < 0) {
                document.getElementById("countdown").innerHTML = "<i class='fas fa-check-circle' style='color:green;'></i> Événement en cours !";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = String(days).padStart(2, '0');
            document.getElementById("hours").innerText = String(hours).padStart(2, '0');
            document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
            document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
        };

        // Call immediately, then every second
        countdown();
        setInterval(countdown, 1000);
    </script>



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