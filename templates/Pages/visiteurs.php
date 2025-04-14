<!-- Hero Section -->
<section class="hero-sectione" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Formulaire de visiteurs</h1>
        <p class="lead">SIPA 2025 - Salon international de la Pêche et de l'Aquaculture</p>
    </div>
</section>

<!-- Main Form -->
<main class="container mb-3">
    <div class="form-container" data-aos="fade-up">
        <form method="POST" action="/emails/visitor">
        <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getAttribute('csrfToken'); ?>">
            <!-- Informations sur le visiteur -->
            <h4 data-aos="fade-right" class="mb-4">Informations sur le visiteur</h4>
            <div class="row g-4" data-aos="fade-up">
                <div class="col-md-6 floating-label">
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                    <label for="company_name">Raison Sociale</label>
                </div>
                <div class="col-md-6 floating-label">
                    <select class="form-select" id="activity_sector" name="activity_sector" required onchange="toggleOtherSector(this)">
                        <option value="" disabled selected>Sélectionnez un secteur d'activité</option>
                        <option value="Pêche">Pêche</option>
                        <option value="Aquaculture">Aquaculture</option>
                        <option value="Équipements">Équipements</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <label for="activity_sector">Secteur d'activité</label>
                    <input type="text" class="form-control mt-2" id="other_activity_sector" name="other_activity_sector" style="display: none;" placeholder="Précisez le secteur">
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
                    <input type="tel" class="form-control" id="phone" name="phone" required>
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

            <div class="text-center mt-5" data-aos="zoom-in">
                <button type="submit" class="btn btn-outline-primary btn-lg px-5 py-3">
                    <i class="fas fa-paper-plane me-2"></i>Soumettre
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    /**
     * Toggle visibility of "Autre" input field for activity sector
     */
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