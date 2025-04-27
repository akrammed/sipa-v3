
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 123, 255, 0.7), rgba(0, 123, 255, 0.9)), url('path/to/ocean-bg.jpg');
            background-size: cover;
            padding: 80px 0;
            color: white;
            margin-bottom: 30px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .floating-label {
            position: relative;
            margin-bottom: 20px;
        }
        .floating-label label {
            position: absolute;
            top: 0;
            left: 12px;
            padding: 0 5px;
            background: white;
            transform: translateY(-50%);
            font-size: 0.875rem;
            color: #6c757d;
        }
        .form-control, .form-select {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            height: auto;
        }
        .btn-outline-primary {
            border-width: 2px;
            font-weight: 600;
        }
        h4 {
            color: #0d6efd;
            font-weight: 600;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }
        .price-tag {
            display: inline-block;
            background: #e9ecef;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 10px;
            font-weight: 600;
            color: #0d6efd;
        }
        .total-price {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            font-size: 1.2rem;
        }
    </style>


<section class="hero-section" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Formulaire Inscription Exposant National</h1>
        <p class="lead">SIPA 2025 - Salon international de la Pêche et de l'Aquaculture</p>
    </div>
</section>

<!-- Main Form -->
<main class="container mb-5">
    <div class="form-container" data-aos="fade-up">
        <form method="POST" action="/emails/national" id="registration-form">
            <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getAttribute('csrfToken'); ?>">
            
            <!-- Informations sur l'entreprise -->
            <h4 data-aos="fade-right" class="mb-4">Informations sur l'entreprise</h4>
            <div class="row g-4" data-aos="fade-up">
                <div class="col-md-6 floating-label">
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                    <label for="company_name">Raison Sociale</label>
                </div>
                <div class="col-md-6 floating-label">
                    <label for="activity_sector">Secteur d'activité</label>
                    <select class="form-control" id="activity_sector" name="activity_sector" required>
                        <optgroup label="Pêche">
                            <option value="Pêche artisanale">Pêche artisanale</option>
                            <option value="Pêche côtière">Pêche côtière</option>
                            <option value="Pêche industrielle">Pêche industrielle</option>
                            <option value="Pêche au corail">Pêche au corail</option>
                            <option value="Pêche continentale">Pêche continentale</option>
                            <option value="Pêche récréative">Pêche récréative</option>
                            <option value="Pêche au thon rouge">Pêche au thon rouge</option>
                        </optgroup>

                        <optgroup label="Aquaculture">
                            <option value="Aquaculture marine">Aquaculture marine</option>
                            <option value="Aquaculture continentale">Aquaculture continentale</option>
                            <option value="Pisciculture intégrée">Pisciculture intégrée</option>
                        </optgroup>

                        <optgroup label="Autres secteurs">
                            <option value="Aliments pour poissons">Aliments pour poissons</option>
                            <option value="Génétique et reproduction">Génétique et reproduction</option>
                            <option value="Écloseries">Écloseries</option>
                            <option value="Fabrication de cages flottantes">Fabrication de cages flottantes</option>
                            <option value="Fabrication de filets de pêche">Fabrication de filets de pêche</option>
                            <option value="Équipements pour élevage de poissons">Équipements pour élevage de poissons</option>
                            <option value="Équipements pour la pêche professionnelle">Équipements pour la pêche professionnelle</option>
                            <option value="Appareils de pêche et navires">Appareils de pêche et navires</option>
                            <option value="Construction navale">Construction navale</option>
                            <option value="Équipements portuaires">Équipements portuaires</option>
                            <option value="Hygiène et santé des poissons">Hygiène et santé des poissons</option>
                            <option value="Transformation des produits halieutiques">Transformation des produits halieutiques</option>
                            <option value="Biotechnologies marines">Biotechnologies marines</option>
                            <option value="Énergies renouvelables">Énergies renouvelables</option>
                            <option value="Consultance">Consultance</option>
                            <option value="Commerce et distribution">Commerce et distribution</option>
                            <option value="Logistique">Logistique</option>
                            <option value="Écotourisme et pêche récréative">Écotourisme et pêche récréative</option>
                            <option value="Finance et investissements">Finance et investissements</option>
                            <option value="Bateaux de plaisance">Bateaux de plaisance</option>
                            <option value="Centres de recherche">Centres de recherche</option>
                            <option value="Plongée sous-marine">Plongée sous-marine</option>
                            <option value="Assurance">Assurance</option>
                            <option value="Banque">Banque</option>
                            <option value="Coopérative">Coopérative</option>
                            <option value="Association">Association</option>
                            <option value="Autre">Autre</option>
                        </optgroup>
                    </select>
                </div>

                <!-- Champ à afficher uniquement si "Autre" est sélectionné -->
                <div class="col-md-6 floating-label" id="other_sector_container" style="display:none;">
                    <input type="text" class="form-control" id="other_activity_sector" name="other_activity_sector" placeholder="Précisez votre secteur">
                    <label for="other_activity_sector">Autre secteur</label>
                </div>

                <div class="col-md-6 floating-label">
                    <input type="text" class="form-control" id="registry_number" name="registry_number" required>
                    <label for="registry_number">Registre de commerce Nº</label>
                </div>
                <div class="col-md-6 floating-label">
                    <input type="text" class="form-control" id="tax_id" name="tax_id" required>
                    <label for="tax_id">Nº Identifiant fiscal</label>
                </div>
                <div class="col-md-12 floating-label">
                    <input type="text" class="form-control" id="address" name="address" required>
                    <label for="address">Adresse</label>
                </div>
                <div class="col-md-4 floating-label">
                    <input type="text" class="form-control" id="city" name="city" required>
                    <label for="city">Ville</label>
                </div>
                <div class="col-md-4 floating-label">
                    <input type="text" class="form-control" id="country" name="country" required>
                    <label for="country">Pays</label>
                </div>
                <div class="col-md-4 floating-label">
                    <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                    <label for="contact_person">Personne à contacter</label>
                </div>
                <div class="col-md-4 floating-label">
                    <input type="tel" class="form-control" id="phone" name="phone">
                    <label for="phone">Tél.</label>
                </div>
                <div class="col-md-4 floating-label">
                    <input type="text" class="form-control" id="fax" name="fax">
                    <label for="fax">Fax</label>
                </div>
                <div class="col-md-4 floating-label">
                    <input type="tel" class="form-control" id="mobile" name="mobile" required>
                    <label for="mobile">Mobile</label>
                </div>
                <div class="col-md-6 floating-label">
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="col-md-6 floating-label">
                    <input type="url" class="form-control" id="website" name="website">
                    <label for="website">Site Web</label>
                </div>
            </div>

            <!-- Réservation de Stand -->
            <h4 data-aos="fade-right" class="mt-5">Réservation de Stand</h4>
            <div class="row g-4 mb-3" data-aos="fade-up">
                <div class="col-md-12 form-group">
                    <label for="stand_type"><strong>Type de Stand</strong></label>
                    <select class="form-select" id="stand_type" name="standType" required>
                        <option value="">-- Sélectionner un type de stand --</option>
                        <option value="17000">Stand aménagé (17.000 DA/m²)</option>
                        <option value="12000">Stand non aménagé (12.000 DA/m²)</option>
                        <option value="10000">Emplacement découvert (10.000 DA/m²)</option>
                    </select>
                </div>

                <div id="surfaceSelectContainer" class="col-md-12 form-group" style="display:none;">
                    <label for="surfaceSelect">Superficie demandée (m²)</label>
                    <select id="surfaceSelect" class="form-control" name="area" required>
                        <option value="">-- Choisir une superficie --</option>
                        <option value="12">12 m²</option>
                        <option value="15">15 m²</option>
                        <option value="18">18 m²</option>
                        <option value="21">21 m²</option>
                        <option value="24">24 m²</option>
                        <option value="27">27 m²</option>
                        <option value="36">36 m²</option>
                        <option value="48">48 m²</option>
                        <option value="54">54 m²</option>
                        <option value="60">60 m²</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <div id="totalPrice" class="mt-3"></div>
                </div>

                <!-- Electricité par jour -->
                <div class="col-md-6 floating-label">
                    <select class="form-select" id="electricity" name="electricity" required disabled>
                        <option value="">Électricité (par jour)</option>
                        <option value="12">12 m² - 720 DA</option>
                        <option value="15">15 m² - 900 DA</option>
                        <option value="18">18 m² - 1080 DA</option>
                        <option value="21">21 m² - 1260 DA</option>
                        <option value="24">24 m² - 1440 DA</option>
                        <option value="27">27 m² - 1620 DA</option>
                        <option value="36">36 m² - 2160 DA</option>
                        <option value="48">48 m² - 2890 DA</option>
                        <option value="54">54 m² - 3240 DA</option>
                        <option value="60">60 m² - 3600 DA</option>
                    </select>
                    <label for="electricity">Électricité </label>
                </div>
                
                <div class="col-md-6 floating-label">
                    <select class="form-select" id="facades" name="facades" required>
                        <option value="0">Sans supplément</option>
                        <option value="1">1 façade sans supplément</option>
                        <option value="2">2 façades - 17.000 Da</option>
                        <option value="3">3 façades - 22.000 Da</option>
                        <option value="4">4 façades - 31.000 Da</option>
                    </select>
                    <label for="facades">Façades supplémentaires</label>
                </div>

                <!-- Checkbox Électricité Obligatoire -->
                <div class="col-md-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="electricity_required" name="electricity_required" value="1" checked disabled hidden>
                        <label class="form-check-label" for="electricity_required">
                           
                        </label>
                    </div>
                </div>
            </div>

            <!-- Publicité sur le Catalogue -->
            <h4 data-aos="fade-right" class="mt-5 mb-4">Publicité sur le Catalogue</h4>
            <div data-aos="fade-up" class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="pub1" name="publicite" value="4e">
                    <label class="form-check-label" for="pub1">
                        4ème page de couverture
                        <span class="price-tag">120.000 DA</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="pub2" name="publicite" value="3e">
                    <label class="form-check-label" for="pub2">
                        3ème page de couverture
                        <span class="price-tag">100.000 DA</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="pub3" name="publicite" value="2e">
                    <label class="form-check-label" for="pub3">
                        2ème page de couverture
                        <span class="price-tag">80.000 DA</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="pub4" name="publicite" value="demi">
                    <label class="form-check-label" for="pub4">
                        1/2 page intérieure couleur
                        <span class="price-tag">32.000 DA</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="pub0" name="publicite" value="none" checked>
                    <label class="form-check-label" for="pub0">
                        Pas de publicité
                        <span class="price-tag">0 DA</span>
                    </label>
                </div>
            </div>

            <!-- Services supplémentaires -->
            <h4 data-aos="fade-right" class="mt-5 mb-4">Services supplémentaires</h4>
            <div data-aos="fade-up" class="mb-3">
                <div class="form-group mb-3">
                    <label for="category-select" class="form-label">Catégorie de produit</label>
                    <select class="form-select" id="category-select">
                        <option value="">-- Sélectionner une catégorie --</option>
                        <option value="chairs">Chaises</option>
                        <option value="tables">Tables</option>
                        <option value="sofas">Salons & Bureaux</option>
                        <option value="electronics">Électroniques & Accessoires</option>
                        <option value="service">Service</option>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="product-select" class="form-label">Produit</label>
                    <select class="form-select" id="product-select" disabled>
                        <option value="">-- Sélectionner d'abord une catégorie --</option>
                    </select>
                </div>
                
                <div class="selected-products mt-4" id="selected-products-list">
                    <!-- Selected products will appear here -->
                </div>
            </div>

            <!-- Signalétique du Stand -->
            <h4 data-aos="fade-right" class="mt-5 mb-4">Signalétique du Stand</h4>
            <div data-aos="fade-up" class="mb-3">
                <div class="floating-label">
                    <input type="text" class="form-control" id="stand_name" name="stand_name" maxlength="20" required>
                    <label for="stand_name">Nom sur l'enseigne (max 20 caractères)</label>
                </div>
            </div>

            <!-- Confirmation Badges et Macarons -->
            <h4 data-aos="fade-right" class="mt-5 mb-4">Confirmation</h4>
            <div class="row g-4" data-aos="fade-up">
                <div class="col-md-6 floating-label">
                    <input type="text" class="form-control" id="company_name_confirmation" name="company_name_confirmation" required>
                    <label for="company_name_confirmation">Nom de la société</label>
                </div>
                <div class="col-md-6 floating-label">
                    <select class="form-control" id="badges_select" name="badges_option" required>
                        <option value="">-- Sélectionner le nombre de badges --</option>
                        <option value="1">1 badge</option>
                        <option value="2">2 badges</option>
                        <option value="4">4 badges</option>
                        <option value="6">6 badges</option>
                        <option value="8">8 badges</option>
                        <option value="10">10 badges</option>
                        <option value="autre">Autre quantité</option>
                    </select>
                    <label for="badges_select">Nombre de badges exposants</label>
                </div>

                <div class="col-md-6 floating-label" id="custom_badges_container" style="display: none;">
                    <input type="number" class="form-control" id="badges_count" name="badges_count" min="1">
                    <label for="badges_count">Précisez le nombre de badges</label>
                </div>

                <div class="col-md-6 floating-label">
    <select class="form-select" id="macarons" name="macarons" required disabled>
        <option value="">Nombre de macarons</option>
        <option value="1">1 macaron</option>
        <option value="2">2 macarons</option>
        <option value="3">3 macarons</option>
    </select>
    <label for="macarons">Macarons (calculé automatiquement)</label>
