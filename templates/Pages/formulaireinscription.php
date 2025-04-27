<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Custom Styles */
    :root {
        --primary-color: #0a58ca;
        --secondary-color: #6c757d;
        --accent-color: #ffc107;
        --light-color: #f8f9fa;
        --dark-color: #212529;
    }

    body {
        background-color: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .hero-section {
        background: linear-gradient(135deg, #0a58ca, #084298);
        padding: 80px 0;
        margin-bottom: 30px;
        color: white;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .form-container {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }

    .form-container:hover {
        transform: translateY(-5px);
    }

    .section-header {
        position: relative;
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 12px;
        font-weight: 600;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
    }

    .section-header i {
        margin-right: 10px;
        font-size: 1.2em;
    }

    .floating-label {
        position: relative;
        margin-bottom: 25px;
    }

    .floating-label label {
        position: absolute;
        top: 0;
        left: 12px;
        padding: 0 5px;
        background: white;
        transform: translateY(-50%);
        font-size: 0.85rem;
        color: var(--secondary-color);
        transition: all 0.3s ease;
        z-index: 1;
    }

    .floating-label .form-control,
    .floating-label .form-select {
        height: 55px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding-left: 15px;
        transition: all 0.3s ease;
    }

    .floating-label .form-control:focus,
    .floating-label .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(10, 88, 202, 0.25);
    }

    .price-tag {
        background-color: #e9ecef;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.85rem;
        margin-left: 10px;
        color: var(--dark-color);
        font-weight: 500;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(10, 88, 202, 0.3);
    }

    .form-check {
        margin-bottom: 12px;
        padding-left: 2.2rem;
    }

    .form-check-input {
        width: 1.2em;
        height: 1.2em;
    }

    .order-summary {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        margin-top: 40px;
        margin-bottom: 40px;
        transition: all 0.3s ease;
    }

    .order-summary:hover {
        transform: translateY(-5px);
    }

    .order-summary-header {
        background: linear-gradient(135deg, #0a58ca, #084298);
        color: white;
        padding: 20px;
        font-weight: 600;
    }

    .order-summary-body {
        padding: 20px;
    }

    .order-summary-row {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }

    .order-summary-row:last-child {
        border-bottom: none;
    }

    .order-total {
        background-color: #f8f9fa;
        padding: 15px 20px;
        border-top: 2px solid #dee2e6;
        font-weight: 700;
        font-size: 1.2em;
    }

    .selected-products-list {
        margin-top: 15px;
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 10px;
    }

    .product-card {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.2s ease;
    }

    .product-card:hover {
        background: #e9ecef;
    }

    .badge {
        font-size: 0.8em;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .tooltip-icon {
        color: var(--primary-color);
        cursor: help;
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animated {
        animation: fadeIn 0.6s ease-out;
    }
</style>

<section class="hero-section">
    <div class="container text-center animated">
        <h1 class="display-5 text-white fw-bold mb-3">Formulaire d'Inscription Exposant International</h1>
        <p class="lead">SIPA 2025 - Salon International de la Pêche et de l'Aquaculture</p>
    </div>
</section>

<main class="container mb-5">
    <form id="registration-form" method="POST" action="/emails/international">
        <!-- CSRF Token -->
        <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getAttribute('csrfToken'); ?>">

        <!-- Informations sur l'entreprise -->
        <div class="form-container animated">
            <h4 class="section-header"><i class="fas fa-building"></i> Informations sur l'entreprise</h4>
            <div class="row g-4">
                <div class="col-md-6 floating-label">
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                    <label for="company_name">Raison Sociale</label>
                </div>
                <div class="col-md-6 floating-label">
                    <select class="form-select" id="activity_sector" name="activity_sector" required onchange="toggleOtherSector(this)">
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
                            <option value="Autre">Autre</option>
                        </optgroup>
                    </select>
                    <label for="activity_sector">Secteur d'activité</label>
                    <!-- Hidden text input for "Autre" -->
                    <input type="text" class="form-control mt-2" id="other_activity_sector" name="other_activity_sector" placeholder="Précisez votre secteur" style="display:none;">
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
        </div>

        <!-- Réservation de Stand -->
        <div class="form-container animated">
            <h4 class="section-header"><i class="fas fa-store"></i> Réservation de Stand</h4>
            <div class="row g-4">
                <div class="col-md-12 mb-4">
                    <label for="stand_type" class="form-label">Type de Stand</label>
                    <select class="form-select py-3" id="stand_type" name="stand_type" required>
                        <option value="">-- Choisir un type de stand --</option>
                        <option value="amenage">Stand aménagé - 250 €/m²</option>
                        <option value="non_amenage">Stand non aménagé - 200 €/m²</option>
                        <option value="decouvert">Emplacement découvert - 150 €/m²</option>
                    </select>
                </div>

                <!-- Surface Select -->
                <div id="surfaceSelectContainer" class="col-md-6" style="display:none;">
                    <label for="surfaceSelect" class="form-label">Superficie demandée (m²)</label>
                    <select id="surfaceSelect" class="form-select py-3" name="area" required>
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

                <div id="electricityContainer" class="col-md-6" style="display:none;">
                    <label for="electricity" class="form-label">Électricité <span class="badge bg-primary">Obligatoire</span></label>
                    <select class="form-select py-3" id="electricity" name="electricity" required disabled>
                        <option value="">-- Sélectionnée automatiquement --</option>
                        <option value="12">12 m² - 60 €</option>
                        <option value="15">15 m² - 75 €</option>
                        <option value="18">18 m² - 90 €</option>
                        <option value="21">21 m² - 105 €</option>
                        <option value="24">24 m² - 130 €</option>
                        <option value="27">27 m² - 145 €</option>
                        <option value="36">36 m² - 180 €</option>
                        <option value="48">48 m² - 240 €</option>
                        <option value="54">54 m² - 270 €</option>
                        <option value="60">60 m² - 300 €</option>
                    </select>
                    <small class="text-muted">L'option d'électricité est automatiquement ajustée selon la superficie.</small>
                </div>

                <div class="col-md-12">
                    <div id="totalPrice" class="alert alert-info mt-3 p-3" style="display:none;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Prix total du stand:</span>
                            <strong id="standPriceValue">0 €</strong>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="facades" class="form-label">Façades supplémentaires</label>
                    <select class="form-select py-3" id="facades" name="facades" required>
                        <option value="0">Sans</option>
                        <option value="2">2 façades - 250 €</option>
                        <option value="3">3 façades - 350 €</option>
                        <option value="4">4 façades - 400 €</option>
                    </select>
                </div>
                <input class="form-check-input" type="checkbox" id="electricity_required" name="electricity_required" value="1" checked hidden>
            </div>
        </div>

        <!-- Publicité sur le Catalogue -->
        <div class="form-container animated">
            <h4 class="section-header"><i class="fas fa-ad"></i> Publicité sur le Catalogue</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" id="pub1" name="publicite_catalogue" value="pub1">
                        <label class="form-check-label" for="pub1">
                            4ème page de couverture
                            <span class="price-tag">2000 €</span>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" id="pub2" name="publicite_catalogue" value="pub2">
                        <label class="form-check-label" for="pub2">
                            3ème page de couverture
                            <span class="price-tag">1600 €</span>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" id="pub3" name="publicite_catalogue" value="pub3">
                        <label class="form-check-label" for="pub3">
                            2ème page de couverture
                            <span class="price-tag">1500 €</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" id="pub4" name="publicite_catalogue" value="pub4">
                        <label class="form-check-label" for="pub4">
                            1/2 page intérieure couleur
                            <span class="price-tag">400 €</span>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" id="pub_none" name="publicite_catalogue" value="none" checked>
                        <label class="form-check-label" for="pub_none">
                            Aucune publicité
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services supplémentaires -->
        <div class="form-container animated">
            <h4 class="section-header"> <i class="fas fa-shopping-cart fa-2x mb-3"></i> Services supplémentaires</h4>
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label for="category-select" class="form-label">Catégorie de produit</label>
                    <select class="form-select py-3" id="category-select">
                        <option value="">-- Sélectionner une catégorie --</option>
                        <option value="chairs">Chaises</option>
                        <option value="tables">Tables</option>
                        <option value="sofas">Salons & Bureaux</option>
                        <option value="electronics">Électroniques & Accessoires</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="product-select" class="form-label">Produit</label>
                    <select class="form-select py-3" id="product-select" disabled>
                        <option value="">-- Sélectionner d'abord une catégorie --</option>
                    </select>
                </div>
            </div>

            <div class="selected-products-list mt-4" id="selected-products-list">
                <!-- Les produits sélectionnés apparaîtront ici -->
                <div class="text-center text-muted py-4">
                    <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                    <p>Aucun produit sélectionné</p>
                </div>
            </div>
        </div>

        <!-- Signalétique du Stand -->
        <div class="form-container animated">
            <h4 class="section-header"><i class="fas fa-sign"></i> Signalétique du Stand</h4>
            <div class="floating-label">
                <input type="text" class="form-control" id="stand_name" name="stand_name" placeholder="Nom sur l'enseigne" maxlength="20" required>
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
        <!-- Récapitulatif de la commande -->
        <div class="order-summary animated" id="order-summary">
            <div class="order-summary-header">
                <h4 class="mb-0"><i class="fas fa-receipt"></i> Récapitulatif de votre commande</h4>
            </div>
            <div class="order-summary-body">
                <div class="order-summary-row">
                    <div><strong>Type de stand:</strong></div>
                    <div id="stand-type-text">Non sélectionné</div>
                </div>
                <div class="order-summary-row">
                    <div><strong>Superficie:</strong></div>
                    <div id="surface-text">Non sélectionnée</div>
                </div>
                <div class="order-summary-row">
                    <div><strong>Électricité obligatoire:</strong></div>
                    <div>180 €</div>
                </div>
                <div class="order-summary-row">
                    <div><strong>Électricité selon superficie:</strong></div>
                    <div id="electricity-text">0 €</div>
                </div>
                <div class="order-summary-row">
                    <div><strong>Façades supplémentaires:</strong></div>
                    <div id="facades-text">0 €</div>
                </div>
                <div class="order-summary-row">
                    <div><strong>Publicité catalogue:</strong></div>
                    <div id="pub-text">Non sélectionnée</div>
                </div>
                <div class="order-summary-row">
                    <div><strong>Produits supplémentaires:</strong></div>
                    <div id="products-count">0 produit(s) - 0 €</div>
                </div>

                <div id="selected-products-summary" class="mt-3">
                    <!-- La liste des produits sélectionnés apparaîtra ici -->
                </div>
            </div>
            <div class="order-total d-flex justify-content-between align-items-center">
                <h5 class="mb-0">TOTAL:</h5>
                <div id="grand-total">0 €</div>
            </div>
        </div>

        <!-- Bouton de soumission -->
        <div class="text-center mt-5 animated">
            <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                <i class="fas fa-paper-plane me-2"></i>Soumettre la demande
            </button>
        </div>

        <!-- Champs cachés pour le traitement -->
        <input type="hidden" id="total_amount_input" name="total_amount" value="0">
        <input type="hidden" id="selected_products_input" name="selected_products_json" value="[]">
    </form>
</main>
<script>
    // ------- VARIABLES GLOBALES -------
    let totalAmount = 0;
    let selectedProducts = [];

    const priceList = {
        // Prix fixes (en euros)
        electricity_required: 180, // Prix électricité obligatoire
        facades: {
            '0': 0, // Sans façades supplémentaires
            '2': 250, // 2 façades
            '3': 350, // 3 façades
            '4': 400 // 4 façades
        },
        publicite: {
            'pub1': 2000, // 4ème page de couverture
            'pub2': 1600, // 3ème page de couverture
            'pub3': 1500, // 2ème page de couverture
            'pub4': 400, // 1/2 page intérieure
            'none': 0 // Pas de publicité
        },
        // Tarifs d'électricité par jour en fonction de la superficie (en euros)
        electricity: {
            '12': 60,
            '15': 75,
            '18': 90,
            '21': 105,
            '24': 130,
            '27': 145,
            '36': 180,
            '48': 240,
            '54': 270,
            '60': 300
        },
        // Libellés des types de stand avec prix par m²
        standTypeLabels: {
            'amenage': 'Stand aménagé (250 €/m²)',
            'non_amenage': 'Stand non aménagé (200 €/m²)',
            'decouvert': 'Emplacement découvert (150 €/m²)'
        },
        // Prix du m² selon le type de stand
        standTypePrices: {
            'amenage': 250,
            'non_amenage': 200,
            'decouvert': 150
        },
        // Libellés des publicités
        publiciteLabels: {
            'pub1': '4ème page de couverture',
            'pub2': '3ème page de couverture',
            'pub3': '2ème page de couverture',
            'pub4': '1/2 page intérieure couleur',
            'none': 'Aucune publicité'
        }
    };

    // Liste des produits disponibles par catégorie
    const productCatalog = {
        chairs: [{
                name: "Chaise EVEREST B",
                price: 25.00,
                details: "Chaise moderne en plastique blanc"
            },
            {
                name: "Chaise SCANDINAVE B",
                price: 45.00,
                details: "Chaise design style scandinave"
            },
            {
                name: "Chaise RÉUNION N",
                price: 25.00,
                details: "Chaise de réunion noir"
            },
            {
                name: "Chaise CONFERENCE",
                price: 30.00,
                details: "Chaise confortable pour conférences"
            }
        ],
        tables: [{
                name: "Table RECTANGLE 120x80",
                price: 50.00,
                details: "Table rectangulaire 120x80cm"
            },
            {
                name: "Table RONDE 80",
                price: 45.00,
                details: "Table ronde diamètre 80cm"
            },
            {
                name: "Table HAUTE 60",
                price: 55.00,
                details: "Table haute diamètre 60cm"
            },
            {
                name: "Table BASSE 60x60",
                price: 35.00,
                details: "Table basse carrée 60x60cm"
            }
        ],
        sofas: [{
                name: "Bureau DIRECTION 160",
                price: 120.00,
                details: "Bureau de direction 160x80cm"
            },
            {
                name: "Bureau STANDARD 120",
                price: 80.00,
                details: "Bureau standard 120x80cm"
            },
            {
                name: "Ensemble LOUNGE",
                price: 200.00,
                details: "Ensemble salon lounge 3 pièces"
            },
            {
                name: "Canapé 2 PLACES",
                price: 150.00,
                details: "Canapé moderne 2 places"
            }
        ],
        electronics: [{
                name: "Écran TV 42\"",
                price: 180.00,
                details: "Écran TV 42 pouces"
            },
            {
                name: "Vidéoprojecteur",
                price: 250.00,
                details: "Vidéoprojecteur HD"
            },
            {
                name: "Réfrigérateur 120L",
                price: 120.00,
                details: "Petit réfrigérateur"
            },
            {
                name: "Machine à café",
                price: 80.00,
                details: "Machine à café avec capsules"
            }
        ]
    };

    // ------- FONCTIONS UTILITAIRES -------

    // Fonction pour basculer l'affichage du champ "Autre secteur"
    function toggleOtherSector(selectElement) {
        const otherSectorInput = document.getElementById('other_activity_sector');
        if (selectElement.value === 'Autre') {
            otherSectorInput.style.display = 'block';
            otherSectorInput.required = true;
        } else {
            otherSectorInput.style.display = 'none';
            otherSectorInput.required = false;
            otherSectorInput.value = '';
        }
    }

    // Fonction pour mettre à jour l'affichage du prix total
    function updateTotalPrice() {
        // Calculer le prix du stand
        let standPrice = 0;
        const standType = document.getElementById('stand_type').value;
        const surface = document.getElementById('surfaceSelect').value;

        if (standType && surface) {
            standPrice = priceList.standTypePrices[standType] * parseInt(surface);
            document.getElementById('standPriceValue').textContent = standPrice + ' €';
            document.getElementById('totalPrice').style.display = 'block';
        } else {
            document.getElementById('totalPrice').style.display = 'none';
        }

        // Calculer le prix total
        let total = standPrice;

        // Ajouter électricité obligatoire
        total += priceList.electricity_required;

        // Ajouter électricité selon superficie
        if (surface) {
            total += priceList.electricity[surface] || 0;
            document.getElementById('electricity-text').textContent = (priceList.electricity[surface] || 0) + ' €';
        } else {
            document.getElementById('electricity-text').textContent = '0 €';
        }

        // Ajouter façades supplémentaires
        const facades = document.getElementById('facades').value;
        total += priceList.facades[facades] || 0;
        document.getElementById('facades-text').textContent = (priceList.facades[facades] || 0) + ' €';

        // Ajouter publicité catalogue
        const publicite = document.querySelector('input[name="publicite_catalogue"]:checked')?.value || 'none';
        total += priceList.publicite[publicite] || 0;
        document.getElementById('pub-text').textContent = publicite !== 'none' ?
            priceList.publiciteLabels[publicite] + ' - ' + priceList.publicite[publicite] + ' €' :
            'Non sélectionnée';

        // Ajouter produits supplémentaires
        let productsTotal = 0;
        selectedProducts.forEach(product => {
            productsTotal += product.price * product.quantity;
        });
        total += productsTotal;
        document.getElementById('products-count').textContent = selectedProducts.length + ' produit(s) - ' + productsTotal + ' €';

        // Mettre à jour le total global
        document.getElementById('grand-total').textContent = total + ' €';
        document.getElementById('total_amount_input').value = total;

        // Mise à jour du récapitulatif
        document.getElementById('stand-type-text').textContent = standType ? priceList.standTypeLabels[standType] : 'Non sélectionné';
        document.getElementById('surface-text').textContent = surface ? surface + ' m²' : 'Non sélectionnée';

        totalAmount = total;
    }

    // Fonction pour ajouter un produit à la sélection
    function addProduct(productData) {
        // Vérifier si le produit est déjà dans la sélection
        const existingProductIndex = selectedProducts.findIndex(p => p.name === productData.name);

        if (existingProductIndex !== -1) {
            // Incrémenter la quantité
            selectedProducts[existingProductIndex].quantity += 1;
        } else {
            // Ajouter le nouveau produit
            selectedProducts.push({
                ...productData,
                quantity: 1
            });
        }

        // Mettre à jour l'affichage
        updateProductsList();
        updateTotalPrice();

        // Mettre à jour le champ caché avec les produits sélectionnés
        document.getElementById('selected_products_input').value = JSON.stringify(selectedProducts);
    }

    // Fonction pour supprimer un produit de la sélection
    function removeProduct(index) {
        selectedProducts.splice(index, 1);
        updateProductsList();
        updateTotalPrice();
        document.getElementById('selected_products_input').value = JSON.stringify(selectedProducts);
    }

    // Fonction pour mettre à jour la quantité d'un produit
    function updateProductQuantity(index, quantity) {
        if (quantity < 1) {
            removeProduct(index);
            return;
        }

        selectedProducts[index].quantity = quantity;
        updateProductsList();
        updateTotalPrice();
        document.getElementById('selected_products_input').value = JSON.stringify(selectedProducts);
    }

    // Fonction pour mettre à jour l'affichage de la liste des produits
    function updateProductsList() {
        const productsList = document.getElementById('selected-products-list');
        const productsSummary = document.getElementById('selected-products-summary');

        if (selectedProducts.length === 0) {
            productsList.innerHTML = `
            <div class="text-center text-muted py-4">
                <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                <p>Aucun produit sélectionné</p>
            </div>
        `;
            productsSummary.innerHTML = '';
            return;
        }

        let productsHTML = '<div class="selected-products">';
        let summaryHTML = '<ul class="list-group">';

        selectedProducts.forEach((product, index) => {
            const totalPrice = product.price * product.quantity;

            productsHTML += `
    <div class="product-item d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
        <div class="product-info flex-grow-1">
            <h6 class="mb-1 fw-bold">${product.name}</h6>
            <p class="text-muted small mb-0">${product.details}</p>
        </div>
        <div class="product-price text-secondary mx-3">
            <small>Prix unitaire</small>
            <div class="fw-bold">${product.price.toFixed(2)} €</div>
        </div>
        <div class="product-total text-primary mx-3">
            <small>Total</small>
            <div class="fw-bold">${totalPrice.toFixed(2)} €</div>
        </div>
        <div class="product-actions ms-2">
            <button type="button" class="btn btn-outline-danger btn-sm rounded-circle" onclick="removeProduct(${index})">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>
`;
            summaryHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                ${product.name} x ${product.quantity}
                <span class="badge bg-primary rounded-pill">${totalPrice.toFixed(2)} €</span>
            </li>
        `;
        });

        productsHTML += '</div>';
        summaryHTML += '</ul>';

        productsList.innerHTML = productsHTML;
        productsSummary.innerHTML = summaryHTML;
    }

    // ------- INITIALISATION ET ÉVÉNEMENTS -------
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation du récapitulatif
        updateTotalPrice();

        // Événement lors du changement de type de stand
        document.getElementById('stand_type').addEventListener('change', function() {
            const surfaceContainer = document.getElementById('surfaceSelectContainer');
            const electricityContainer = document.getElementById('electricityContainer');

            if (this.value) {
                surfaceContainer.style.display = 'block';
                electricityContainer.style.display = 'block';
            } else {
                surfaceContainer.style.display = 'none';
                electricityContainer.style.display = 'none';
                document.getElementById('surfaceSelect').value = '';
                document.getElementById('electricity').value = '';
            }

            updateTotalPrice();
        });

        // Événement lors du changement de superficie
        document.getElementById('surfaceSelect').addEventListener('change', function() {
            const electricitySelect = document.getElementById('electricity');

            if (this.value) {
                electricitySelect.value = this.value;
            } else {
                electricitySelect.value = '';
            }

            updateTotalPrice();
        });

        // Événement lors du changement de façades
        document.getElementById('facades').addEventListener('change', updateTotalPrice);

        // Événement lors du changement de publicité
        document.querySelectorAll('input[name="publicite_catalogue"]').forEach(radio => {
            radio.addEventListener('change', updateTotalPrice);
        });

        // Événement pour le choix de catégorie de produit
        document.getElementById('category-select').addEventListener('change', function() {
            const productSelect = document.getElementById('product-select');
            productSelect.innerHTML = '<option value="">-- Sélectionner un produit --</option>';

            if (!this.value) {
                productSelect.disabled = true;
                return;
            }

            const products = productCatalog[this.value] || [];

            products.forEach(product => {
                const option = document.createElement('option');
                option.value = product.name;
                option.textContent = `${product.name} - ${product.price.toFixed(2)} €`;
                option.dataset.product = JSON.stringify(product);
                productSelect.appendChild(option);
            });

            productSelect.disabled = false;
        });

        // Événement pour l'ajout d'un produit
        document.getElementById('product-select').addEventListener('change', function() {
            if (!this.value) return;

            const selectedOption = this.options[this.selectedIndex];
            const productData = JSON.parse(selectedOption.dataset.product);

            addProduct(productData);

            // Réinitialiser la sélection
            this.value = '';
        });

        // Événement pour le nombre de badges personnalisé
        document.getElementById('badges_select').addEventListener('change', function() {
            const customBadgesContainer = document.getElementById('custom_badges_container');
            const badgesCountInput = document.getElementById('badges_count');

            if (this.value === 'autre') {
                customBadgesContainer.style.display = 'block';
                badgesCountInput.required = true;
            } else {
                customBadgesContainer.style.display = 'none';
                badgesCountInput.required = false;
                badgesCountInput.value = '';
            }
        });

        // Validation du formulaire
        document.getElementById('registration-form').addEventListener('submit', function(event) {
            // Si vous souhaitez ajouter une validation personnalisée
            // Décommenter pour empêcher l'envoi du formulaire pendant les tests
            // event.preventDefault();
            // console.log('Formulaire soumis', {
            //     totalAmount: totalAmount,
            //     selectedProducts: selectedProducts
            // });
        });
    });
</script>