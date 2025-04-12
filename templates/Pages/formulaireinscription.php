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



    /* Footer styles */
</style>
 <!-- Hero Section -->
 <section class="hero-sectione" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Formulaire de Participation</h1>
        <p class="lead">SIPA 2025 - Salon international de la Pêche et de l'Aquaculture</p>
    </div>
</section>

  <!-- Main Form -->
  <main class="container mb-3">
    <div class="form-container" data-aos="fade-up">
      <form method="POST" >
        <!-- Informations sur l'entreprise -->
        <h4 data-aos="fade-right" class="mb-5">Informations sur l'entreprise</h4>
        <div class="row g-4" data-aos="fade-up">
          <div class="col-md-6 floating-label">
            <label for="company_name">Raison Sociale</label>
            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Votre raison sociale" required>
           
          </div>
          
          <div class="col-md-6 floating-label">
            <label for="activity_sector">Secteur d'activité</label>
            <input type="text" class="form-control" id="activity_sector" name="activity_sector" placeholder="Ex: Technologie, Santé, Finance..." required>
            
          </div>
      
          <div class="col-md-6 floating-label mb-3">
            <label for="registry_number">Registre de commerce Nº</label>
            <input type="text" class="form-control" id="registry_number" name="registry_number" placeholder="Numéro RC" required>
           
          </div>
          
          <div class="col-md-6 floating-label mb-3">
            <label for="tax_id">Nº Identifiant fiscal</label>
            <input type="text" class="form-control" id="tax_id" name="tax_id" placeholder="Identifiant fiscal" required>
          
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
            <label for="fax">Fax</label>
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
            <label for="website">Site Web</label>
            <input type="text" class="form-control" id="website" name="website" placeholder="www.exemple.com">
            
          </div>
        </div>
      
        <!-- Réservation de Stand -->
        <h4 data-aos="fade-right" class="mt-5">Réservation de Stand</h4>
        <div data-aos="fade-up">
          <div class="floating-label mb-4">
            <select class="form-select" id="stand_type" name="stand_type" required>
              <option value=""></option>
              <option value="amenage">Stand aménagé - 250 €/m²</option>
              <option value="non_amenage">Stand non aménagé - 200 €/m²</option>
              <option value="decouvert">Emplacement découvert - 150 €/m²</option>
            </select>
            <label for="stand_type">Type de Stand</label>
          </div>
      
          <div class="row g-4">
            <div class="col-md-6 floating-label">
              <input type="number" class="form-control" id="area" name="area" placeholder="Surface en m²" required>
              <label for="area">Superficie demandée (m²)</label>
            </div>
      
            <div class="col-md-6 floating-label">
              <select class="form-select" id="facades" name="facades" required>
                <option value=""></option>
                <option value="0">Sans</option>
                <option value="2">2 façades - 250 €</option>
                <option value="3">3 façades - 350 €</option>
                <option value="4">4 façades - 400 €</option>
              </select>
              <label for="facades">Façades supplémentaires</label>
            </div>
          </div>
        </div>
      
        <!-- Publicité sur le Catalogue -->
        <h4 data-aos="fade-right" class="mt-5">Publicité sur le Catalogue</h4>
        <div data-aos="fade-up">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="pub1" name="pub1" value="1">
            <label class="form-check-label" for="pub1">
              4ème page de couverture
              <span class="price-tag">2000 €</span>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="pub2" name="pub2" value="1">
            <label class="form-check-label" for="pub2">
              3ème page de couverture
              <span class="price-tag">1600 €</span>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="pub3" name="pub3" value="1">
            <label class="form-check-label" for="pub3">
              2ème page de couverture
              <span class="price-tag">1500 €</span>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="pub4" name="pub4" value="1">
            <label class="form-check-label" for="pub4">
              1/2 page intérieure couleur
              <span class="price-tag">400 €</span>
            </label>
          </div>
        </div>
      
        <h4 data-aos="fade-right" class="mt-5">Signalétique du Stand</h4>
        <div data-aos="fade-up">
          <div class="floating-label">
            <input type="text" class="form-control" id="stand_name" name="stand_name" placeholder="Nom sur l'enseigne" maxlength="20" required>
            <label for="stand_name">Nom sur l'enseigne (max 20 caractères)</label>
          </div>
        </div>
      
        <h4 data-aos="fade-right" class="mt-5">Confirmation</h4>
        <div class="row g-4" data-aos="fade-up">
          <div class="col-md-6 floating-label">
            <input type="text" class="form-control" id="company_name_confirmation" name="company_name_confirmation" placeholder="Nom de la société" required>
            <label for="company_name_confirmation">Nom de la société</label>
          </div>
          
          <div class="col-md-6 floating-label">
            <input type="number" class="form-control" id="badges_count" name="badges_count" placeholder="Nombre de badges" required>
            <label for="badges_count">Nombre de badges exposants</label>
          </div>
          
          <div class="col-md-6 floating-label">
            <input type="text" class="form-control" id="location" name="location" placeholder="Lieu de l'événement" required>
            <label for="location">Lieu</label>
          </div>
          
          <div class="col-md-6 floating-label">
            <input type="date" class="form-control" id="date" name="date" placeholder="JJ/MM/AAAA" required>
            <label for="date">Date</label>
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
