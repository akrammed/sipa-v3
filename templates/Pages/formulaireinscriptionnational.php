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

<section class="hero-sectione" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Formulaire de Participation</h1>
        <p class="lead">SIPA 2025 - Salon international de la Pêche et de l'Aquaculture</p>
    </div>
</section>

<!-- Main Form -->
<main class="container mb-5">
    <div class="form-container" data-aos="fade-up">
        <form method="POST" action="/emails/services">
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
                    <select class="form-control" id="activity_sector" name="activity_sector" required onchange="toggleOtherSector(this)">
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

            <h4 data-aos="fade-right" class="mt-5">Réservation de Stand</h4>



            <div class="row g-4 mb-3">
            <div class="row g-4 mb-3">
    <div class="form-group">
        <label for="stand_type"><strong>Type de Stand</strong></label>
        <select class="form-select" id="stand_type" name="standType" required>
            <option value="">-- Sélectionner un type de stand --</option>
            <option value="17000">Stand aménagé (17.000 DA/m²)</option>
            <option value="12000">Stand non aménagé (12.000 DA/m²)</option>
            <option value="10000">Emplacement découvert (10.000 DA/m²)</option>
        </select>
    </div>

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

    <div id="totalPrice" style="margin-top:10px;font-weight:bold;"></div>

    <!-- Electricité par jour -->
    <div class="floating-label mb-4">
        <select class="form-select" id="electricity" name="electricity" required>
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
        <label for="electricity">Électricité (par jour)</label>
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
</div>

<script>
    // Updated script to work with dropdown instead of radio buttons
    const standTypeSelect = document.getElementById('stand_type');
    const surfaceSelectContainer = document.getElementById("surfaceSelectContainer");
    const surfaceSelect = document.getElementById("surfaceSelect");
    const electricitySelect = document.getElementById("electricity");
    const totalPriceDiv = document.getElementById("totalPrice");

    let selectedPrice = 0;

    // Add event listener to the stand type dropdown
    standTypeSelect.addEventListener("change", function() {
        selectedPrice = parseInt(this.value);
        if (selectedPrice) {
            surfaceSelectContainer.style.display = "block";
            totalPriceDiv.innerHTML = ""; // Reset total
            
            // If surface is already selected, recalculate the price
            const selectedSurface = parseInt(surfaceSelect.value);
            if (selectedSurface) {
                calculateTotal(selectedSurface, selectedPrice);
            }
        } else {
            surfaceSelectContainer.style.display = "none";
            totalPriceDiv.innerHTML = "";
        }
    });

    surfaceSelect.addEventListener("change", function() {
        const surface = parseInt(this.value);
        if (surface && selectedPrice) {
            calculateTotal(surface, selectedPrice);
        } else {
            totalPriceDiv.innerHTML = "";
        }
    });

    function calculateTotal(surface, price) {
        const total = surface * price;
        totalPriceDiv.innerHTML = `💰 Prix total : <strong>${total.toLocaleString()} DA</strong>`;

        // Sélectionner automatiquement l'option d'électricité correspondante
        for (let i = 0; i < electricitySelect.options.length; i++) {
            if (electricitySelect.options[i].value == surface.toString()) {
                electricitySelect.selectedIndex = i;
                break;
            }
        }
    }
