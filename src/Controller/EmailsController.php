<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Dompdf\Dompdf;
use Dompdf\Options;

class EmailsController extends AppController
{
    // Method for handling the main participation form
    public function international()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Generate PDF and get the file path
            $invoicePath = $this->generateInvoiceeUROPDF($data);

            // Organization email
            $mailer = new Mailer('default');
            $emailContent = '';

            $mailer
                ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025 Formulaire'])
                ->setTo('test@catalyst-dz.com') 
                ->setEmailFormat('html')
                ->setSubject('Inscription International - SIPA 2025')
                ->setAttachments([
                    'Inscription_international_SIPA2025.pdf' => [
                        'file' => $invoicePath,
                        'mimetype' => 'application/pdf'
                    ]
                ])
                ->deliver($emailContent);

            // Client email confirmation
            if (!empty($data['email'])) {
                $clientMailer = new Mailer('default');
                $clientEmailContent = $this->buildParticipationEmail($data, true);

                $clientMailer
                    ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de participation - SIPA 2025')
                    ->setAttachments([
                        'Demande_Participation_SIPA2025.pdf' => [
                            'file' => $invoicePath,
                            'mimetype' => 'application/pdf'
                        ]
                    ])
                    ->deliver($clientEmailContent);
            }

            // Store the PDF path in session if you need to access it later
            $this->request->getSession()->write('pdf_path', $invoicePath);

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
                ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025 Formulaire'])
                ->setTo('test@catalyst-dz.com') // Change to the organization's email
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de visiteur - SIPA 2025')
                ->deliver($this->buildVisitorEmail($data));

            // Visitor email confirmation
            if (!empty($data['email'])) {
                $visitorMailer = new Mailer('default');
                $visitorMailer
                    ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de visiteur - SIPA 2025')
                    ->deliver($this->buildVisitorEmail($data, true));
            }