</div>
<script>
    

    document.addEventListener('DOMContentLoaded', function() {
    // Récupérer les éléments
    const badgesSelect = document.getElementById('badges_select');
    const macaronsSelect = document.getElementById('macarons');
    const customBadgesContainer = document.getElementById('custom_badges_container');
    const badgesCountInput = document.getElementById('badges_count');
    
    // Fonction pour mettre à jour les macarons en fonction des badges
    function updateMacarons(badgeCount) {
        if (badgeCount <= 0) {
            macaronsSelect.value = "";
        } else if (badgeCount <= 2) {
            macaronsSelect.value = "1"; // 1-2 badges = 1 macaron
        } else if (badgeCount <= 4) {
            macaronsSelect.value = "2"; // 3-4 badges = 2 macarons
        } else {
            macaronsSelect.value = "3"; // 5+ badges = 3 macarons (max)
        }
    }
    
    // Événement de changement sur le select des badges
    badgesSelect.addEventListener('change', function() {
        const selectedValue = this.value;
        
        if (selectedValue === 'autre') {
            // Afficher le champ pour saisir un nombre personnalisé
            customBadgesContainer.style.display = 'block';
            badgesCountInput.addEventListener('input', function() {
                updateMacarons(parseInt(this.value) || 0);
            });
        } else {
            // Cacher le champ personnalisé
            customBadgesContainer.style.display = 'none';
            
            // Mettre à jour les macarons en fonction du nombre de badges sélectionné
            updateMacarons(parseInt(selectedValue) || 0);
        }
    });
});
</script>
                <div class="col-md-12 floating-label">
                    <textarea class="form-control" id="specific_request" name="specific_request" rows="3" placeholder="Demande badge supplémentaire"></textarea>
                    <label for="specific_request">badge supplémentaire</label>
                </div>
            </div>

            <!-- Récapitulatif de commande -->
            <div class="card mt-5 mb-4" data-aos="fade-up" id="order-summary">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Récapitulatif de votre commande</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Détails de votre stand</h5>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="stand-type-detail">
                                    Type de stand
                                    <span id="stand-type-text">Non sélectionné</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="surface-detail">
                                    Superficie
                                    <span id="surface-text">Non sélectionnée</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Électricité obligatoire
                                    <span>20.000 DA</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="electricity-detail">
                                    Électricité 
                                    <span id="electricity-text">0 DA</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="facades-detail">
                                    Façades supplémentaires
                                    <span id="facades-text">0 DA</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Options supplémentaires</h5>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="pub-detail">
                                    Publicité catalogue
                                    <span id="pub-text">Non sélectionnée</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="products-summary">
                                    Produits supplémentaires
                                    <span id="products-count">0 produit(s)</span>
                                </li>
                            </ul>
                            <div id="selected-products-summary" class="mt-3"></div>
                        </div>
                    </div>
                    
                    <div class="alert alert-primary mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="mb-0">MONTANT TOTAL</h4>
                                <small>Ce montant est une estimation et pourra être ajusté.</small>
                            </div>
                            <div class="col-md-4 text-end">
                                <h3 id="grand-total" class="mb-0">0 DA</h3>
                                <input type="hidden" name="total_amount" id="total_amount_input" value="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <input type="hidden" name="selected_products" id="selected_products_input" value="">

            <div class="text-center mt-5" data-aos="zoom-in">
                <button type="submit" class="btn btn-outline-primary btn-lg px-5 py-3">
                    <i class="fas fa-paper-plane me-2"></i>Soumettre
                </button>
            </div>
        </form>
    </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>© SIPA 2025 - Salon international de la Pêche et de l'Aquaculture</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Script pour initialiser AOS (Animate On Scroll) -->
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // ------- VARIABLES GLOBALES -------
    let totalAmount = 0;
    const priceList = {
        // Prix fixes
        electricity_required: 20000,
        facades: {
            '0': 0,
            '1': 0,
            '2': 17000,
            '3': 22000,
            '4': 31000
        },
        publicite: {
            '4e': 120000,
            '3e': 100000,
            '2e': 80000,
            'demi': 32000,
            'none': 0
        },
        // Tarifs d'électricité par jour en fonction de la superficie
        electricity: {
            '12': 720,
            '15': 900,
            '18': 1080,
            '21': 1260,
            '24': 1440,
            '27': 1620,
            '36': 2160,
            '48': 2890,
            '54': 3240,
            '60': 3600
        },
        // Libellés des types de stand
        standTypeLabels: {
            '17000': 'Stand aménagé',
            '12000': 'Stand non aménagé',
            '10000': 'Emplacement découvert'
        },
        // Libellés des publicités
        publiciteLabels: {
            '4e': '4ème page de couverture',
            '3e': '3ème page de couverture',
            '2e': '2ème page de couverture',
            'demi': '1/2 page intérieure',
            'none': 'Pas de publicité'
        }
    };

    // Liste des produits sélectionnés
    const selectedProducts = [];

    // Catalogue des produits
    const productCatalog = {
        chairs: [
            { id: "chair1", name: "Chaise EVEREST B", price: 2500.00, details: "" },
            { id: "chair2", name: "Chaise SCANDINAVE B", price: 4200.00, details: "" },
            { id: "chair3", name: "Chaise RÉUNION N", price: 2500.00, details: "" },
            { id: "chair4", name: "Chaise OR rouge et beige", price: 2000.00, details: "" },
            { id: "chair5", name: "Chaise PATCHWORK gris", price: 8000.00, details: "" },
            { id: "chair6", name: "Chaise ALINEA B", price: 6500.00, details: "" },
            { id: "chair7", name: "Chaise haute SIMILI, noire", price: 5500.00, details: "" },
            { id: "chair8", name: "Chaise haute CONFORT, n b r", price: 7000.00, details: "" }
        ],
        tables: [
            { id: "table1", name: "Table RONDE blanche", price: 5000.00, details: "80 cm de diamètre. 70 cm de hauteur." },
            { id: "table2", name: "Table ATELIER", price: 10500.00, details: "Dimension 140 cm x 65 cm. 70 cm de hauteur grise" },
            { id: "table3", name: "Table SCANDINAVE RONDE en verre", price: 7000.00, details: "Dimension 80 cm de diamètre 75 cm de hauteur blanche" },
            { id: "table4", name: "Table SCANDINAVE CARÉE en verre", price: 8500.00, details: "Dimension 85 cm x 85 cm 75 cm de hauteur" },
            { id: "table5", name: "Table haute SCANDINAVE", price: 8000.00, details: "Dimension 60 cm de diamètre 100 cm de hauteur" },
            { id: "table6", name: "Table haute CLASSIC noir", price: 6000.00, details: "Dimension 60 cm de diamètre 110 cm de hauteur" }
        ],
        sofas: [
            { id: "sofa1", name: "Canapé SIMPLE blanc", price: 12000.00, details: "" },
            { id: "sofa2", name: "Canapé SIMPLE noir", price: 12000.00, details: "" },
            { id: "sofa3", name: "Bureau de travail CUBIC", price: 16000.00, details: "Avec tiroir" },
            { id: "sofa4", name: "Bureau d'accueil ROND blanc", price: 20000.00, details: "" }
        ],
        electronics: [
            { id: "elec1", name: "Écran LED 32 pouces", price: 15000.00, details: "" },
            { id: "elec2", name: "Écran LED 42 pouces", price: 20000.00, details: "" },
            { id: "elec3", name: "Projecteur", price: 12000.00, details: "" },
            { id: "elec4", name: "Réfrigérateur petit", price: 8000.00, details: "" },
            { id: "elec5", name: "Réfrigérateur grand", price: 15000.00, details: "" },
            { id: "elec6", name: "Ordinateur portable", price: 10000.00, details: "" },
            { id: "elec7", name: "Support de prospectus", price: 4000.00, details: "" }
        ]
    };

    // ------- SÉLECTEURS DOM -------
    const standTypeSelect = document.getElementById('stand_type');
    const surfaceSelectContainer = document.getElementById('surfaceSelectContainer');
    const surfaceSelect = document.getElementById('surfaceSelect');
    const electricitySelect = document.getElementById('electricity');
    const facadesSelect = document.getElementById('facades');
    const totalPriceElement = document.getElementById('totalPrice');
    const categorySelect = document.getElementById('category-select');
    const productSelect = document.getElementById('product-select');
    const selectedProductsList = document.getElementById('selected-products-list');
    const badgesSelect = document.getElementById('badges_select');
    const customBadgesContainer = document.getElementById('custom_badges_container');
    const activitySectorSelect = document.getElementById('activity_sector');
    const otherSectorContainer = document.getElementById('other_sector_container');
    const standTypeDetail = document.getElementById('stand-type-text');
    const surfaceDetail = document.getElementById('surface-text');
    const electricityDetail = document.getElementById('electricity-text');
    const facadesDetail = document.getElementById('facades-text');
    const pubDetail = document.getElementById('pub-text');
    const productsCount = document.getElementById('products-count');
    const grandTotal = document.getElementById('grand-total');
    const totalAmountInput = document.getElementById('total_amount_input');
    const selectedProductsSummary = document.getElementById('selected-products-summary');

    // ------- FONCTIONS -------
    


    // Calcul du prix total
    function calculateTotal() {
        let standPrice = 0;
        let standArea = 0;
        let electricityPrice = 0;
        let facadesPrice = 0;
        let pubPrice = 0;
        let productsPrice = 0;
        
        // Prix du stand
        if (standTypeSelect.value && surfaceSelect.value) {
            standPrice = parseInt(standTypeSelect.value) * parseInt(surfaceSelect.value);
            standArea = parseInt(surfaceSelect.value);
        }
        
        // Prix de l'électricité par jour
        if (electricitySelect.value) {
            electricityPrice = priceList.electricity[electricitySelect.value];
        }
        
        // Prix des façades supplémentaires
        if (facadesSelect.value) {
            facadesPrice = priceList.facades[facadesSelect.value];
        }
        
        // Prix de la publicité
        const selectedPub = document.querySelector('input[name="publicite"]:checked');
        if (selectedPub) {
            pubPrice = priceList.publicite[selectedPub.value];
        }
        
        // Prix des produits supplémentaires
        selectedProducts.forEach(product => {
            productsPrice += product.price * product.quantity;
        });
        
        // Total
        totalAmount = standPrice + priceList.electricity_required + electricityPrice + facadesPrice + pubPrice + productsPrice;
        
        // Mise à jour de l'affichage
        totalPriceElement.innerHTML = `
            <div class="total-price">
                <div class="row">
                    <div class="col-md-8">
                        <strong>Prix total estimé:</strong>
                    </div>
                    <div class="col-md-4 text-end">
                        <strong>${formatPrice(totalAmount)} DA</strong>
                    </div>
                </div>
            </div>
        `;
        
        // Mise à jour du récapitulatif
        updateSummary(standPrice, standArea, electricityPrice, facadesPrice, pubPrice, productsPrice);
        
        return totalAmount;
    }
    
    // Formatage des prix
    function formatPrice(price) {
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    
    // Mise à jour du récapitulatif de commande
    function updateSummary(standPrice, standArea, electricityPrice, facadesPrice, pubPrice, productsPrice) {
        // Type de stand
        if (standTypeSelect.value) {
            standTypeDetail.textContent = `${priceList.standTypeLabels[standTypeSelect.value]} (${formatPrice(parseInt(standTypeSelect.value))} DA/m²)`;
        } else {
            standTypeDetail.textContent = 'Non sélectionné';
        }
        
        // Superficie
        if (surfaceSelect.value) {
            surfaceDetail.textContent = `${surfaceSelect.value} m² (${formatPrice(standPrice)} DA)`;
        } else {
            surfaceDetail.textContent = 'Non sélectionnée';
        }
        
        // Électricité par jour
        if (electricitySelect.value) {
            electricityDetail.textContent = `${formatPrice(electricityPrice)} DA`;
        } else {
            electricityDetail.textContent = '0 DA';
        }
        
        // Façades
        if (facadesSelect.value) {
            const facadesText = facadesSelect.options[facadesSelect.selectedIndex].text;
            facadesDetail.textContent = `${facadesText.split('-')[0].trim()} (${formatPrice(facadesPrice)} DA)`;
        } else {
            facadesDetail.textContent = '0 DA';
        }
        
        // Publicité
        const selectedPub = document.querySelector('input[name="publicite"]:checked');
        if (selectedPub && selectedPub.value !== 'none') {
            pubDetail.textContent = `${priceList.publiciteLabels[selectedPub.value]} (${formatPrice(pubPrice)} DA)`;
        } else {
            pubDetail.textContent = 'Non sélectionnée';
        }
        
        // Produits
        productsCount.textContent = `${selectedProducts.length} produit(s)`;
        
        // Liste des produits sélectionnés
        let productsHTML = '';
        if (selectedProducts.length > 0) {
            productsHTML = '<ul class="list-group">';
            selectedProducts.forEach(product => {
                productsHTML += `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ${product.name} x ${product.quantity}
                        <span>${formatPrice(product.price * product.quantity)} DA</span>
                    </li>
                `;
            });
            productsHTML += '</ul>';
        } else {
            productsHTML = '<p class="text-muted">Aucun produit supplémentaire sélectionné</p>';
        }
        selectedProductsSummary.innerHTML = productsHTML;
        
        // Grand total
        grandTotal.textContent = `${formatPrice(totalAmount)} DA`;
        totalAmountInput.value = totalAmount;
    }
    
    // Ajouter un produit à la liste des produits sélectionnés
    function addProduct(productId, category) {
        const catalog = productCatalog[category];
        const product = catalog.find(p => p.id === productId);
        
        if (product) {
            // Vérifier si le produit est déjà dans la liste
            const existingProduct = selectedProducts.find(p => p.id === productId);
            
            if (existingProduct) {
                // Incrémenter la quantité
                existingProduct.quantity += 1;
            } else {
                // Ajouter le nouveau produit
                selectedProducts.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    quantity: 1,
                    details: product.details
                });
            }
            
            // Mettre à jour l'affichage
            updateProductsList();
            calculateTotal();
        }
    }
    
    // Supprimer un produit de la liste
    function removeProduct(productId) {
        const index = selectedProducts.findIndex(p => p.id === productId);
        
        if (index !== -1) {
            selectedProducts.splice(index, 1);
            updateProductsList();
            calculateTotal();
        }
    }
    
    // Mettre à jour la quantité d'un produit
    function updateProductQuantity(productId, quantity) {
        const product = selectedProducts.find(p => p.id === productId);
        
        if (product) {
            product.quantity = parseInt(quantity);
            
            if (product.quantity <= 0) {
                removeProduct(productId);
            } else {
                updateProductsList();
                calculateTotal();
            }
        }
    }
    
    // Mettre à jour l'affichage de la liste des produits
    function updateProductsList() {
        selectedProductsList.innerHTML = '';
        
        if (selectedProducts.length === 0) {
            selectedProductsList.innerHTML = '<p class="text-muted">Aucun produit sélectionné</p>';
            return;
        }
        
        selectedProducts.forEach(product => {
            const card = document.createElement('div');
            card.className = 'card mb-3';
            card.innerHTML = `
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">${product.name}</h5>
                        
                    </div>
                    ${product.details ? `<p class="card-text text-muted small">${product.details}</p>` : ''}
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="badge bg-primary">${formatPrice(product.price)} DA / unité</span>
                        <div>
                            <span class="text-primary fw-bold me-3">Total: ${formatPrice(product.price * product.quantity)} DA</span>
                            <button type="button" class="btn btn-sm btn-danger remove-product" data-product-id="${product.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            selectedProductsList.appendChild(card);
        });
        
        // Ajouter les événements pour les boutons et les inputs
        document.querySelectorAll('.remove-product').forEach(button => {
            button.addEventListener('click', function() {
                removeProduct(this.dataset.productId);
            });
        });
        
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const quantityInput = document.querySelector(`.quantity-input[data-product-id="${productId}"]`);
                const newQuantity = parseInt(quantityInput.value) + 1;
                quantityInput.value = newQuantity;
                updateProductQuantity(productId, newQuantity);
            });
        });
        
        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const quantityInput = document.querySelector(`.quantity-input[data-product-id="${productId}"]`);
                const newQuantity = parseInt(quantityInput.value) - 1;
                if (newQuantity >= 1) {
                    quantityInput.value = newQuantity;
                    updateProductQuantity(productId, newQuantity);
                }
            });
        });
        
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                updateProductQuantity(this.dataset.productId, this.value);
            });
        });

        document.getElementById('selected_products_input').value = JSON.stringify(selectedProducts);
    }
    
    // Peupler le sélecteur de produits en fonction de la catégorie
    function populateProductSelect(category) {
        productSelect.innerHTML = '<option value="">-- Sélectionner un produit --</option>';
        
        if (category) {
            const catalog = productCatalog[category];
            
            catalog.forEach(product => {
                const option = document.createElement('option');
                option.value = product.id;
                option.textContent = `${product.name} - ${formatPrice(product.price)} DA`;
                if (product.details) {
                    option.textContent += ` (${product.details})`;
                }
                productSelect.appendChild(option);
            });
            
            productSelect.disabled = false;
        } else {
            productSelect.disabled = true;
        }
    }

    // ------- ÉVÉNEMENTS -------
    
    // Changement du type de stand
    standTypeSelect.addEventListener('change', function() {
        if (this.value) {
            surfaceSelectContainer.style.display = 'block';
        } else {
            surfaceSelectContainer.style.display = 'none';
        }
        calculateTotal();
    });
    
    // Changement de la superficie
    surfaceSelect.addEventListener('change', function() {
        // Synchroniser la sélection de l'électricité avec la superficie
        if (this.value) {
            electricitySelect.value = this.value;
        }
        calculateTotal();
    });
    
    // Changement de l'électricité
    electricitySelect.addEventListener('change', calculateTotal);
    
    // Changement des façades
    facadesSelect.addEventListener('change', calculateTotal);
    
    // Changement de la publicité
    document.querySelectorAll('input[name="publicite"]').forEach(radio => {
        radio.addEventListener('change', calculateTotal);
    });
    
    // Changement de la catégorie de produit
    categorySelect.addEventListener('change', function() {
        populateProductSelect(this.value);
    });
    
    // Sélection d'un produit
    productSelect.addEventListener('change', function() {
        if (this.value) {
            addProduct(this.value, categorySelect.value);
            this.value = ''; // Réinitialiser la sélection
        }
    });
    
    // Changement du nombre de badges
    badgesSelect.addEventListener('change', function() {
        if (this.value === 'autre') {
            customBadgesContainer.style.display = 'block';
        } else {
            customBadgesContainer.style.display = 'none';
        }
    });
    
    // Changement du secteur d'activité
    activitySectorSelect.addEventListener('change', function() {
        if (this.value === 'Autre') {
            otherSectorContainer.style.display = 'block';
        } else {
            otherSectorContainer.style.display = 'none';
        }
    });
    
    // Initialisation
    updateProductsList();
    calculateTotal();
});
</script>
