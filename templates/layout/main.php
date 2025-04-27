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

<header id="header" class="header sticky-top" style="background: linear-gradient(135deg, #f0f8ff 0%, #e6f2ff 100%); box-shadow: 0 2px 15px rgba(0,0,0,0.1); padding: 15px 0;">
    <!-- Social Media Fixed Bar -->
    <div class="social-fixed" style="position: fixed; right: 0; top: 30%; z-index: 1000; display: flex; flex-direction: column; gap: 10px;">
        <a href="https://api.whatsapp.com/send/?phone=213560364008&text&type=phone_number&app_absent=0" target="_blank" style="background-color: #0056b3; color: white; width: 40px; height: 40px; border-radius: 5px 0 0 5px; display: flex; align-items: center; justify-content: center; transition: all 0.3s; box-shadow: -3px 3px 10px rgba(0,0,0,0.1);">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.facebook.com/SipaAlgerie/?locale=fr_FR" target="_blank" style="background-color: #0056b3; color: white; width: 40px; height: 40px; border-radius: 5px 0 0 5px; display: flex; align-items: center; justify-content: center; transition: all 0.3s; box-shadow: -3px 3px 10px rgba(0,0,0,0.1);">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://x.com/capaalgerie" target="_blank" style="background-color: #0056b3; color: white; width: 40px; height: 40px; border-radius: 5px 0 0 5px; display: flex; align-items: center; justify-content: center; transition: all 0.3s; box-shadow: -3px 3px 10px rgba(0,0,0,0.1);">
            <i class="fab fa-x"></i>
        </a>
        <a href="https://www.youtube.com/@capaalgerie" target="_blank" style="background-color: #0056b3; color: white; width: 40px; height: 40px; border-radius: 5px 0 0 5px; display: flex; align-items: center; justify-content: center; transition: all 0.3s; box-shadow: -3px 3px 10px rgba(0,0,0,0.1);">
            <i class="fab fa-youtube"></i>
        </a>
    </div>

    <!-- Branding + Navigation -->
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <!-- Logo Area -->
            <div class="d-flex align-items-center">
                <img width="60" src="img/Flag_of_Algeria.gif" alt="Drapeau Algérie" style="margin-right: 15px; border-radius: 5px; box-shadow: 0 3px 6px rgba(0,0,0,0.1);">
                <a href="https://capaalgerie.dz" class="logo d-flex align-items-center">
                    <img src="img/logo.jpg" alt="CAPA" style="max-height: 60px; border-radius: 5px; box-shadow: 0 3px 6px rgba(0,0,0,0.1);"> 
                    <span style="color: #0056b3; font-weight: 700; font-size: 22px; text-transform: uppercase; margin-left: 10px;">Sipa Algérie</span>
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav id="navmenu" class="navmenu">
                <ul style="list-style: none; margin: 0; padding: 0; display: flex; gap: 10px;">
                    <li>
                        <a href="/" class="active header-item" style="color: #0056b3; font-weight: 600; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; background-color: rgba(0, 86, 179, 0.1);">ACCUEIL</a>
                    </li>
                    <li class="dropdown" style="position: relative;">
                        <a class="header-item" href="#" style="color: #2c3e50; font-weight: 600; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; display: flex; align-items: center;">
                            <span>QUI SOMMES NOUS</span> 
                            <i class="bi bi-chevron-down toggle-dropdown" style="margin-left: 5px;"></i>
                        </a>
                        <ul style="position: absolute; top: 100%; left: 0; background: white; border-radius: 5px; list-style: none; padding: 10px 0; margin-top: 5px; min-width: 200px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); z-index: 1000; display: none;">
                            <li><a class="header-item" href="/presentationdesalon" style="color: #2c3e50; text-decoration: none; padding: 8px 15px; display: block; transition: all 0.3s;">Présentation de salon</a></li>
                            <li><a class="header-item" href="/lalgerie" style="color: #2c3e50; text-decoration: none; padding: 8px 15px; display: block; transition: all 0.3s;">L'Algérie</a></li>
                            <li><a class="header-item" href="/presentationdesecteur" style="color: #2c3e50; text-decoration: none; padding: 8px 15px; display: block; transition: all 0.3s;">Présentation de secteur</a></li>
                            <li><a class="header-item" href="/fichetechniquesalon" style="color: #2c3e50; text-decoration: none; padding: 8px 15px; display: block; transition: all 0.3s;">Fiche technique de salon</a></li>
                        </ul>
                    </li>
                    <li class="dropdown" style="position: relative;">
                        <a class="header-item" href="#" style="color: #2c3e50; font-weight: 600; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; display: flex; align-items: center;">
                            <span>ESPACE EXPOSANT</span> 
                            <i class="bi bi-chevron-down toggle-dropdown" style="margin-left: 5px;"></i>
                        </a>
                        <ul style="position: absolute; top: 100%; left: 0; background: white; border-radius: 5px; list-style: none; padding: 10px 0; margin-top: 5px; min-width: 200px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); z-index: 1000; display: none;">
                            <li><a class="header-item" href="/formulaireinscriptionnational" style="color: #2c3e50; text-decoration: none; padding: 8px 15px; display: block; transition: all 0.3s;">Exposant national</a></li>
                            <li><a class="header-item" href="/formulaireinscription" style="color: #2c3e50; text-decoration: none; padding: 8px 15px; display: block; transition: all 0.3s;">Exposant international</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="header-item" href="#" style="color: #2c3e50; font-weight: 600; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s;">PLAN DU SALON</a>
                    </li>
                    <li>
                        <a class="header-item" href="/contact" style="color: #2c3e50; font-weight: 600; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s;">CONTACT</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list" style="color: #0056b3; font-size: 28px; cursor: pointer;"></i>
            </nav>
        </div>
    </div>

    <script>
        // Dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');
            
            dropdowns.forEach(dropdown => {
                const dropdownToggle = dropdown.querySelector('.toggle-dropdown');
                const dropdownMenu = dropdown.querySelector('ul');
                
                dropdown.addEventListener('mouseenter', function() {
                    dropdownMenu.style.display = 'block';
                    this.querySelector('.header-item').style.backgroundColor = 'rgba(0, 86, 179, 0.1)';
                    this.querySelector('.header-item').style.color = '#0056b3';
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    dropdownMenu.style.display = 'none';
                    this.querySelector('.header-item').style.backgroundColor = 'transparent';
                    this.querySelector('.header-item').style.color = '#2c3e50';
                });
            });
            
            // Hover effects for header items
            const headerItems = document.querySelectorAll('.header-item:not(.active)');
            headerItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!this.closest('.dropdown') || this.parentNode.tagName === 'LI') {
                        this.style.backgroundColor = 'rgba(0, 86, 179, 0.1)';
                        this.style.color = '#0056b3';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (!this.closest('.dropdown') || this.parentNode.tagName === 'LI') {
                        if (!this.classList.contains('active')) {
                            this.style.backgroundColor = 'transparent';
                            this.style.color = '#2c3e50';
                        }
                    }
                });
            });
            
            // Social media hover effects
            const socialLinks = document.querySelectorAll('.social-fixed a');
            socialLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#004080';
                    this.style.transform = 'translateX(-5px)';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '#0056b3';
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
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

    <footer id="footer" class="footer" style="background: linear-gradient(135deg, #f0f8ff 0%, #e6f2ff 100%);">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="https://capaalgerie.dz" class="logo d-flex align-items-center">
                    <span class="sitename" style="color: #0056b3; font-weight: 700; font-size: 24px; text-transform: uppercase;">Sipa Algérie</span>
                </a>
                <div class="footer-contact pt-3" style="color: #2c3e50;">
                    <p><strong style="color: #0056b3;"><i class="bi bi-whatsapp me-2" style="color: #0056b3;"></i>Whatsapp:</strong> +213-560-364-008</p>
                    <p><strong style="color: #0056b3;"><i class="bi bi-telephone me-2" style="color: #0056b3;"></i>Fixe/Fax:</strong> +213-20-30-56-54</p>
                    <p><strong style="color: #0056b3;"><i class="bi bi-envelope me-2" style="color: #0056b3;"></i>Email:</strong> sipa@capaalgerie.dz</p>
                    <p><strong style="color: #0056b3;"><i class="bi bi-globe me-2" style="color: #0056b3;"></i>Site du ministère:</strong> <a href="https://madr.gov.dz" target="_blank" style="color: #0078d4; text-decoration: none; transition: all 0.3s;">www.madr.gov.dz</a></p>
                </div>
                <div class="social-links d-flex mt-4 gap-3">
                    <a href="https://web.facebook.com/capa.Algeria" target="_blank" style="background-color: #0056b3; color: white; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.youtube.com/@capaalgerie" target="_blank" style="background-color: #0056b3; color: white; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/capaalgerie/" target="_blank" style="background-color: #0056b3; color: white; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://twitter.com/capaalgerie" target="_blank" style="background-color: #0056b3; color: white; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;"><i class="bi bi-twitter"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4 style="color: #0056b3; font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                    <span style="position: relative;">
                        Visiter le site
                        <span style="position: absolute; bottom: -10px; left: 0; width: 50px; height: 2px; background-color: #0078d4;"></span>
                    </span>
                </h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Accueil</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Qui sommes-nous</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Espace Exposant</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Plan du Salon</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Édition Précédente</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4 style="color: #0056b3; font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                    <span style="position: relative;">
                        Programmes
                        <span style="position: absolute; bottom: -10px; left: 0; width: 50px; height: 2px; background-color: #0078d4;"></span>
                    </span>
                </h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Programmes</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Événements</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #2c3e50; text-decoration: none; transition: all 0.3s; display: flex; align-items: center;"><i class="bi bi-chevron-right me-2" style="color: #0056b3; font-size: 14px;"></i>Invitation VISA</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
                <div style="background: linear-gradient(135deg, #e6f2ff 0%, #cce5ff 100%); padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-left: 5px solid #0056b3;">
                    <h5 style="font-size: 20px; font-weight: 600; color: #0056b3; margin-bottom: 15px; display: flex; align-items: center;">
                        <i class="bi bi-calendar-event me-2"></i>
                        Le jour J approche !
                    </h5>
                    <p style="color: #2c3e50; margin-bottom: 20px; display: flex; align-items: start;">
                        <i class="bi bi-geo-alt me-2" style="color: #0056b3; margin-top: 3px;"></i>
                        <span>Ne vous contentez pas de visiter notre site, venez nous rencontrer au salon !</span>
                    </p>
                    <div id="countdown" style="
                        background: linear-gradient(135deg, #ffffff 0%, #f0f8ff 100%);
                        padding: 15px 20px;
                        border-radius: 8px;
                        color: #0056b3;
                        text-align: center;
                        font-weight: 700;
                        box-shadow: 0 3px 10px rgba(0,0,0,0.08);">
                        <i class="bi bi-hourglass-split me-2"></i>
                        <span id="days" style="font-size: 24px;">00</span> <small style="font-size: 14px; color: #2c3e50;">jours</small>
                        <span id="hours" style="font-size: 24px;">00</span> <small style="font-size: 14px; color: #2c3e50;">h</small>
                        <span id="minutes" style="font-size: 24px;">00</span> <small style="font-size: 14px; color: #2c3e50;">min</small>
                        <span id="seconds" style="font-size: 24px;">00</span> <small style="font-size: 14px; color: #2c3e50;">s</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <hr style="border-color: #cce5ff; opacity: 0.5;">
    </div>

    <div class="container copyright text-center py-4">
        <p style="color: #2c3e50; margin-bottom: 5px;">© <span>Copyright</span> <strong class="px-1 sitename" style="color: #0056b3;">Capa Algérie</strong> <span>All Rights Reserved</span></p>
        <div class="credits" style="color: #6c757d; font-size: 14px;">
            Designed by <a href="https://catalyst-dz.com/" style="color: #0078d4; text-decoration: none;">Catalyst-dz</a>
        </div>
    </div>

    <script>
        // Countdown timer script
        const countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 30); // Example: 30 days from now

        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById("days").innerHTML = String(days).padStart(2, '0');
            document.getElementById("hours").innerHTML = String(hours).padStart(2, '0');
            document.getElementById("minutes").innerHTML = String(minutes).padStart(2, '0');
            document.getElementById("seconds").innerHTML = String(seconds).padStart(2, '0');
            
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);

        // Hover effects for links
        document.querySelectorAll('.footer-links a, .social-links a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.color = '#0078d4';
                if (this.classList.contains('social-links')) {
                    this.style.backgroundColor = '#004080';
                }
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.color = '#2c3e50';
                if (this.classList.contains('social-links')) {
                    this.style.backgroundColor = '#0056b3';
                }
            });
        });
    </script>
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