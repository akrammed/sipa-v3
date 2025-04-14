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
    .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .btn-outline-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }
</style>

<!-- Hero Section -->
<section class="hero-sectione" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Demande de Visa</h1>
        <p class="lead">Besoin d’un visa pour participer ? Remplissez votre demande dès maintenant en ligne.</p>
    </div>
</section>

<!-- Main Form -->
<main class="container mb-3">
    <div class="form-container" data-aos="fade-up">

    <?= $this->Form->create(null, [
            'url' => ['controller' => 'Emails', 'action' => 'visa'],
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'id' => 'reservation-form'
        ]); ?>
        <?= $this->Form->control('_csrfToken', [
            'type' => 'hidden',
            'value' => $this->request->getAttribute('csrfToken')
        ]); ?>
    
    
    <form method="POST" action="/emails/visa" enctype="multipart/form-data">
        
    <!-- CSRF Token (REQUIRED) -->
    <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getAttribute('csrfToken'); ?>">
            <!-- SECTION 1: Visitor Professional Information -->
            <h4 data-aos="fade-right" class="mb-5">Informations Professionnelles du Visiteur</h4>
            <div class="row g-4" data-aos="fade-up">
                <div class="col-md-6 floating-label">
                    <label for="company_name">Nom de l'entreprise</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Nom de l'entreprise" required>
                </div>
                <div class="col-md-6 floating-label">
                    <label for="activity_sector">Secteur d'activité</label>
                    <input type="text" class="form-control" id="activity_sector" name="activity_sector" placeholder="Ex: Technologie, Santé, Finance..." required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="registry_number">Registre de commerce Nº (Optionnel)</label>
                    <input type="text" class="form-control" id="registry_number" name="registry_number" placeholder="Numéro RC">
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="tax_id">Nº Identifiant fiscal (Optionnel)</label>
                    <input type="text" class="form-control" id="tax_id" name="tax_id" placeholder="Identifiant fiscal">
                </div>
                <div class="col-md-12 floating-label mb-3">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Adresse complète" required>
                </div>
                <div class="col-md-4 floating-label mb-3">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ville" required>
                </div>
                <div class="col-md-4 floating-label mb-3">
                    <label for="country">Pays</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Pays" required>
                </div>
                <div class="col-md-4 floating-label mb-3">
                    <label for="contact_person">Personne à contacter</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Nom et prénom" required>
                </div>
                <div class="col-md-4 floating-label mb-3">
                    <label for="phone">Tél.</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Ex: +33 1 23 45 67 89" required>
                </div>
                <div class="col-md-4 floating-label mb-3">
                    <label for="fax">Fax (Optionnel)</label>
                    <input type="text" class="form-control" id="fax" name="fax" placeholder="Ex: +33 1 23 45 67 90">
                </div>
                <div class="col-md-4 floating-label mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Ex: +33 6 12 34 56 78" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@domaine.com" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="website">Site Web (Optionnel)</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="www.exemple.com">
                </div>
            </div>

            <!-- SECTION 2: Visa Application Details -->
            <h4 data-aos="fade-right" class="mt-5 mb-5">Détails de la Demande de Visa</h4>
            <div class="row g-4" data-aos="fade-up">
                <div class="col-md-6 floating-label mb-3">
                    <label for="passport_number">Numéro de passeport</label>
                    <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="Numéro de passeport" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="issue_date">Date d'émission</label>
                    <input type="date" class="form-control" id="issue_date" name="issue_date" placeholder="JJ/MM/AAAA" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="expiry_date">Date d'expiration</label>
                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="JJ/MM/AAAA" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="authority">Autorité émettrice</label>
                    <input type="text" class="form-control" id="authority" name="authority" placeholder="Autorité émettrice" required>
                </div>
                <div class="col-md-12 floating-label mb-3">
                    <label for="passport_scan">Upload Scan Passeport</label>
                    <input type="file" class="form-control" id="passport_scan" name="passport_scan" accept="image/*, application/pdf" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="purpose_of_visit">Objet de la visite</label>
                    <select class="form-select" id="purpose_of_visit" name="purpose_of_visit" required>
                        <option value=""></option>
                        <option value="business">Affaires professionnelles</option>
                        <option value="conference">Conférence / Salon</option>
                        <option value="training">Formation</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="job_title">Poste occupé</label>
                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Poste occupé" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="arrival_date">Date d'arrivée prévue</label>
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date" placeholder="JJ/MM/AAAA" required>
                </div>
                <div class="col-md-6 floating-label mb-3">
                    <label for="departure_date">Date de départ prévue</label>
                    <input type="date" class="form-control" id="departure_date" name="departure_date" placeholder="JJ/MM/AAAA" required>
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