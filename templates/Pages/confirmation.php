


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




<!-- Main Form -->
<main style="margin-top:100px" class="container mb-3">
<div class="container">
        <div class="confirmation-card">
            <div style="margin-bottom:50px"  class="card-header">
                <h2 class="m-0"><i class="fas fa-check-circle me-2"></i> Confirmation</h2>
            </div>
            <div class="card-body">

                <h3 class="mb-3">Demande Envoyée avec Succès!</h3>
                <p class="lead mb-4">Votre demande pour SIPA 2025 a bien été reçue. Un email de confirmation vous a été envoyé.</p>

                <a href="/" class="btn btn-outline-primary btn-home mt-4">
                    <i class="fas fa-home me-2"></i>Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</main>


