<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;
use Cake\Mailer\Mailer;


use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 */
class EmailsController extends AppController
{
   

   
   
    public function national()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
    
            $mailer = new Mailer('default');
            $mailer
                ->setTo('test@catalyst-dz.com') // ou n’importe quel destinataire
                ->setEmailFormat('html')
                ->setSubject('Nouvelle demande de réservation - National')
                ->deliver($this->buildMessage($data));
    
            $this->Flash->success('Formulaire envoyé avec succès.');
            return $this->redirect($this->referer());
        }
    }
    private function buildMessage(array $data): string
{
    return "
        <h3>Informations sur l'entreprise</h3>
        <p><strong>Raison Sociale:</strong> {$data['company_name']}</p>
        <p><strong>Secteur d'activité:</strong> {$data['activity_sector']}</p>
        <p><strong>Registre de commerce Nº:</strong> {$data['registry_number']}</p>
        <p><strong>Identifiant fiscal:</strong> {$data['tax_id']}</p>
        <p><strong>Adresse:</strong> {$data['address']}, {$data['city']}, {$data['country']}</p>
        <p><strong>Personne à contacter:</strong> {$data['contact_person']}</p>
        <p><strong>Tél.:</strong> {$data['phone']}</p>
        <p><strong>Fax:</strong> {$data['fax']}</p>
        <p><strong>Mobile:</strong> {$data['mobile']}</p>
        <p><strong>Email:</strong> {$data['email']}</p>
        <p><strong>Site Web:</strong> {$data['website']}</p>

        <h3>Réservation de Stand</h3>
        <p><strong>Type de stand:</strong> {$data['stand_type']}</p>
        <p><strong>Electricité:</strong> {$data['electricity']}</p>
        <p><strong>Superficie demandée:</strong> {$data['area']} m²</p>
        <p><strong>Façades:</strong> {$data['facades']}</p>
        <p><strong>Électricité obligatoire:</strong> " . (!empty($data['electricity_required']) ? 'Oui' : 'Non') . "</p>
    ";
}
private function buildEmailContent(array $data, ?string $filename): string
{
    $fields = [
        'Nom entreprise' => 'company_name',
        'Secteur d\'activité' => 'activity_sector',
        'Registre de commerce' => 'registry_number',
        'Identifiant fiscal' => 'tax_id',
        'Adresse' => 'address',
        'Ville' => 'city',
        'Pays' => 'country',
        'Personne à contacter' => 'contact_person',
        'Tél.' => 'phone',
        'Fax' => 'fax',
        'Mobile' => 'mobile',
        'Email' => 'email',
        'Site Web' => 'website',
        'Numéro passeport' => 'passport_number',
        'Date émission' => 'issue_date',
        'Date expiration' => 'expiry_date',
        'Autorité émettrice' => 'authority',
        'Objet de visite' => 'purpose_of_visit',
        'Poste' => 'job_title',
        'Date arrivée' => 'arrival_date',
        'Date départ' => 'departure_date',
    ];

    $content = "<h3>Nouvelle demande de visa</h3><ul>";
    foreach ($fields as $label => $key) {
        $value = isset($data[$key]) ? h($data[$key]) : '';
        $content .= "<li><strong>$label:</strong> $value</li>";
    }

    $content .= "</ul>";
    return $content;
}

public function visa()
{
    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Send email
        $mailer = new Mailer('default');
        $mailer->setFrom(['noreply@votre-domaine.com' => 'Visa Formulaire'])
            ->setTo('contact@votre-domaine.com')
            ->setSubject('Nouvelle soumission de visa')
            ->deliver($this->buildEmailContent($data, null)); // Pas de fichier à envoyer

        $this->Flash->success(__('Formulaire soumis avec succès.'));
        return $this->redirect('/');
    }
}


}
