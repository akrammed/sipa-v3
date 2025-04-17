<style>
    /* Custom Styles */
    :root {
        --primary-color: #0d6efd;
        --secondary-color: #6c757d;
        --light-color: #f8f9fa;
        --dark-color: #212529;
    }

    .hero-sectione {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        padding: 80px 0;
        margin-bottom: 30px;
        color: white;
        border-radius: 0 0 10px 10px;
    }

    .form-container {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    h4 {
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 10px;
        font-weight: 600;
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
        font-size: 0.85rem;
        color: var(--secondary-color);
        transition: all 0.3s ease;
    }

    .floating-label .form-control,
    .floating-label .form-select {
        height: 50px;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .floating-label .form-control:focus,
    .floating-label .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .price-tag {
        background-color: #e9ecef;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.85rem;
        margin-left: 10px;
        color: var(--secondary-color);
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }

    .form-check {
        margin-bottom: 10px;
        padding-left: 2rem;
    }
</style>

<!-- Hero Section -->
<section class="hero-sectione" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Formulaire de Participation</h1>
        <p class="lead">SIPA 2025 - Salon international de la Pêche et de l'Aquaculture</p>
    </div>
</section>

<main class="container mb-3">
    <div class="form-container" data-aos="fade-up">
        <form method="POST" action="/emails/participation">

            <!-- CSRF Token (REQUIRED) -->
            <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getAttribute('csrfToken'); ?>">
            <!-- Informations sur l'entreprise -->
            <h4 data-aos="fade-right" class="mb-4">Informations sur l'entreprise</h4>
            <div class="row g-4" data-aos="fade-up">
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
                <script>
                    function toggleOtherSector(select) {
                        const otherInput = document.getElementById('other_activity_sector');
                        if (select.value === "Autre") {
                            otherInput.style.display = "block";
                            otherInput.required = true;
                        } else {
                            otherInput.style.display = "none";
                            otherInput.required = false;
                        }
                    }
                </script>
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
            <div class="form-group">
                <label for="stand_type">Type de Stand</label>
                <select class="form-select" id="stand_type" name="stand_type" required>
                    <option value=""></option>
                    <option value="amenage">Stand aménagé - 250 €/m²</option>
                    <option value="non_amenage">Stand non aménagé - 200 €/m²</option>
                    <option value="decouvert">Emplacement découvert - 150 €/m²</option>
                </select>
            </div>

            <!-- Surface Select -->
            <div id="surfaceSelectContainer" class="form-group" style="display:none;">
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

            <div id="totalPrice" style="margin-top:15px;font-weight:bold;"></div>

            <div style="margin-top:30px" class="floating-label mb-4">
                <select class="form-select" id="electricity" name="electricity" required>
                    <option value="">Électricité </option>
                    <option value="12">12 m² - 60 £</option>
                    <option value="15">15 m² - 75 £</option>
                    <option value="18">18 m² - 90 £</option>
                    <option value="21">21 m² - 105 £</option>
                    <option value="24">24 m² - 130 £</option>
                    <option value="27">27 m² - 145 £</option>
                    <option value="36">36 m² - 180 £</option>
                    <option value="48">48 m² - 240 £</option>
                    <option value="54">54 m² - 270 £</option>
                    <option value="60">60 m² - 300 £</option>
                </select>
                <label for="electricity">Électricité (par jour)</label>
            </div>

            <!-- Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const standTypeSelect = document.getElementById('stand_type');
                    const surfaceContainer = document.getElementById('surfaceSelectContainer');
                    const surfaceSelect = document.getElementById('surfaceSelect');
                    const electricitySelect = document.getElementById('electricity');
                    const totalPriceDiv = document.getElementById('totalPrice');

                    let selectedPrice = 0;

                    // Map stand type values to their prices
                    const standTypePrices = {
                        'amenage': 250,
                        'non_amenage': 200,
                        'decouvert': 150
                    };

                    // Afficher la surface quand le type de stand est sélectionné
                    standTypeSelect.addEventListener('change', function() {
                        const selectedValue = this.value;
                        selectedPrice = standTypePrices[selectedValue];

                        if (selectedValue) {
                            surfaceContainer.style.display = 'block';
                        } else {
                            surfaceContainer.style.display = 'none';
                            totalPriceDiv.innerHTML = '';
                        }

                        // Recalculer le prix si une surface est déjà sélectionnée
                        if (surfaceSelect.value) {
                            calculateTotal();
                        }
                    });

                    // Gestion de la sélection de surface
                    surfaceSelect.addEventListener('change', function() {
                        const surface = parseInt(this.value);

                        // Sélectionner automatiquement l'option d'électricité correspondante
                        if (surface) {
                            for (let i = 0; i < electricitySelect.options.length; i++) {
                                if (electricitySelect.options[i].value == surface.toString()) {
                                    electricitySelect.selectedIndex = i;
                                    break;
                                }
                            }

                            // Calculer et afficher le prix total
                            calculateTotal();
                        } else {
                            totalPriceDiv.innerHTML = '';
                        }
                    });

                    // Fonction pour calculer le prix total
                    function calculateTotal() {
                        const surface = parseInt(surfaceSelect.value);

                        if (surface && selectedPrice) {
                            const total = surface * selectedPrice;
                            totalPriceDiv.innerHTML = `💰 Prix total : <strong>${total.toLocaleString()} €</strong>`;
                        }
                    }
                });
            </script>
            <div class="row g-4">
                <div class="col-md-6 floating-label">
                    <select class="form-select" id="facades" name="facades" required>
                        <option value="0">Sans</option>
                        <option value="2">2 façades - 250 €</option>
                        <option value="3">3 façades - 350 €</option>
                        <option value="4">4 façades - 400 €</option>
                    </select>
                    <label for="facades">Façades supplémentaires</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="electricity_required" name="electricity_required" value="1" checked disabled>
                    <label class="form-check-label" for="electricity_required">
                        Électricité obligatoire
                        <span class="price-tag">180 £</span>
                    </label>
                </div>
            </div>
    </div>

    <!-- Publicité sur le Catalogue -->
    <h4 data-aos="fade-right" class="mt-5">Publicité sur le Catalogue</h4>
    <div data-aos="fade-up">
        <div class="form-check">
            <input class="form-check-input" type="radio" id="pub1" name="publicite_catalogue" value="pub1" required>
            <label class="form-check-label" for="pub1">
                4ème page de couverture
                <span class="price-tag">2000 €</span>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="pub2" name="publicite_catalogue" value="pub2">
            <label class="form-check-label" for="pub2">
                3ème page de couverture
                <span class="price-tag">1600 €</span>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="pub3" name="publicite_catalogue" value="pub3">
            <label class="form-check-label" for="pub3">
                2ème page de couverture
                <span class="price-tag">1500 €</span>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="pub4" name="publicite_catalogue" value="pub4">
            <label class="form-check-label" for="pub4">
                1/2 page intérieure couleur
                <span class="price-tag">400 €</span>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="pub_none" name="publicite_catalogue" value="none">
            <label class="form-check-label" for="pub_none">
                Aucune publicité
            </label>
        </div>
    </div>

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

        <script>
            // Product catalog data organized by categories with Euro prices
            const productCatalog = {
                chairs: [
                    { name: "Chaise EVEREST B", price: 25.00, details: "" },
                    { name: "Chaise SCANDINAVE B", price: 45.00, details: "" },
                    { name: "Chaise RÉUNION N", price: 25.00, details: "" },
                    { name: "Chaise OR rouge et beige", price: 20.00, details: "" },
                    { name: "Chaise PATCHWORK gris", price: 80.00, details: "" },
                    { name: "Chaise ALINEA B", price: 65.00, details: "" },
                    { name: "Chaise haute SIMILI, noire", price: 55.00, details: "" },
                    { name: "Chaise haute CONFORT, n b r", price: 70.00, details: "" }
                ],
                tables: [
                    { name: "Table RONDE blanche", price: 50.00, details: "80 cm de diamètre. 70 cm de hauteur." },
                    { name: "Table ATELIER", price: 105.00, details: "Dimension 140 cm x 65 cm. 70 cm de hauteur grise" },
                    { name: "Table SCANDINAVE RONDE en verre", price: 70.00, details: "Dimension 80 cm de diamètre 75 cm de hauteur blanche" },
                    { name: "Table SCANDINAVE CARÉE en verre", price: 85.00, details: "Dimension 85 cm x 85 cm 75 cm de hauteur" },
                    { name: "Table haute SCANDINAVE", price: 80.00, details: "Dimension 60 cm de diamètre 100 cm de hauteur" },
                    { name: "Table haute CLASSIC noir", price: 85.00, details: "60cm diamètre" },
                    { name: "Table basse TRIPODE blanche", price: 85.00, details: "Dimension 60 cm de diamètre 60 cm de hauteur" },
                    { name: "Grande table SIMPLY", price: 140.00, details: "Dimension 120 cm x 70 cm blanche" },
                    { name: "Grande table ROUNDED blanche", price: 140.00, details: "Dimension 120 cm x 90 cm" },
                    { name: "Table basse STANDARD noire et blanc", price: 55.00, details: "" }
                ],
                sofas: [
                    { name: "Salon Standard noire 1 place", price: 70.00, details: "" },
                    { name: "Salon Standard noire 4 places + Table basse", price: 250.00, details: "" },
                    { name: "Salon Haute Qualité 4 places + Table basse rouge", price: 600.00, details: "" },
                    { name: "Salon VIP 4 places + Table basse bleu gris et beige", price: 500.00, details: "" },
                    { name: "Desk STANDARD", price: 105.00, details: "Dimension 80 x 35 x 90 cm blanche" },
                    { name: "Desk STANDARD Avec Habillage", price: 140.00, details: "80 x 35 x 90 cm blanche" }
                ],
                electronics: [
                    { name: "REFRIGERATEUR 90L", price: 105.00, details: "" },
                    { name: "Machine à café - capsules", price: 160.00, details: "" },
                    { name: "ECRAN TV LED 32\"", price: 50.00, details: "" },
                    { name: "ECRAN TV LED 43\"", price: 60.00, details: "" },
                    { name: "ECRAN TV LED 50\"", price: 90.00, details: "" },
                    { name: "ECRAN TV LED 55\"", price: 120.00, details: "" },
                    { name: "ECRAN TV LED 65\"", price: 250.00, details: "" },
                    { name: "Support TV sur pieds", price: 60.00, details: "" },
                    { name: "VITRINE Réf. MB26-CO", price: 170.00, details: "" },
                    { name: "VITRINE Réf. MB26-UN", price: 170.00, details: "" },
                    { name: "VITRINE Réf. MB26-BI", price: 210.00, details: "" },
                    { name: "PORTE DOCUMENTS A4 Réf. MB27-P", price: 80.00, details: "" },
                    { name: "PORTE DOCUMENTS A4 Réf. MB27-PM", price: 65.00, details: "" },
                    { name: "PORTE DOCUMENTS A4 Réf. MB27-M", price: 160.00, details: "" },
                    { name: "PLANTES ARTIFICIELLES", price: 55.00, details: "" },
                    { name: "MOQUETTE", price: 20.00, details: "" },
                    { name: "Porte en ALUMINIUM pour réserve", price: 160.00, details: "" },
                    { name: "GUIDE LINE", price: 50.00, details: "" },
                    { name: "STRUCTURE STRUSS", price: 25.00, details: "" },
                    { name: "PUPITRE", price: 160.00, details: "" },
                    { name: "ÉTAGÈRE métallique", price: 60.00, details: "" },
                    { name: "CORBEILLE en plastique", price: 10.00, details: "" },
                    { name: "CORBEILLE métalique", price: 20.00, details: "" },
                    { name: "Réglette avec 3 spots électriques", price: 35.00, details: "" },
                    { name: "MULTIPRISES", price: 10.00, details: "" }
                ]
            };

            // Get the DOM elements
            const categorySelect = document.getElementById('category-select');
            const productSelect = document.getElementById('product-select');
            const selectedProductsList = document.getElementById('selected-products-list');

            // Add event listener for category selection
            categorySelect.addEventListener('change', function() {
                const selectedCategory = this.value;
                
                // Clear product dropdown
                productSelect.innerHTML = '';
                
                if (selectedCategory) {
                    // Enable product dropdown
                    productSelect.disabled = false;
                    
                    // Add default option
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = '-- Sélectionner un produit --';
                    productSelect.appendChild(defaultOption);
                    
                    // Add product options for the selected category
                    productCatalog[selectedCategory].forEach(product => {
                        const option = document.createElement('option');
                        option.value = JSON.stringify(product);
                        option.textContent = `${product.name} - ${product.price.toLocaleString()} €`;
                        productSelect.appendChild(option);
                    });
                } else {
                    // Disable product dropdown if no category is selected
                    productSelect.disabled = true;
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = '-- Sélectionner d\'abord une catégorie --';
                    productSelect.appendChild(defaultOption);
                }
            });

            // Add event listener for product selection
            productSelect.addEventListener('change', function() {
                const selectedProductValue = this.value;
                
                if (selectedProductValue) {
                    const product = JSON.parse(selectedProductValue);
                    addProductToSelection(product);
                    
                    // Reset product selection for another choice
                    this.value = '';
                }
            });

            // Function to add a product to the selection list
            function addProductToSelection(product) {
                // Create a unique ID for this product instance
                const productId = 'product_' + Date.now();
                
                // Create the checkbox div similar to your original format
                const checkboxDiv = document.createElement('div');
                checkboxDiv.className = 'form-check';
                checkboxDiv.innerHTML = `
                    <input class="form-check-input" type="checkbox" id="${productId}" name="product_selected[${productId}]" value="1" checked>
                    <label class="form-check-label" for="${productId}">
                        ${product.name}
                        <span class="price-tag">${product.price.toLocaleString()} €</span>
                    </label>
                    ${product.details ? `<small class="form-text text-muted d-block">${product.details}</small>` : ''}
                `;
                
                // Create a hidden input to store product info
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = `selected_products[${productId}]`;
                hiddenInput.value = JSON.stringify(product);
                checkboxDiv.appendChild(hiddenInput);
                
                // Add the checkbox to the selected products list
                selectedProductsList.appendChild(checkboxDiv);
                
                // Add event listener to remove the product when unchecked
                const checkbox = checkboxDiv.querySelector('input[type="checkbox"]');
                checkbox.addEventListener('change', function() {
                    if (!this.checked) {
                        checkboxDiv.remove();
                    }
                });
            }
        </script>
    </div>

    <!-- Signalétique du Stand -->
    <h4 data-aos="fade-right" class="mt-5">Signalétique du Stand</h4>
    <div data-aos="fade-up">
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const badgesSelect = document.getElementById('badges_select');
                const customBadgesContainer = document.getElementById('custom_badges_container');
                const badgesCountInput = document.getElementById('badges_count');

                badgesSelect.addEventListener('change', function() {
                    if (this.value === 'autre') {
                        customBadgesContainer.style.display = 'block';
                        badgesCountInput.required = true;
                    } else {
                        customBadgesContainer.style.display = 'none';
                        badgesCountInput.required = false;
                        // Set the badges_count to the selected value
                        badgesCountInput.value = this.value;
                    }
                });
                
                // Initialize badges_count with the value from badges_select
                if (badgesSelect.value && badgesSelect.value !== 'autre') {
                    badgesCountInput.value = badgesSelect.value;
                }
            });
        </script>
        <div class="col-md-6 floating-label">
            <select class="form-select" id="macarons" name="macarons" required>
                <option value="1">2 badges = 1 macaron</option>
                <option value="2">4 badges = 2 macarons</option>
                <option value="3">6 badges = 3 macarons</option>
                <option value="4">10 badges = 3 macarons</option>
            </select>
            <label for="macarons">Macarons</label>
        </div>
        <div class="col-md-12 floating-label">
            <textarea class="form-control" id="specific_request" name="specific_request" rows="3" placeholder="Demande spécifique"></textarea>
            <label for="specific_request">Demande spécifique</label>
        </div>
    </div>

    <div class="text-center mt-5" data-aos="zoom-in">
        <button type="submit" class="btn btn-outline-primary btn-lg px-5 py-3">
            <i class="fas fa-paper-plane me-2"></i>Soumettre
        </button>
    </div>
    </form>
    </div>
</main>