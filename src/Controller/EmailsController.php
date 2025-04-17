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
            return $this->redirect('/confirmation');
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
            return $this->redirect('/confirmation');
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
                ->setTo('test@catalyst-dz.com') // Change to the organization's email
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de services supplémentaires - SIPA 2025')
                ->deliver($this->buildServicesEmail($data));
            
            // Client email confirmation
            if (!empty($data['email'])) {
                $clientMailer = new Mailer('default');
                $clientMailer
                    ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de services - SIPA 2025')
                    ->deliver($this->buildServicesEmail($data, true));
            }
            
            $this->Flash->success('Votre demande a été envoyée avec succès.');
            return $this->redirect('/confirmation');
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
            return $this->redirect('/confirmation');
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
    
        $publiciteOptions = [
            'pub1' => '4ème page de couverture - 2000 €',
            'pub2' => '3ème page de couverture - 1600 €',
            'pub3' => '2ème page de couverture - 1500 €',
            'pub4' => '1/2 page intérieure couleur - 400 €',
            'none' => 'Aucune publicité'
        ];
    
        $macaronsValues = [
            '1' => '2 badges = 1 macaron',
            '2' => '4 badges = 2 macarons',
            '3' => '6 badges = 3 macarons',
            '4' => '10 badges = 3 macarons'
        ];
        
        $clientIntro = $isClient ? 
            "<p>Merci pour votre inscription au Salon International de la Pêche et de l'Aquaculture (SIPA 2025). Voici un récapitulatif de votre demande :</p>" : 
            "<p>Une nouvelle demande de participation a été soumise avec les détails suivants :</p>";
        
        // Process selected products if any
        $selectedProductsHtml = "";
        if (!empty($data['selected_products']) && is_array($data['selected_products'])) {
            $selectedProductsHtml = "<h3>Services supplémentaires</h3><table><tr><th>Produit</th><th>Prix</th></tr>";
            
            foreach ($data['selected_products'] as $productId => $productData) {
                $product = json_decode($productData, true);
                if ($product) {
                    $selectedProductsHtml .= "<tr><td>{$product['name']}</td><td>{$product['price']} €</td></tr>";
                }
            }
            
            $selectedProductsHtml .= "</table>";
        }
    
        // Handle other activity sector
        $activitySector = $data['activity_sector'] ?? '';
        if ($activitySector === 'Autre' && !empty($data['other_activity_sector'])) {
            $activitySector .= ' - ' . $data['other_activity_sector'];
        }
    
        // Handle electricity selection
        $electricityOption = '';
        if (!empty($data['electricity'])) {
            $electricityValue = $data['electricity'];
            $electricityOption = "{$electricityValue} m² - " . ($electricityValue * 5) . " £";
        }
        
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
                        <tr><th>Secteur d'activité</th><td>" . $activitySector . "</td></tr>
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
                        <tr><th>Superficie demandée</th><td>" . ($data['area'] ?? '') . " m²</td></tr>";
                        
        // Calculate stand price if possible
        if (!empty($data['stand_type']) && !empty($data['area'])) {
            $pricePerSqm = [
                'amenage' => 250,
                'non_amenage' => 200,
                'decouvert' => 150
            ];
            if (isset($pricePerSqm[$data['stand_type']])) {
                $totalPrice = $pricePerSqm[$data['stand_type']] * intval($data['area']);
                $emailContent .= "<tr><th>Prix total du stand</th><td>{$totalPrice} €</td></tr>";
            }
        }
        
        $emailContent .= "
                        <tr>
                            <th>Électricité</th>
                            <td>" . $electricityOption . "</td>
                        </tr>
                        <tr>
                            <th>Façades supplémentaires</th>
                            <td>" . (isset($data['facades']) && isset($facadesValues[$data['facades']]) ? $facadesValues[$data['facades']] : '') . "</td>
                        </tr>
                        <tr>
                            <th>Électricité obligatoire</th>
                            <td>" . (!empty($data['electricity_required']) ? 'Oui - 180 £' : 'Non') . "</td>
                        </tr>
                    </table>
                    
                    <h3>Publicité sur le Catalogue</h3>
                    <table>
                        <tr><th>Option choisie</th><td>";
        
        // Determine which publicity option was selected
        if (!empty($data['publicite_catalogue']) && isset($publiciteOptions[$data['publicite_catalogue']])) {
            $emailContent .= $publiciteOptions[$data['publicite_catalogue']];
        } else {
            $emailContent .= "Aucune sélection";
        }
        
        $emailContent .= "</td></tr>
                    </table>
                    
                    " . $selectedProductsHtml . "
                    
                    <h3>Signalétique et Confirmation</h3>
                    <table>
                        <tr><th>Nom sur l'enseigne</th><td>" . ($data['stand_name'] ?? '') . "</td></tr>
                        <tr><th>Nom de la société (confirmation)</th><td>" . ($data['company_name_confirmation'] ?? '') . "</td></tr>";
        
        // Handle badges
        $badgesCount = $data['badges_count'] ?? '';
        if (empty($badgesCount) && !empty($data['badges_option']) && $data['badges_option'] !== 'autre') {
            $badgesCount = $data['badges_option'];
        }
        
        $emailContent .= "
                        <tr><th>Nombre de badges exposants</th><td>" . $badgesCount . "</td></tr>
                        <tr><th>Macarons</th><td>" . (isset($data['macarons']) && isset($macaronsValues[$data['macarons']]) ? $macaronsValues[$data['macarons']] : '') . "</td></tr>
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
            '2' => '2 façades - 17.000 Da',
            '3' => '3 façades - 22.000 Da',
            '4' => '4 façades - 31.000 Da'
        ];
        
        $standTypes = [
            '17000' => 'Stand aménagé (17.000 DA/m²)',
            '12000' => 'Stand non aménagé (12.000 DA/m²)',
            '10000' => 'Emplacement découvert (10.000 DA/m²)'
        ];
        
        $publiciteOptions = [
            '4e' => '4ème page de couverture (120.000 DA)',
            '3e' => '3ème page de couverture (100.000 DA)',
            '2e' => '2ème page de couverture (80.000 DA)',
            'demi' => '1/2 page intérieure couleur (30.000 DA)'
        ];
        
        $badgesOptions = [
            '1' => '1 badge',
            '2' => '2 badges',
            '4' => '4 badges',
            '6' => '6 badges',
            '8' => '8 badges',
            '10' => '10 badges',
            'autre' => 'Autre quantité: ' . ($data['badges_count'] ?? '')
        ];
        
        $macaronsOptions = [
            '1' => '2 badges = 1 macaron',
            '2' => '4 badges = 2 macarons',
            '3' => '6 badges = 3 macarons ou 10 badges = 3 macarons'
        ];
        
        $clientIntro = $isClient ? 
            "<p>Merci pour votre demande de participation au SIPA 2025. Voici un récapitulatif de votre demande :</p>" : 
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
                        <tr><th>Secteur d'activité</th><td>" . ($data['activity_sector'] ?? '') . "</td></tr>";
        
        // Add other sector if specified
        if (isset($data['activity_sector']) && $data['activity_sector'] === 'Autre') {
            $emailContent .= "<tr><th>Précision secteur</th><td>" . ($data['other_activity_sector'] ?? '') . "</td></tr>";
        }
        
        $emailContent .= "
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
                            <td>" . (isset($data['standType']) && isset($standTypes[$data['standType']]) ? $standTypes[$data['standType']] : '') . "</td>
                        </tr>
                        <tr><th>Superficie demandée</th><td>" . ($data['area'] ?? '') . " m²</td></tr>";
        
        // Calculate total price if both standType and area are set
        if (!empty($data['standType']) && !empty($data['area'])) {
            $totalPrice = intval($data['standType']) * intval($data['area']);
            $emailContent .= "<tr><th>Prix total du stand</th><td>" . number_format($totalPrice, 0, ',', '.') . " DA</td></tr>";
        }
        
        $emailContent .= "
                        <tr>
                            <th>Électricité (par jour)</th>
                            <td>" . (isset($data['electricity']) && isset($electricityOptions[$data['electricity']]) ? $electricityOptions[$data['electricity']] : '') . "</td>
                        </tr>
                        <tr>
                            <th>Façades supplémentaires</th>
                            <td>" . (isset($data['facades']) && isset($facadesValues[$data['facades']]) ? $facadesValues[$data['facades']] : '') . "</td>
                        </tr>
                        <tr>
                            <th>Électricité obligatoire (20.000 DA)</th>
                            <td>Oui</td>
                        </tr>
                    </table>
                    
                    <h3>Publicité sur le Catalogue</h3>
                    <table>";
        
        if (!empty($data['publicite']) && isset($publiciteOptions[$data['publicite']])) {
            $emailContent .= "<tr><th>Option sélectionnée</th><td>" . $publiciteOptions[$data['publicite']] . "</td></tr>";
        } else {
            $emailContent .= "<tr><td colspan='2'>Aucune option sélectionnée</td></tr>";
        }
        
        $emailContent .= "</table>
                    
                    <h3>Services supplémentaires</h3>
                    <table>
                        <tr><th>Produit</th><th>Prix</th></tr>";
        
        // Parse selected products from the form data
        $selectedProducts = [];
        foreach ($data as $key => $value) {
            if (strpos($key, 'product_') === 0 && $value == '1') {
                // Extract product details from key or additional fields if available
                // This would need to be adjusted based on how you're storing the product data
                $productName = "Product"; // Replace with actual product name extraction
                $productPrice = "Price"; // Replace with actual price extraction
                $selectedProducts[] = ["name" => $productName, "price" => $productPrice];
            }
        }
        
        if (!empty($selectedProducts)) {
            foreach ($selectedProducts as $product) {
                $emailContent .= "<tr><td>" . $product['name'] . "</td><td>" . $product['price'] . "</td></tr>";
            }
        } else {
            $emailContent .= "<tr><td colspan='2'>Aucun service supplémentaire sélectionné</td></tr>";
        }
        
        $emailContent .= "</table>
                    
                    <h3>Signalétique et Confirmation</h3>
                    <table>
                        <tr><th>Nom sur l'enseigne</th><td>" . ($data['stand_name'] ?? '') . "</td></tr>
                        <tr><th>Nom de la société (confirmation)</th><td>" . ($data['company_name_confirmation'] ?? '') . "</td></tr>
                        <tr><th>Nombre de badges exposants</th><td>";
        
        if (isset($data['badges_option'])) {
            if ($data['badges_option'] === 'autre' && !empty($data['badges_count'])) {
                $emailContent .= $data['badges_count'] . " badges";
            } else if (isset($badgesOptions[$data['badges_option']])) {
                $emailContent .= $badgesOptions[$data['badges_option']];
            }
        }
        
        $emailContent .= "</td></tr>
                        <tr><th>Macarons</th><td>";
        
        if (!empty($data['macarons']) && isset($macaronsOptions[$data['macarons']])) {
            $emailContent .= $macaronsOptions[$data['macarons']];
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