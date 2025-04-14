<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Mailer;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class EmailsController extends AppController
{
    // Method for handling the main participation form
    public function participation()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Organization email
            $mailer = new Mailer('default');
            $mailer
                ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025 Formulaire'])
                ->setTo('organisation@sipa2025.com') // Change to the organization's email
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de participation - SIPA 2025')
                ->deliver($this->buildParticipationEmail($data));
            
            // Client email confirmation
            if (!empty($data['email'])) {
                $clientMailer = new Mailer('default');
                $clientMailer
                    ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de participation - SIPA 2025')
                    ->deliver($this->buildParticipationEmail($data, true));
            }
            
            $this->Flash->success('Votre demande a été envoyée avec succès.');
            return $this->redirect('/');
        }
    }

    public function visitor()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Organization email
            $mailer = new Mailer('default');
            $mailer
                ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025 Formulaire'])
                ->setTo('organisation@sipa2025.com') // Change to the organization's email
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de visiteur - SIPA 2025')
                ->deliver($this->buildVisitorEmail($data));

            // Visitor email confirmation
            if (!empty($data['email'])) {
                $visitorMailer = new Mailer('default');
                $visitorMailer
                    ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de visiteur - SIPA 2025')
                    ->deliver($this->buildVisitorEmail($data, true));
            }

            $this->Flash->success('Votre demande a été envoyée avec succès.');
            return $this->redirect('/');
        }
    }
    
    // Method for handling the additional services form
    public function services()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Organization emailgi
            $mailer = new Mailer('default');
            $mailer
                ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025 Formulaire'])
                ->setTo('organisation@sipa2025.com') // Change to the organization's email
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de services supplémentaires - SIPA 2025')
                ->deliver($this->buildServicesEmail($data));
            
            // Client email confirmation
            if (!empty($data['email'])) {
                $clientMailer = new Mailer('default');
                $clientMailer
                    ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de services - SIPA 2025')
                    ->deliver($this->buildServicesEmail($data, true));
            }
            
            $this->Flash->success('Votre demande a été envoyée avec succès.');
            return $this->redirect('/');
        }
    }
    
    // Method for handling visa application form
    public function visa()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Process file upload if present
            $passportFile = null;
            if (!empty($this->request->getData('passport_scan')) && 
                $this->request->getData('passport_scan')->getError() === UPLOAD_ERR_OK) {
                $passportFile = $this->request->getData('passport_scan');
                // You can save the file here if needed
            }
            
            // Organization email
            $mailer = new Mailer('default');
            $mailer
                ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025 Visa'])
                ->setTo('visa@sipa2025.com') // Change to the visa department's email
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de visa - SIPA 2025')
                ->deliver($this->buildVisaEmail($data));
                
            // Add attachment if passport scan was provided
            if ($passportFile) {
                $mailer->addAttachment($passportFile->getClientFilename(), [
                    'file' => $passportFile->getStream()->getMetadata('uri'),
                    'mimetype' => $passportFile->getClientMediaType()
                ]);
            }
            
            // Client email confirmation
            if (!empty($data['email'])) {
                $clientMailer = new Mailer('default');
                $clientMailer
                    ->setFrom(['noreply@sipa2025.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de visa - SIPA 2025')
                    ->deliver($this->buildVisaEmail($data, true));
            }
            
            $this->Flash->success('Votre demande de visa a été envoyée avec succès.');
            return $this->redirect('/');
        }
    }
    
    // Email content builder for participation form
    private function buildParticipationEmail(array $data, bool $isClient = false): string
    {
        $standType = [
            'amenage' => 'Stand aménagé - 250 €/m²',
            'non_amenage' => 'Stand non aménagé - 200 €/m²',
            'decouvert' => 'Emplacement découvert - 150 €/m²'
        ];
        
        $facadesValues = [
            '0' => 'Sans',
            '2' => '2 façades - 250 €',
            '3' => '3 façades - 350 €',
            '4' => '4 façades - 400 €'
        ];
        
        $clientIntro = $isClient ? 
            "<p>Merci pour votre inscription au Salon International de la Pêche et de l'Aquaculture (SIPA 2025). Voici un récapitulatif de votre demande :</p>" : 
            "<p>Une nouvelle demande de participation a été soumise avec les détails suivants :</p>";
        
        $emailContent = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; }
                    h2 { color: #0d6efd; border-bottom: 2px solid #0d6efd; padding-bottom: 10px; }
                    h3 { color: #0d6efd; margin-top: 25px; }
                    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                    th, td { text-align: left; padding: 10px; border-bottom: 1px solid #ddd; }
                    th { background-color: #f8f9fa; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>SIPA 2025 - Formulaire de Participation</h2>
                    {$clientIntro}
                    
                    <h3>Informations sur l'entreprise</h3>
                    <table>
                        <tr><th>Raison Sociale</th><td>" . ($data['company_name'] ?? '') . "</td></tr>
                        <tr><th>Secteur d'activité</th><td>" . ($data['activity_sector'] ?? '') . "</td></tr>
                        <tr><th>Registre de commerce</th><td>" . ($data['registry_number'] ?? '') . "</td></tr>
                        <tr><th>Identifiant fiscal</th><td>" . ($data['tax_id'] ?? '') . "</td></tr>
                        <tr><th>Adresse</th><td>" . ($data['address'] ?? '') . "</td></tr>
                        <tr><th>Ville</th><td>" . ($data['city'] ?? '') . "</td></tr>
                        <tr><th>Pays</th><td>" . ($data['country'] ?? '') . "</td></tr>
                        <tr><th>Personne à contacter</th><td>" . ($data['contact_person'] ?? '') . "</td></tr>
                        <tr><th>Téléphone</th><td>" . ($data['phone'] ?? '') . "</td></tr>
                        <tr><th>Fax</th><td>" . ($data['fax'] ?? '') . "</td></tr>
                        <tr><th>Mobile</th><td>" . ($data['mobile'] ?? '') . "</td></tr>
                        <tr><th>Email</th><td>" . ($data['email'] ?? '') . "</td></tr>
                        <tr><th>Site Web</th><td>" . ($data['website'] ?? '') . "</td></tr>
                    </table>
                    
                    <h3>Réservation de Stand</h3>
                    <table>
                        <tr>
                            <th>Type de Stand</th>
                            <td>" . (isset($data['stand_type']) && isset($standType[$data['stand_type']]) ? $standType[$data['stand_type']] : '') . "</td>
                        </tr>
                        <tr><th>Superficie demandée</th><td>" . ($data['area'] ?? '') . " m²</td></tr>
                        <tr>
                            <th>Façades supplémentaires</th>
                            <td>" . (isset($data['facades']) && isset($facadesValues[$data['facades']]) ? $facadesValues[$data['facades']] : '') . "</td>
                        </tr>
                        <tr>
                            <th>Électricité obligatoire</th>
                            <td>" . (!empty($data['electricity_required']) ? 'Oui - 20,000 DA' : 'Non') . "</td>
                        </tr>
                    </table>
                    
                    <h3>Publicité sur le Catalogue</h3>
                    <table>
                        <tr><th>Option</th><th>Sélectionné</th></tr>
                        <tr><td>4ème page de couverture (2000 €)</td><td>" . (!empty($data['pub1']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>3ème page de couverture (1600 €)</td><td>" . (!empty($data['pub2']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>2ème page de couverture (1500 €)</td><td>" . (!empty($data['pub3']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>1/2 page intérieure couleur (400 €)</td><td>" . (!empty($data['pub4']) ? 'Oui' : 'Non') . "</td></tr>
                    </table>
                    
                    <h3>Signalétique et Confirmation</h3>
                    <table>
                        <tr><th>Nom sur l'enseigne</th><td>" . ($data['stand_name'] ?? '') . "</td></tr>
                        <tr><th>Nom de la société (confirmation)</th><td>" . ($data['company_name_confirmation'] ?? '') . "</td></tr>
                        <tr><th>Nombre de badges exposants</th><td>" . ($data['badges_count'] ?? '') . "</td></tr>
                        <tr><th>Macarons</th><td>";
                        
        if (!empty($data['macarons'])) {
            switch ($data['macarons']) {
                case '1':
                    $emailContent .= "1 badge = 1 macaron";
                    break;
                case '2':
                    $emailContent .= "4 badges = 2 macarons";
                    break;
                case '3':
                    $emailContent .= "6 badges = 3 macarons";
                    break;
            }
        }
        
        $emailContent .= "</td></tr>
                        <tr><th>Demande spécifique</th><td>" . ($data['specific_request'] ?? '') . "</td></tr>
                    </table>
                    
                    <p>Pour toute question, n'hésitez pas à nous contacter à <a href='mailto:contact@sipa2025.com'>contact@sipa2025.com</a></p>
                </div>
            </body>
            </html>
        ";
        
        return $emailContent;
    }
    
    // Email content builder for services form
    private function buildServicesEmail(array $data, bool $isClient = false): string
    {
        $electricityOptions = [
            '12' => '12 m² - 720 DA',
            '15' => '15 m² - 900 DA',
            '18' => '18 m² - 1080 DA',
            '21' => '21 m² - 1260 DA',
            '24' => '24 m² - 1440 DA',
            '27' => '27 m² - 1620 DA',
            '36' => '36 m² - 2160 DA',
            '48' => '48 m² - 2890 DA',
            '54' => '54 m² - 3240 DA',
            '60' => '60 m² - 3600 DA'
        ];
        
        $facadesValues = [
            '0' => 'Sans supplément',
            '1' => '1 façade sans supplément',
            '2' => '2 façades - Nouveau Prix',
            '3' => '3 façades - Nouveau Prix',
            '4' => '4 façades - Nouveau Prix'
        ];
        
        $clientIntro = $isClient ? 
            "<p>Merci pour votre demande de services supplémentaires pour le SIPA 2025. Voici un récapitulatif de votre demande :</p>" : 
            "<p>Une nouvelle demande de services supplémentaires a été soumise avec les détails suivants :</p>";
        
        $emailContent = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; }
                    h2 { color: #0d6efd; border-bottom: 2px solid #0d6efd; padding-bottom: 10px; }
                    h3 { color: #0d6efd; margin-top: 25px; }
                    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                    th, td { text-align: left; padding: 10px; border-bottom: 1px solid #ddd; }
                    th { background-color: #f8f9fa; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>SIPA 2025 - Services Supplémentaires</h2>
                    {$clientIntro}
                    
                    <h3>Informations sur l'entreprise</h3>
                    <table>
                        <tr><th>Raison Sociale</th><td>" . ($data['company_name'] ?? '') . "</td></tr>
                        <tr><th>Secteur d'activité</th><td>" . ($data['activity_sector'] ?? '') . "</td></tr>
                        <tr><th>Registre de commerce</th><td>" . ($data['registry_number'] ?? '') . "</td></tr>
                        <tr><th>Identifiant fiscal</th><td>" . ($data['tax_id'] ?? '') . "</td></tr>
                        <tr><th>Adresse</th><td>" . ($data['address'] ?? '') . "</td></tr>
                        <tr><th>Ville</th><td>" . ($data['city'] ?? '') . "</td></tr>
                        <tr><th>Pays</th><td>" . ($data['country'] ?? '') . "</td></tr>
                        <tr><th>Personne à contacter</th><td>" . ($data['contact_person'] ?? '') . "</td></tr>
                        <tr><th>Téléphone</th><td>" . ($data['phone'] ?? '') . "</td></tr>
                        <tr><th>Fax</th><td>" . ($data['fax'] ?? '') . "</td></tr>
                        <tr><th>Mobile</th><td>" . ($data['mobile'] ?? '') . "</td></tr>
                        <tr><th>Email</th><td>" . ($data['email'] ?? '') . "</td></tr>
                        <tr><th>Site Web</th><td>" . ($data['website'] ?? '') . "</td></tr>
                    </table>
                    
                    <h3>Détails de la Demande</h3>
                    <table>
                        <tr>
                            <th>Électricité (par jour)</th>
                            <td>" . (isset($data['electricity']) && isset($electricityOptions[$data['electricity']]) ? $electricityOptions[$data['electricity']] : '') . "</td>
                        </tr>
                        <tr><th>Superficie demandée</th><td>" . ($data['area'] ?? '') . " m²</td></tr>
                        <tr>
                            <th>Façades supplémentaires</th>
                            <td>" . (isset($data['facades']) && isset($facadesValues[$data['facades']]) ? $facadesValues[$data['facades']] : '') . "</td>
                        </tr>
                        <tr>
                            <th>Électricité obligatoire</th>
                            <td>" . (!empty($data['electricity_required']) ? 'Oui - 20,000 DA' : 'Non') . "</td>
                        </tr>
                    </table>
                    
                    <h3>Publicité sur le Catalogue</h3>
                    <table>
                        <tr><th>Option</th><th>Sélectionné</th></tr>
                        <tr><td>4ème page de couverture (110.000 DA)</td><td>" . (!empty($data['pub1']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>3ème page de couverture (85.000 DA)</td><td>" . (!empty($data['pub2']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>2ème page de couverture (80.000 DA)</td><td>" . (!empty($data['pub3']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>1/2 page intérieure couleur (30.000 DA)</td><td>" . (!empty($data['pub4']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>Présentation vidéo de votre entreprise (50.000 DA)</td><td>" . (!empty($data['pub5']) ? 'Oui' : 'Non') . "</td></tr>
                    </table>
                    
                    <h3>Services supplémentaires</h3>
                    <table>
                        <tr><th>Service</th><th>Sélectionné</th></tr>
                        <tr><td>Table supplémentaire (4.200 DA)</td><td>" . (!empty($data['service1']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>Chaise supplémentaire (1.800 DA)</td><td>" . (!empty($data['service2']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>Hôtesse d'accueil (par jour) (4.200 DA)</td><td>" . (!empty($data['service3']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>Traducteur (par jour) (12.000 DA)</td><td>" . (!empty($data['service4']) ? 'Oui' : 'Non') . "</td></tr>
                        <tr><td>Comptoir d'accueil (par jour) (5.000 DA)</td><td>" . (!empty($data['service5']) ? 'Oui' : 'Non') . "</td></tr>
                    </table>
                    
                    <h3>Signalétique et Confirmation</h3>
                    <table>
                        <tr><th>Nom sur l'enseigne</th><td>" . ($data['stand_name'] ?? '') . "</td></tr>
                        <tr><th>Nom de la société (confirmation)</th><td>" . ($data['company_name_confirmation'] ?? '') . "</td></tr>
                        <tr><th>Nombre de badges exposants</th><td>" . ($data['badges_count'] ?? '') . "</td></tr>
                        <tr><th>Macarons</th><td>";
                        
        if (!empty($data['macarons'])) {
            switch ($data['macarons']) {
                case '1':
                    $emailContent .= "1 badge = 1 macaron";
                    break;
                case '2':
                    $emailContent .= "4 badges = 2 macarons";
                    break;
                case '3':
                    $emailContent .= "6 badges = 3 macarons";
                    break;
            }
        }
        
        $emailContent .= "</td></tr>
                        <tr><th>Demande spécifique</th><td>" . ($data['specific_request'] ?? '') . "</td></tr>
                    </table>
                    
                    <p>Pour toute question, n'hésitez pas à nous contacter à <a href='mailto:contact@sipa2025.com'>contact@sipa2025.com</a></p>
                </div>
            </body>
            </html>
        ";
        
        return $emailContent;
    }


    private function buildVisitorEmail(array $data, bool $isClient = false): string
    {
        $clientIntro = $isClient ?
            "<p>Merci pour votre inscription en tant que visiteur au Salon International de la Pêche et de l'Aquaculture (SIPA 2025). Voici un récapitulatif de vos informations :</p>" :
            "<p>Une nouvelle demande de visiteur a été soumise avec les détails suivants :</p>";

        $emailContent = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; }
                    h2 { color: #0d6efd; border-bottom: 2px solid #0d6efd; padding-bottom: 10px; }
                    h3 { color: #0d6efd; margin-top: 25px; }
                    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                    th, td { text-align: left; padding: 10px; border-bottom: 1px solid #ddd; }
                    th { background-color: #f8f9fa; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>SIPA 2025 - Formulaire de Visiteur</h2>
                    {$clientIntro}
                    <h3>Informations sur le visiteur</h3>
                    <table>
                        <tr><th>Raison Sociale</th><td>" . ($data['company_name'] ?? '') . "</td></tr>
                        <tr><th>Registre de commerce Nº</th><td>" . ($data['registry_number'] ?? '') . "</td></tr>
                        <tr><th>Nº Identifiant fiscal</th><td>" . ($data['tax_id'] ?? '') . "</td></tr>
                        <tr><th>Adresse</th><td>" . ($data['address'] ?? '') . "</td></tr>
                        <tr><th>Ville</th><td>" . ($data['city'] ?? '') . "</td></tr>
                        <tr><th>Pays</th><td>" . ($data['country'] ?? '') . "</td></tr>
                        <tr><th>Personne à contacter</th><td>" . ($data['contact_person'] ?? '') . "</td></tr>
                        <tr><th>Tél.</th><td>" . ($data['phone'] ?? '') . "</td></tr>
                        <tr><th>Fax</th><td>" . ($data['fax'] ?? '') . "</td></tr>
                        <tr><th>Mobile</th><td>" . ($data['mobile'] ?? '') . "</td></tr>
                        <tr><th>Email</th><td>" . ($data['email'] ?? '') . "</td></tr>
                        <tr><th>Site Web</th><td>" . ($data['website'] ?? '') . "</td></tr>
                    </table>
                    " . ($isClient ? 
                        "<p><strong>Note :</strong> Nous vous contacterons prochainement pour confirmer votre inscription en tant que visiteur.</p>" : 
                        "<p><strong>Note :</strong> Cette demande provient d'un visiteur potentiel.</p>") . "
                    <p>Pour toute question, n'hésitez pas à nous contacter à <a href='mailto:contact@sipa2025.com'>contact@sipa2025.com</a></p>
                </div>
            </body>
            </html>
        ";
        return $emailContent;
    }

    
    // Email content builder for visa form
    private function buildVisaEmail(array $data, bool $isClient = false): string
    {
        $purposeOptions = [
            'business' => 'Affaires professionnelles',
            'conference' => 'Conférence / Salon',
            'training' => 'Formation',
            'other' => 'Autre'
        ];
        
        $clientIntro = $isClient ? 
            "<p>Merci pour votre demande de visa pour le SIPA 2025. Voici un récapitulatif de votre demande :</p>" : 
            "<p>Une nouvelle demande de visa a été soumise avec les détails suivants :</p>";
        
        $emailContent = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; }
                    h2 { color: #0d6efd; border-bottom: 2px solid #0d6efd; padding-bottom: 10px; }
                    h3 { color: #0d6efd; margin-top: 25px; }
                    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                    th, td { text-align: left; padding: 10px; border-bottom: 1px solid #ddd; }
                    th { background-color: #f8f9fa; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>SIPA 2025 - Demande de Visa</h2>
                    {$clientIntro}
                    
                    <h3>Informations Professionnelles</h3>
                    <table>
                        <tr><th>Nom de l'entreprise</th><td>" . ($data['company_name'] ?? '') . "</td></tr>
                        <tr><th>Secteur d'activité</th><td>" . ($data['activity_sector'] ?? '') . "</td></tr>
                        <tr><th>Registre de commerce</th><td>" . ($data['registry_number'] ?? '') . "</td></tr>
                        <tr><th>Identifiant fiscal</th><td>" . ($data['tax_id'] ?? '') . "</td></tr>
                        <tr><th>Adresse</th><td>" . ($data['address'] ?? '') . "</td></tr>
                        <tr><th>Ville</th><td>" . ($data['city'] ?? '') . "</td></tr>
                        <tr><th>Pays</th><td>" . ($data['country'] ?? '') . "</td></tr>
                        <tr><th>Personne à contacter</th><td>" . ($data['contact_person'] ?? '') . "</td></tr>
                        <tr><th>Téléphone</th><td>" . ($data['phone'] ?? '') . "</td></tr>
                        <tr><th>Fax</th><td>" . ($data['fax'] ?? '') . "</td></tr>
                        <tr><th>Mobile</th><td>" . ($data['mobile'] ?? '') . "</td></tr>
                        <tr><th>Email</th><td>" . ($data['email'] ?? '') . "</td></tr>
                        <tr><th>Site Web</th><td>" . ($data['website'] ?? '') . "</td></tr>
                    </table>
                    
                    <h3>Détails de la Demande de Visa</h3>
                    <table>
                        <tr><th>Numéro de passeport</th><td>" . ($data['passport_number'] ?? '') . "</td></tr>
                        <tr><th>Date d'émission</th><td>" . ($data['issue_date'] ?? '') . "</td></tr>
                        <tr><th>Date d'expiration</th><td>" . ($data['expiry_date'] ?? '') . "</td></tr>
                        <tr><th>Autorité émettrice</th><td>" . ($data['authority'] ?? '') . "</td></tr>
                        <tr><th>Objet de la visite</th><td>" . (isset($data['purpose_of_visit']) && isset($purposeOptions[$data['purpose_of_visit']]) ? $purposeOptions[$data['purpose_of_visit']] : '') . "</td></tr>
                        <tr><th>Poste occupé</th><td>" . ($data['job_title'] ?? '') . "</td></tr>
                        <tr><th>Date d'arrivée prévue</th><td>" . ($data['arrival_date'] ?? '') . "</td></tr>
                        <tr><th>Date de départ prévue</th><td>" . ($data['departure_date'] ?? '') . "</td></tr>
                    </table>
                    
                    " . ($isClient ? 
                        "<p><strong>Note :</strong> Votre demande est en cours de traitement. Nous vous contacterons prochainement concernant le statut de votre demande de visa.</p>" : 
                        "<p><strong>Note :</strong> La demande inclut un scan de passeport joint à cet email.</p>") . "
                    
                    <p>Pour toute question, n'hésitez pas à nous contacter à <a href='mailto:visa@sipa2025.com'>visa@sipa2025.com</a></p>
                </div>
            </body>
            </html>
        ";
        
        return $emailContent;
    }
}