            $this->Flash->success('Votre demande a été envoyée avec succès.');
            return $this->redirect('/confirmation');
        }
    }
    public function national()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Generate email content
            $emailContent = "";

            // Generate PDF files
            $invoicePath = $this->generateInvoicePDF($data);

            // Organization email
            $mailer = new Mailer('default');
            $mailer
                ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025 Formulaire'])
                ->setTo('test@catalyst-dz.com')
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de services supplémentaires - SIPA 2025')
                ->setAttachments([
                   
                    'Facture_SIPA2025.pdf' => [
                        'file' => $invoicePath,
                        'mimetype' => 'application/pdf'
                    ]
                ])
                ->deliver($emailContent);

            // Client email confirmation
            if (!empty($data['email'])) {
                $clientMailer = new Mailer('default');
                $clientEmailContent = $this->buildServicesEmail($data, true);

                $clientMailer
                    ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Confirmation de votre demande de services - SIPA 2025')
                    ->setAttachments([
                     
                        'Facture_SIPA2025.pdf' => [
                            'file' => $invoicePath,
                            'mimetype' => 'application/pdf'
                        ]
                    ])
                    ->deliver($clientEmailContent);
            }

            // Store the PDF paths in session if you need to access them later
            $this->request->getSession()->write('invoice_path', $invoicePath);

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
            if (
                !empty($this->request->getData('passport_scan')) &&
                $this->request->getData('passport_scan')->getError() === UPLOAD_ERR_OK
            ) {
                $passportFile = $this->request->getData('passport_scan');
                // You can save the file here if needed
            }

            // Organization email
            $mailer = new Mailer('default');
            $mailer
                ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025 Visa'])
                ->setTo('test@catalyst-dz.com') // Change to the visa department's email
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
                    ->setFrom(['test@catalyst-dz.com' => 'SIPA 2025'])
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
    // Remove the dd($data) debugging call
    // dd($data);
    
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
                    <tr><th>Produit</th><th>Prix</th><th>Quantité</th></tr>";

    // Parse selected products from the JSON string
    $selectedProducts = [];
    if (!empty($data['selected_products'])) {
        $selectedProducts = json_decode($data['selected_products'], true);
    }

    if (!empty($selectedProducts)) {
        foreach ($selectedProducts as $product) {
            $emailContent .= "<tr>
                <td>" . htmlspecialchars($product['name']) . "</td>
                <td>" . number_format($product['price'], 0, ',', '.') . " DA</td>
                <td>" . ($product['quantity'] ?? 1) . "</td>
            </tr>";
        }
        
        // Calculate total price for additional products
        $additionalProductsTotal = 0;
        foreach ($selectedProducts as $product) {
            $additionalProductsTotal += $product['price'] * ($product['quantity'] ?? 1);
        }
        
        if ($additionalProductsTotal > 0) {
            $emailContent .= "<tr>
                <th colspan='2'>Total Services supplémentaires</th>
                <td>" . number_format($additionalProductsTotal, 0, ',', '.') . " DA</td>
            </tr>";
        }
    } else {
        $emailContent .= "<tr><td colspan='3'>Aucun service supplémentaire sélectionné</td></tr>";
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
                </table>";
                
    // Add total amount if available
    if (!empty($data['total_amount'])) {
        $emailContent .= "
                <h3>Total de la commande</h3>
                <table>
                    <tr><th>Montant total</th><td>" . number_format((float)$data['total_amount'], 0, ',', '.') . " DA</td></tr>
                </table>";
    }
    
    $emailContent .= "
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

    private function generateInvoicePDF(array $data): string
    {
    
        // Calculate prices and totals
        $standPrice = !empty($data['standType']) ? intval($data['standType']) : 0;
        $area = !empty($data['area']) ? intval($data['area']) : 0;
        $standTotal = $standPrice * $area;
        
        // Get facade price
        $facadePrice = 0;
        if (!empty($data['facades'])) {
            switch ($data['facades']) {
                case '2': $facadePrice = 17000; break;
                case '3': $facadePrice = 22000; break;
                case '4': $facadePrice = 31000; break;
            }
        }
        
        // Calculate electricity price - UPDATED to match the form's calculations
        $electricityFixed = 20000; // Électricité obligatoire
        $electricityPerDay = 0;
        if (!empty($data['electricity']) && !empty($data['area'])) {
            // Use the electricity rates from the form
            $electricityRates = [
                '12' => 720,
                '15' => 900,
                '18' => 1080,
                '21' => 1260,
                '24' => 1440,
                '27' => 1620,
                '36' => 2160,
                '48' => 2890,
                '54' => 3240,
                '60' => 3600
            ];
            
            if (isset($electricityRates[$data['area']])) {
                $electricityPerDay = $electricityRates[$data['area']];
            }
        }
        
        // Get catalog advertisement price
        $publicityPrice = 0;
        if (!empty($data['publicite'])) {
            switch ($data['publicite']) {
                case '4e': $publicityPrice = 120000; break;
                case '3e': $publicityPrice = 100000; break;
                case '2e': $publicityPrice = 80000; break;
                case 'demi': $publicityPrice = 32000; break;
            }
        }
 
       // Get selected products
$selectedProducts = [];
$productsTotal = 0;

// Check if selected_products exists and decode it if it's a JSON string
if (!empty($data['selected_products'])) {
    // Check if it's a string that needs to be decoded
    if (is_string($data['selected_products'])) {
        $selectedProducts = json_decode($data['selected_products'], true);
    } else {
        // It's already an array
        $selectedProducts = $data['selected_products'];
    }
    
    // Calculate total
    foreach ($selectedProducts as $product) {
        $productsTotal += $product['price'] * $product['quantity'];
    }
}
        // Calculate totals
        $totalHT = $electricityFixed + $standTotal + $facadePrice + $electricityPerDay + $publicityPrice + $productsTotal;
        $taxRate = 0.19; // 19% tax rate
        $taxes = $totalHT * $taxRate;
        $totalTTC = $totalHT + $taxes;
        
        // Get stand type label
        $standTypeLabels = [
            '17000' => 'Stand aménagé',
            '12000' => 'Stand non aménagé',
            '10000' => 'Emplacement découvert'
        ];
        $standTypeLabel = isset($data['standType']) && isset($standTypeLabels[$data['standType']]) ? 
            $standTypeLabels[$data['standType']] : 'Stand';
        
        // Get facades label
        $facadesLabels = [
            '1' => 'Emplacement à 01 façade',
            '2' => 'Emplacement à 02 façades',
            '3' => 'Emplacement à 03 façades',
            '4' => 'Emplacement à 04 façades'
        ];
        $facadesLabel = isset($data['facades']) && isset($facadesLabels[$data['facades']]) ?
            $facadesLabels[$data['facades']] : '';
        
        // Get publicity label
        $publicityLabels = [
            '4e' => '4ème page de couverture',
            '3e' => '3ème page de couverture',
            '2e' => '2ème page de couverture',
            'demi' => '1/2 page intérieure couleur'
        ];
        $publicityLabel = isset($data['publicite']) && isset($publicityLabels[$data['publicite']]) ?
            $publicityLabels[$data['publicite']] : '';
        
        // Generate invoice number
        $invoiceNumber = date('Y') . '/' . sprintf('%03d', rand(1, 999));
        
        // Generate HTML content for the invoice
        $html = '
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
                @page {
                    margin: 1cm;
                }
                body {
                    font-family: "DejaVu Sans", Arial, sans-serif;
                    color: #333;
                    line-height: 1.4;
                    margin: 0;
                    padding: 0;
                    font-size: 12px;
                }
                .container {
                    width: 100%;
                    max-width: 800px;
                    margin: 0 auto;
                }
                .logo-wrapper {
                    text-align: left;
                    margin-bottom: 10px;
                }
                .logo {
                    max-width: 200px;
                    height: auto;
                }
                .header {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 30px;
                    border-bottom: 2px solid #0058a2;
                    padding-bottom: 10px;
                }
                .organizer-info {
                    text-align: left;
                    width: 60%;
                }
                .organizer-info h2 {
                    margin: 0;
                    color: #0058a2;
                    font-size: 16px;
                }
                .organizer-info p {
                    margin: 3px 0;
                    font-size: 11px;
                }
                .invoice-title {
                    text-align: right;
                    width: 40%;
                }
                .invoice-title h1 {
                    margin: 0;
                    color: #0058a2;
                    font-size: 22px;
                    font-weight: bold;
                    letter-spacing: 1px;
                }
                .invoice-title p {
                    margin: 5px 0;
                    font-size: 12px;
                }
                .client-section {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 30px;
                }
                .client-info {
                    width: 60%;
                    padding: 15px;
                    background-color: #f9f9f9;
                    border-left: 4px solid #0058a2;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                }
                .client-info strong {
                    font-size: 14px;
                    color: #0058a2;
                }
                .invoice-details {
                    width: 35%;
                    text-align: right;
                }
                .invoice-details p {
                    margin: 5px 0;
                }
                .invoice-details .label {
                    font-weight: bold;
                    color: #666;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 30px;
                    font-size: 12px;
                }
                th {
                    background-color: #0058a2;
                    color: white;
                    padding: 10px;
                    text-align: left;
                    font-weight: normal;
                }
                td {
                    padding: 10px;
                    border-bottom: 1px solid #e0e0e0;
                }
                tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                .totals {
                    width: 40%;
                    margin-left: auto;
                    margin-bottom: 30px;
                }
                .totals table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .totals td {
                    padding: 8px;
                    border: none;
                }
                .totals tr:last-child {
                    font-weight: bold;
                    font-size: 14px;
                    color: #0058a2;
                    border-top: 2px solid #0058a2;
                }
                .amount-in-words {
                    padding: 15px;
                    margin-bottom: 30px;
                    background-color: #f9f9f9;
                    border-left: 4px solid #0058a2;
                    font-style: italic;
                    font-weight: bold;
                    color: #333;
                }
                .footer {
                    text-align: center;
                    font-size: 10px;
                    color: #666;
                    margin-top: 50px;
                    padding-top: 10px;
                    border-top: 1px solid #e0e0e0;
                }
                .invoice-notes {
                    margin-top: 20px;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border-left: 4px solid #0058a2;
                    font-size: 11px;
                }
                .invoice-notes p {
                    margin: 5px 0;
                }
                .text-right {
                    text-align: right;
                }
                .col-num {
                    width: 5%;
                }
                .col-desc {
                    width: 40%;
                }
                .col-qty {
                    width: 15%;
                }
                .col-price {
                    width: 20%;
                    text-align: right;
                }
                .col-total {
                    width: 20%;
                    text-align: right;
                }
                .stamp-signature {
                    margin-top: 30px;
                    display: flex;
                    justify-content: space-between;
                }
                .stamp, .signature {
                    width: 45%;
                    height: 100px;
                    border: 1px dashed #ccc;
                    padding: 10px;
                    text-align: center;
                }
                .stamp p, .signature p {
                    margin-top: 40px;
                    color: #999;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <div class="organizer-info">
                        <h2>Chambre Algérienne de la Pêche et de l\'Aquaculture</h2>
                        <p>El Hammamet, Chéraga, Alger</p>
                        <p>Salon International de la pêche et de l\'Aquaculture</p>
                        <p><span style="color:#666;">RC :</span> 16/00 096558484 | <span style="color:#666;">NIF :</span> 000416096558443</p>
                        <p><span style="color:#666;">NIS :</span> 000216459085919 | <span style="color:#666;">AI :</span> 16/24 9081003</p>
                        <p><span style="color:#666;">Domiciliation :</span> CPA agence Amirouche</p>
                        <p><span style="color:#666;">RIB :</span> 00400108401016252425 | <span style="color:#666;">SWIFT:</span> CPALDZALXXX</p>
                    </div>
                    <div class="invoice-title">
                        <h1>FACTURE</h1>
                        <p style="font-size:16px;font-weight:bold;color:#0058a2;">N° '.$invoiceNumber.'</p>
                    </div>
                </div>
                
                <div class="client-section">
                    <div class="client-info">
                        <strong>'.($data['company_name'] ?? '').'</strong><br>
                        '.($data['address'] ?? '').'<br>
                        '.($data['city'] ?? '').'<br>
                        '.($data['country'] ?? '').'<br><br>
                        <span style="color:#666;">RC:</span> '.($data['registry_number'] ?? '').'<br>
                        <span style="color:#666;">NIF:</span> '.($data['tax_id'] ?? '').'
                    </div>
                    
                    <div class="invoice-details">
                        <p><span class="label">Date de la facture :</span><br>'.date('d/m/Y').'</p>
                        <p><span class="label">Date d\'échéance :</span><br>'.date('d/m/Y', strtotime('+15 days')).'</p>
                    </div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th class="col-num">N°</th>
                            <th class="col-desc">DESCRIPTION</th>
                            <th class="col-qty">QUANTITÉ</th>
                            <th class="col-price">PRIX UNITAIRE HT</th>
                            <th class="col-total">MONTANT HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>'.$standTypeLabel.' (min12m²)</td>
                            <td>'.$area.',00 m²</td>
                            <td class="text-right">'.number_format($standPrice, 2, ',', ' ').'</td>
                            <td class="text-right">'.number_format($standTotal, 2, ',', ' ').' DA</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Électricité obligatoire</td>
                            <td>1,00 Unités</td>
                            <td class="text-right">'.number_format($electricityFixed, 2, ',', ' ').'</td>
                            <td class="text-right">'.number_format($electricityFixed, 2, ',', ' ').' DA</td>
                        </tr>';
        
        $itemCount = 3;
        
        // Add electricity per day row if applicable
        if ($electricityPerDay > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>Électricité par jour ('.$area.' m²)</td>
                            <td>1,00 Unités</td>
                            <td class="text-right">'.number_format($electricityPerDay, 2, ',', ' ').'</td>
                            <td class="text-right">'.number_format($electricityPerDay, 2, ',', ' ').' DA</td>
                        </tr>';
            $itemCount++;
        }
        
        // Add facade row if applicable
        if ($facadePrice > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>'.$facadesLabel.'</td>
                            <td>1,00 Unités</td>
                            <td class="text-right">'.number_format($facadePrice, 2, ',', ' ').'</td>
                            <td class="text-right">'.number_format($facadePrice, 2, ',', ' ').' DA</td>
                        </tr>';
            $itemCount++;
        }
        
        // Add publicity row if applicable
        if ($publicityPrice > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>Publicité catalogue - '.$publicityLabel.'</td>
                            <td>1,00 Unités</td>
                            <td class="text-right">'.number_format($publicityPrice, 2, ',', ' ').'</td>
                            <td class="text-right">'.number_format($publicityPrice, 2, ',', ' ').' DA</td>
                        </tr>';
            $itemCount++;
        }

        // Add selected products
        if (!empty($selectedProducts)) {
            foreach ($selectedProducts as $product) {
                $productTotal = $product['price'] * $product['quantity'];
                $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>'.$product['name'].'</td>
                            <td>'.$product['quantity'].',00 Unités</td>
                            <td class="text-right">'.number_format($product['price'], 2, ',', ' ').'</td>
                            <td class="text-right">'.number_format($productTotal, 2, ',', ' ').' DA</td>
                        </tr>';
                $itemCount++;
            }
        }
        
        $html .= '
                    </tbody>
                </table>
                
                <div class="totals">
                    <table>
                        <tr>
                            <td>Montant HT</td>
                            <td class="text-right">'.number_format($totalHT, 2, ',', ' ').' DA</td>
                        </tr>
                        <tr>
                            <td>Taxes (19%)</td>
                            <td class="text-right">'.number_format($taxes, 2, ',', ' ').' DA</td>
                        </tr>
                        <tr>
                            <td>Total TTC</td>
                            <td class="text-right">'.number_format($totalTTC, 2, ',', ' ').' DA</td>
                        </tr>
                    </table>
                </div>
                
                <div class="amount-in-words">
                    Arrêtée la présente facture à la somme de : '.self::numberToWords($totalTTC).' Dinars
                </div>
                
                <div class="stamp-signature">
                    <div class="stamp">
                        <p>Cachet</p>
                    </div>
                    <div class="signature">
                        <p>Signature</p>
                    </div>
                </div>
                
                <div class="invoice-notes">
                    <p><strong>Conditions de paiement :</strong> Paiement à réception de facture.</p>
                    <p><strong>Mode de paiement :</strong> Virement bancaire sur le compte indiqué ci-dessus.</p>
                    <p>Pour toute question concernant cette facture, veuillez contacter notre service comptabilité à <strong>comptabilite@sipa2025.com</strong></p>
                </div>
                
                <div class="footer">
                    <p>SIPA 2025 - Salon International de la pêche et de l\'Aquaculture | Page 1/1</p>
                </div>
            </div>
        </body>
        </html>';
        
        // Create PDF using dompdf
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Generate a unique filename with timestamp
        $filename = 'facture_' . time() . '_' . uniqid() . '.pdf';
        $filepath = TMP . 'pdfs' . DS . $filename;
        
        // Make sure directory exists
        if (!file_exists(TMP . 'pdfs')) {
            mkdir(TMP . 'pdfs', 0755, true);
        }
        
        // Save the PDF to file
        file_put_contents($filepath, $dompdf->output());
        
        return $filepath;
    } 
    
    private function generateInvoiceeUROPDF(array $data): string
    {
        // Calculate stand price based on type and area
        $standPricePerM2 = 0;
        $standTypeLabel = '';
        if (!empty($data['stand_type'])) {
            switch ($data['stand_type']) {
                case 'amenage':
                    $standPricePerM2 = 250;
                    $standTypeLabel = 'Stand aménagé';
                    break;
                case 'non_amenage':
                    $standPricePerM2 = 200;
                    $standTypeLabel = 'Stand non aménagé';
                    break;
                case 'decouvert':
                    $standPricePerM2 = 150;
                    $standTypeLabel = 'Emplacement découvert';
                    break;
            }
        }
        
        $area = !empty($data['area']) ? intval($data['area']) : 0;
        $standTotal = $standPricePerM2 * $area;
        
        // Calculate electricity price
        $electricityPrice = 0;
        if (!empty($data['electricity']) && !empty($data['electricity_required'])) {
            $electricityRates = [
                '12' => 60,
                '15' => 75,
                '18' => 90,
                '21' => 105,
                '24' => 130,
                '27' => 145,
                '36' => 180,
                '48' => 240,
                '54' => 270,
                '60' => 300
            ];
            
            if (isset($electricityRates[$data['electricity']])) {
                $electricityPrice = $electricityRates[$data['electricity']];
            }
        }
        
        // Calculate facade price
        $facadePrice = 0;
        if (!empty($data['facades'])) {
            switch ($data['facades']) {
                case '2': $facadePrice = 250; break;
                case '3': $facadePrice = 350; break;
                case '4': $facadePrice = 400; break;
            }
        }
        
        // Calculate catalog advertisement price
        $publicityPrice = 0;
        $publicityLabel = '';
        if (!empty($data['publicite_catalogue'])) {
            switch ($data['publicite_catalogue']) {
                case 'pub1':
                    $publicityPrice = 2000;
                    $publicityLabel = '4ème page de couverture';
                    break;
                case 'pub2':
                    $publicityPrice = 1600;
                    $publicityLabel = '3ème page de couverture';
                    break;
                case 'pub3':
                    $publicityPrice = 1500;
                    $publicityLabel = '2ème page de couverture';
                    break;
                case 'pub4':
                    $publicityPrice = 400;
                    $publicityLabel = '1/2 page intérieure couleur';
                    break;
            }
        }
        
        // Get selected products
        $selectedProducts = [];
        $productsTotal = 0;
        
        if (!empty($data['selected_products_json'])) {
            $selectedProducts = json_decode($data['selected_products_json'], true);
            
            if (is_array($selectedProducts)) {
                foreach ($selectedProducts as $product) {
                    $productsTotal += $product['price'] * $product['quantity'];
                }
            }
        }
        
        // Calculate totals (in euros)
        $totalHT = $standTotal + $electricityPrice + $facadePrice + $publicityPrice + $productsTotal;
        $taxRate = 0.19; // 19% tax rate
        $taxes = $totalHT * $taxRate;
        $totalTTC = $totalHT + $taxes;
        
        // Generate invoice number with prefix and proper padding
        $invoiceNumber = 'SIPA-' . date('Y') . '-' . sprintf('%04d', rand(1, 9999));
        
        // Format date in French style
        $invoiceDate = date('d/m/Y');
        $dueDate = date('d/m/Y', strtotime('+15 days'));
        
        // Generate HTML content for the invoice with improved design
        $html = '
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
                @page {
                    margin: 15mm;
                }
                body {
                    font-family: "DejaVu Sans", Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    color: #333;
                    font-size: 11px;
                    line-height: 1.5;
                }
                .container {
                    width: 100%;
                    box-sizing: border-box;
                }
                .header {
                    position: relative;
                    border-bottom: 3px solid #0058a2;
                    padding-bottom: 15px;
                    margin-bottom: 15px;
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                }
                .header:after {
                    content: "";
                    position: absolute;
                    bottom: -6px;
                    left: 0;
                    width: 100%;
                    height: 1px;
                    background-color: #0058a2;
                }
                .organizer-info {
                    width: 60%;
                }
                .organizer-info h2 {
                    color: #0058a2;
                    margin: 0 0 5px 0;
                    font-size: 16px;
                }
                .organizer-info p {
                    margin: 2px 0;
                    font-size: 10px;
                }
                .invoice-title {
                    text-align: right;
                    width: 40%;
                }
                .invoice-title h1 {
                    color: #0058a2;
                    margin: 0;
                    font-size: 24px;
                    letter-spacing: 2px;
                }
                .invoice-title p {
                    margin: 5px 0;
                }
                .client-section {
                    margin: 15px 0;
                    display: flex;
                    justify-content: space-between;
                }
                .client-info {
                    width: 45%;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border-radius: 4px;
                    border-left: 3px solid #0058a2;
                }
                .invoice-details {
                    width: 45%;
                    text-align: right;
                }
                .invoice-details p {
                    margin: 3px 0;
                }
                .label {
                    color: #666;
                    font-weight: bold;
                }
                .item-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 15px 0;
                    font-size: 10px;
                    table-layout: fixed;
                }
                .item-table th, .item-table td {
                    padding: 8px;
                    border-bottom: 1px solid #ddd;
                    word-break: break-word;
                    vertical-align: top;
                }
                .item-table th {
                    background-color: #0058a2;
                    color: white;
                    font-weight: normal;
                    text-align: left;
                }
                .item-table tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                .item-table tr:hover {
                    background-color: #f1f1f1;
                }
                .col-num {
                    width: 5%;
                }
                .col-desc {
                    width: 45%;
                }
                .col-qty {
                    width: 10%;
                }
                .col-price {
                    width: 20%;
                }
                .col-total {
                    width: 20%;
                }
                .text-right {
                    text-align: right;
                }
                .totals {
                    margin-top: 20px;
                    float: right;
                    width: 40%;
                }
                .totals table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .totals table td {
                    padding: 5px;
                    border: none;
                }
                .totals table tr:last-child {
                    font-weight: bold;
                    font-size: 12px;
                    color: #0058a2;
                }
                .totals table tr:last-child td {
                    border-top: 2px solid #0058a2;
                    border-bottom: 2px solid #0058a2;
                    padding-top: 8px;
                }
                .amount-in-words {
                    clear: both;
                    margin: 30px 0 15px 0;
                    padding: 8px;
                    background-color: #f9f9f9;
                    border-radius: 4px;
                    font-style: italic;
                    font-size: 10px;
                }
                .stamp-signature {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 40px;
                    margin-bottom: 30px;
                }
                .stamp, .signature {
                    width: 45%;
                    text-align: center;
                    border-top: 1px solid #ddd;
                    padding-top: 8px;
                }
                .stamp p, .signature p {
                    margin: 3px 0;
                    color: #666;
                }
                .invoice-notes {
                    margin-top: 20px;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border-radius: 4px;
                    border-left: 3px solid #0058a2;
                }
                .invoice-notes p {
                    margin: 3px 0;
                    font-size: 10px;
                }
                .highlight {
                    color: #0058a2;
                    font-weight: bold;
                }
                .footer {
                    margin-top: 20px;
                    text-align: center;
                    font-size: 9px;
                    color: #666;
                    border-top: 1px solid #ddd;
                    padding-top: 8px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <div class="organizer-info">
                        <h2>Chambre Algérienne de la Pêche et de l\'Aquaculture</h2>
                        <p>El Hammamet, Chéraga, Alger</p>
                        <p class="highlight">Salon International de la pêche et de l\'Aquaculture</p>
                        <p><span style="color:#666;">RC :</span> 16/00 096558484 | <span style="color:#666;">NIF :</span> 000416096558443</p>
                        <p><span style="color:#666;">NIS :</span> 000216459085919 | <span style="color:#666;">AI :</span> 16/24 9081003</p>
                        <p><span style="color:#666;">Domiciliation :</span> CPA agence Amirouche</p>
                        <p><span style="color:#666;">RIB :</span> 00400108401016252425 | <span style="color:#666;">SWIFT:</span> CPALDZALXXX</p>
                    </div>
                    <div class="invoice-title">
                        <h1>FACTURE</h1>
                        <p style="font-size:14px;font-weight:bold;color:#0058a2;">N° '.$invoiceNumber.'</p>
                    </div>
                </div>
                
                <div class="client-section">
                    <div class="client-info">
                        <strong>'.htmlspecialchars($data['company_name'] ?? '').'</strong><br>
                        '.htmlspecialchars($data['address'] ?? '').'<br>
                        '.htmlspecialchars($data['city'] ?? '').'<br>
                        '.htmlspecialchars($data['country'] ?? '').'<br><br>
                        <span style="color:#666;">RC:</span> '.htmlspecialchars($data['registry_number'] ?? '').'<br>
                        <span style="color:#666;">NIF:</span> '.htmlspecialchars($data['tax_id'] ?? '').'
                    </div>
                    
                    <div class="invoice-details">
                        <p><span class="label">Date de la facture :</span><br>'.$invoiceDate.'</p>
                        <p><span class="label">Date d\'échéance :</span><br>'.$dueDate.'</p>
                        <p><span class="label">Référence client :</span><br>'.htmlspecialchars($data['reference'] ?? 'SIPA-'.date('Y').'-'.rand(1000, 9999)).'</p>
                    </div>
                </div>
                
                <table class="item-table">
                    <thead>
                        <tr>
                            <th class="col-num">N°</th>
                            <th class="col-desc">DESCRIPTION</th>
                            <th class="col-qty">QUANTITÉ</th>
                            <th class="col-price">PRIX UNITAIRE HT</th>
                            <th class="col-total">MONTANT HT</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        $itemCount = 1;
        
        // Add stand information
        if ($standTotal > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>'.$standTypeLabel.'</td>
                            <td>'.$area.' m²</td>
                            <td class="text-right">'.number_format($standPricePerM2, 2, ',', ' ').' €</td>
                            <td class="text-right">'.number_format($standTotal, 2, ',', ' ').' €</td>
                        </tr>';
            $itemCount++;
        }
        
        // Add electricity if applicable
        if ($electricityPrice > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>Électricité ('.$data['electricity'].' kW)</td>
                            <td>1</td>
                            <td class="text-right">'.number_format($electricityPrice, 2, ',', ' ').' €</td>
                            <td class="text-right">'.number_format($electricityPrice, 2, ',', ' ').' €</td>
                        </tr>';
            $itemCount++;
        }
        
        // Add facade if applicable
        if ($facadePrice > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>Façades supplémentaires ('.$data['facades'].' façades)</td>
                            <td>1</td>
                            <td class="text-right">'.number_format($facadePrice, 2, ',', ' ').' €</td>
                            <td class="text-right">'.number_format($facadePrice, 2, ',', ' ').' €</td>
                        </tr>';
            $itemCount++;
        }
        
        // Add publicity if applicable
        if ($publicityPrice > 0) {
            $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>Publicité catalogue - '.$publicityLabel.'</td>
                            <td>1</td>
                            <td class="text-right">'.number_format($publicityPrice, 2, ',', ' ').' €</td>
                            <td class="text-right">'.number_format($publicityPrice, 2, ',', ' ').' €</td>
                        </tr>';
            $itemCount++;
        }
    
        // Add selected products
        if (!empty($selectedProducts) && is_array($selectedProducts)) {
            foreach ($selectedProducts as $product) {
                if (isset($product['price'], $product['quantity'], $product['name'])) {
                    $productTotal = $product['price'] * $product['quantity'];
                    $html .= '
                        <tr>
                            <td>'.$itemCount.'</td>
                            <td>'.htmlspecialchars($product['name']).'</td>
                            <td>'.$product['quantity'].'</td>
                            <td class="text-right">'.number_format($product['price'], 2, ',', ' ').' €</td>
                            <td class="text-right">'.number_format($productTotal, 2, ',', ' ').' €</td>
                        </tr>';
                    $itemCount++;
                }
            }
        }
        
        $html .= '
                    </tbody>
                </table>
                
                <div class="totals">
                    <table>
                        <tr>
                            <td>Montant HT</td>
                            <td class="text-right">'.number_format($totalHT, 2, ',', ' ').' €</td>
                        </tr>
                        <tr>
                            <td>Taxes (19%)</td>
                            <td class="text-right">'.number_format($taxes, 2, ',', ' ').' €</td>
                        </tr>
                        <tr>
                            <td>Total TTC</td>
                            <td class="text-right">'.number_format($totalTTC, 2, ',', ' ').' €</td>
                        </tr>
                    </table>
                </div>
                
                <div class="amount-in-words">
                    Arrêtée la présente facture à la somme de : '.self::numberToWords($totalTTC).' Euros
                </div>
                
                <div class="stamp-signature">
                    <div class="stamp">
                        <p>Cachet</p>
                    </div>
                    <div class="signature">
                        <p>Signature</p>
                    </div>
                </div>
                
                <div class="invoice-notes">
                    <p><strong>Conditions de paiement :</strong> Paiement à réception de facture.</p>
                    <p><strong>Mode de paiement :</strong> Virement bancaire sur le compte indiqué ci-dessus.</p>
                    <p>Pour toute question concernant cette facture, veuillez contacter notre service comptabilité à <strong>comptabilite@sipa2025.com</strong></p>
                </div>
                
                <div class="footer">
                    <p>SIPA 2025 - Salon International de la pêche et de l\'Aquaculture | Page 1/1</p>
                </div>
            </div>
        </body>
        </html>';
        
        // Create PDF using dompdf
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Generate a unique filename with timestamp
        $filename = 'facture_' . time() . '_' . uniqid() . '.pdf';
        $filepath = TMP . 'pdfs' . DS . $filename;
        
        // Make sure directory exists
        if (!file_exists(TMP . 'pdfs')) {
            mkdir(TMP . 'pdfs', 0755, true);
        }
        
        // Save the PDF to file
        file_put_contents($filepath, $dompdf->output());
        
        return $filepath;
    }
       private static function numberToWords($number)
    {
        // This is a simplified version - you might want to use a library for this
        $formatter = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
        return ucfirst($formatter->format($number));
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
                    
                    <p>Pour toute question, n'hésitez pas à nous contacter à <a href='mailto:test@catalyst-dz.com'>test@catalyst-dz.com</a></p>
                </div>
            </body>
            </html>
        ";

        return $emailContent;
    }



    //-------------------------------------

    private function generatePDF(string $htmlContent, string $prefix = 'document'): string
    {
        // Create PDF using dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Generate a unique filename with timestamp
        $filename = $prefix . '_' . time() . '_' . uniqid() . '.pdf';
        $filepath = TMP . 'pdfs' . DS . $filename;

        // Make sure directory exists
        if (!file_exists(TMP . 'pdfs')) {
            mkdir(TMP . 'pdfs', 0755, true);
        }

        // Save the PDF to file
        file_put_contents($filepath, $dompdf->output());

        return $filepath;
    }

}