</script>
            <!-- Checkbox Électricité Obligatoire -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="electricity_required" name="electricity_required" value="1" checked disabled>
                <label class="form-check-label" for="electricity_required">
                    Électricité obligatoire (20,000 DA)
                    <span class="price-tag">20,000 DA</span>
                </label>
            </div>

    </div>
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
                <span class="price-tag">30.000 DA</span>
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
        // Product catalog data organized by categories
        const productCatalog = {
            chairs: [
                { name: "Chaise EVEREST B", price: 2500.00, details: "" },
                { name: "Chaise SCANDINAVE B", price: 4200.00, details: "" },
                { name: "Chaise RÉUNION N", price: 2500.00, details: "" },
                { name: "Chaise OR rouge et beige", price: 2000.00, details: "" },
                { name: "Chaise PATCHWORK gris", price: 8000.00, details: "" },
                { name: "Chaise ALINEA B", price: 6500.00, details: "" },
                { name: "Chaise haute SIMILI, noire", price: 5500.00, details: "" },
                { name: "Chaise haute CONFORT, n b r", price: 7000.00, details: "" }
            ],
            tables: [
                { name: "Table RONDE blanche", price: 5000.00, details: "80 cm de diamètre. 70 cm de hauteur." },
                { name: "Table ATELIER", price: 10500.00, details: "Dimension 140 cm x 65 cm. 70 cm de hauteur grise" },
                { name: "Table SCANDINAVE RONDE en verre", price: 7000.00, details: "Dimension 80 cm de diamètre 75 cm de hauteur blanche" },
                { name: "Table SCANDINAVE CARÉE en verre", price: 8500.00, details: "Dimension 85 cm x 85 cm 75 cm de hauteur" },
                { name: "Table haute SCANDINAVE", price: 8000.00, details: "Dimension 60 cm de diamètre 100 cm de hauteur" },
                { name: "Table haute CLASSIC noir", price: 8500.00, details: "60cm diamètre" },
                { name: "Table basse TRIPODE blanche", price: 8500.00, details: "Dimension 60 cm de diamètre 60 cm de hauteur" },
                { name: "Grande table SIMPLY", price: 14000.00, details: "Dimension 120 cm x 70 cm blanche" },
                { name: "Grande table ROUNDED blanche", price: 14000.00, details: "Dimension 120 cm x 90 cm" },
                { name: "Table basse STANDARD noire et blanc", price: 5500.00, details: "" }
            ],
            sofas: [
                { name: "Salon Standard noire 1 place", price: 7000.00, details: "" },
                { name: "Salon Standard noire 4 places + Table basse", price: 25000.00, details: "" },
                { name: "Salon Haute Qualité 4 places + Table basse rouge", price: 60000.00, details: "" },
                { name: "Salon VIP 4 places + Table basse bleu gris et beige", price: 50000.00, details: "" },
                { name: "Desk STANDARD", price: 10500.00, details: "Dimension 80 x 35 x 90 cm blanche" },
                { name: "Desk STANDARD Avec Habillage", price: 14000.00, details: "80 x 35 x 90 cm blanche" }
            ],
            electronics: [
                { name: "REFRIGERATEUR 90L", price: 10500.00, details: "" },
                { name: "Machine à café - capsules", price: 16000.00, details: "" },
                { name: "ECRAN TV LED 32\"", price: 5000.00, details: "" },
                { name: "ECRAN TV LED 43\"", price: 6000.00, details: "" },
                { name: "ECRAN TV LED 50\"", price: 9000.00, details: "" },
                { name: "ECRAN TV LED 55\"", price: 12000.00, details: "" },
                { name: "ECRAN TV LED 65\"", price: 25000.00, details: "" },
                { name: "Support TV sur pieds", price: 6000.00, details: "" },
                { name: "VITRINE Réf. MB26-CO", price: 17000.00, details: "" },
                { name: "VITRINE Réf. MB26-UN", price: 17000.00, details: "" },
                { name: "VITRINE Réf. MB26-BI", price: 21000.00, details: "" },
                { name: "PORTE DOCUMENTS A4 Réf. MB27-P", price: 8000.00, details: "" },
                { name: "PORTE DOCUMENTS A4 Réf. MB27-PM", price: 6500.00, details: "" },
                { name: "PORTE DOCUMENTS A4 Réf. MB27-M", price: 16000.00, details: "" },
                { name: "PLANTES ARTIFICIELLES", price: 5500.00, details: "" },
                { name: "MOQUETTE", price: 1700.00, details: "" },
                { name: "Porte en ALUMINIUM pour réserve", price: 16000.00, details: "" },
                { name: "GUIDE LINE", price: 5000.00, details: "" },
                { name: "STRUCTURE STRUSS", price: 2500.00, details: "" },
                { name: "PUPITRE", price: 16000.00, details: "" },
                { name: "ÉTAGÈRE métallique", price: 6000.00, details: "" },
                { name: "CORBEILLE en plastique", price: 800.00, details: "" },
                { name: "CORBEILLE métalique", price: 1600.00, details: "" },
                { name: "Réglette avec 3 spots électriques", price: 3200.00, details: "" },
                { name: "MULTIPRISES", price: 800.00, details: "" }
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
                    option.textContent = `${product.name} - ${product.price.toLocaleString()} DA`;
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
                <input class="form-check-input" type="checkbox" id="${productId}" name="${productId}" value="1" checked>
                <label class="form-check-label" for="${productId}">
                    ${product.name}
                    <span class="price-tag">${product.price.toLocaleString()} DA</span>
                </label>
                ${product.details ? `<small class="form-text text-muted d-block">${product.details}</small>` : ''}
            `;
            
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
            <input type="number" class="form-control" id="badges_count" name="badges_count" min="1" required>
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
                        badgesCountInput.value = '';
                    }
                });
            });
        </script>
        <div class="col-md-6 floating-label">
            <select class="form-select" id="macarons" name="macarons" required>
                <option value="1">2 badge = 1 macaron</option>
                <option value="2">4 badges = 2 macarons</option>
                <option value="3">6 badges = 3 macarons</option>
                <option value="3">10 badges = 3 macarons</option>
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