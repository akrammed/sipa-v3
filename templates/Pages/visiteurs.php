<!-- Hero Section --><style>
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
                <label for="company_name">Raison Sociale</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                    
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
                <label for="registry_number">Registre de commerce Nº</label>
                    <input type="text" class="form-control" id="registry_number" name="registry_number" required>
              
                </div>
                <div class="col-md-6 floating-label">
                <label for="tax_id">Nº Identifiant fiscal</label>
                    <input type="text" class="form-control" id="tax_id" name="tax_id" required>
                   
                </div>
                <div class="col-md-12 floating-label">
                <label for="address">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                    
                </div>
                <div class="col-md-4 floating-label">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                
                </div>
                <div class="col-md-4 floating-label">
                    <label for="country">Pays</label>
                    <input type="text" class="form-control" id="country" name="country" required>

                </div>
                <div class="col-md-4 floating-label">
                    <label for="contact_person">Personne à contacter</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person" required>

                </div>
                <div class="col-md-4 floating-label">
                    <label for="phone">Tél.</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>

                </div>
                <div class="col-md-4 floating-label">
                     <label for="fax">Fax</label>
                    <input type="text" class="form-control" id="fax" name="fax">

                </div>
                <div class="col-md-4 floating-label">
                    <label for="mobile">Mobile</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" required>

                </div>
                <div class="col-md-6 floating-label">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>

                </div>
                <div class="col-md-6 floating-label">
                    <label for="website">Site Web</label>
                    <input type="url" class="form-control" id="website" name="website">

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