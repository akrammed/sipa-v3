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
    <form method="POST" action="/emails/participation">
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

            <div class="row g-4 mb-3">
                <div class="col-md-6 floating-label">
                    <input type="number" class="form-control" id="area" name="area" min="12" required>
                    <label for="area">Superficie demandée (m²)</label>
                </div>
                <div class="col-md-6 floating-label">
                    <select class="form-select" id="facades" name="facades" required>
                        <option value="0">Sans supplément</option>
                        <option value="1">1 façade sans supplément</option>
                        <option value="2">2 façades - Nouveau Prix</option>
                        <option value="3">3 façades - Nouveau Prix</option>
                        <option value="4">4 façades - Nouveau Prix</option>
                    </select>
                    <label for="facades">Façades supplémentaires</label>
                </div>
            </div>

            <!-- Checkbox Électricité Obligatoire -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="electricity_required" name="electricity_required" value="1" required>
                <label class="form-check-label" for="electricity_required">
                    Électricité obligatoire (20,000 DA)
                    <span class="price-tag">20,000 DA</span>
                </label>
            </div>
        </div>

        <h4 data-aos="fade-right" class="mt-5 mb-4">Publicité sur le Catalogue</h4>
        <div data-aos="fade-up" class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pub1" name="pub1" value="1">
                <label class="form-check-label" for="pub1">
                    4ème page de couverture
                    <span class="price-tag">110.000 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pub2" name="pub2" value="1">
                <label class="form-check-label" for="pub2">
                    3ème page de couverture
                    <span class="price-tag">85.000 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pub3" name="pub3" value="1">
                <label class="form-check-label" for="pub3">
                    2ème page de couverture
                    <span class="price-tag">80.000 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pub4" name="pub4" value="1">
                <label class="form-check-label" for="pub4">
                    1/2 page intérieure couleur
                    <span class="price-tag">30.000 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pub5" name="pub5" value="1">
                <label class="form-check-label" for="pub5">
                    Présentation vidéo de votre entreprise
                    <span class="price-tag">50.000 DA</span>
                </label>
            </div>
        </div>

        <!-- Services supplémentaires -->
        <h4 data-aos="fade-right" class="mt-5 mb-4">Services supplémentaires</h4>
        <div data-aos="fade-up" class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="service1" name="service1" value="1">
                <label class="form-check-label" for="service1">
                    Table supplémentaire
                    <span class="price-tag">4.200 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="service2" name="service2" value="1">
                <label class="form-check-label" for="service2">
                    Chaise supplémentaire
                    <span class="price-tag">1.800 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="service3" name="service3" value="1">
                <label class="form-check-label" for="service3">
                    Hôtesse d'accueil (par jour)
                    <span class="price-tag">4.200 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="service4" name="service4" value="1">
                <label class="form-check-label" for="service4">
                    Traducteur (par jour)
                    <span class="price-tag">12.000 DA</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="service5" name="service5" value="1">
                <label class="form-check-label" for="service5">
                    Comptoir d'accueil (par jour)
                    <span class="price-tag">5.000 DA</span>
                </label>
            </div>
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
                <input type="number" class="form-control" id="badges_count" name="badges_count" min="1" required>
                <label for="badges_count">Nombre de badges exposants</label>
            </div>
            <div class="col-md-6 floating-label">
                <select class="form-select" id="macarons" name="macarons" required>
                    <option value="1">1 badge = 1 macaron</option>
                    <option value="2">4 badges = 2 macarons</option>
                    <option value="3">6 badges = 3 macarons</option>
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