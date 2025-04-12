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
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        $this->viewBuilder()->setLayout('main');
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }


    public function lalgerie()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'L\'Algérie');
        $this->set('description', 'Description de la page L\'Algérie');
        $this->set('keywords', 'Mots-clés, Algérie, salon');
    }
    public function presentationdesalon()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Présentation de salon');
        $this->set('description', 'Description de la page présentation de salon');
        $this->set('keywords', 'Mots-clés, présentation, salon');
    }
    public function presentationdesecteur()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Présentation de secteur');
        $this->set('description', 'Description de la page présentation de secteur');
        $this->set('keywords', 'Mots-clés, présentation, secteur');
    }
    public function fichetechniquesalon()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Fiche technique de salon');
        $this->set('description', 'Description de la page fiche technique de salon');
        $this->set('keywords', 'Mots-clés, fiche technique, salon');
    }
    public function espaceexposant()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Espace exposant');
        $this->set('description', 'Description de la page espace exposant');
        $this->set('keywords', 'Mots-clés, espace, exposant');
    }
    public function exposantnational()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Exposant national');
        $this->set('description', 'Description de la page exposant national');
        $this->set('keywords', 'Mots-clés, exposant, national');
    }
    public function exposantinternational()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Exposant international');
        $this->set('description', 'Description de la page exposant international');
        $this->set('keywords', 'Mots-clés, exposant, international');
    }
    public function epaiement()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'E-paiement');
        $this->set('description', 'Description de la page e-paiement');
        $this->set('keywords', 'Mots-clés, e-paiement');
    }
    public function plan()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Plan du salon');
        $this->set('description', 'Description de la page plan du salon');
        $this->set('keywords', 'Mots-clés, plan, salon');
    }
    public function editionprecedente()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Édition précédente');
        $this->set('description', 'Description de la page édition précédente');
        $this->set('keywords', 'Mots-clés, édition, précédente');
    }
    public function galeriephotos()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Galerie photos');
        $this->set('description', 'Description de la page galerie photos');
        $this->set('keywords', 'Mots-clés, galerie, photos');
    }
    public function galerievideos()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Galerie vidéos');
        $this->set('description', 'Description de la page galerie vidéos');
        $this->set('keywords', 'Mots-clés, galerie, vidéos');
    }
    public function contact()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Contact');
        $this->set('description', 'Description de la page contact');
        $this->set('keywords', 'Mots-clés, contact');
    }
    public function invitationvisa()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Invitation visa');
        $this->set('description', 'Description de la page invitation visa');
        $this->set('keywords', 'Mots-clés, invitation, visa');
    }
    public function formulaireinscription()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Formulaire d\'inscription');
        $this->set('description', 'Description de la page formulaire d\'inscription');
        $this->set('keywords', 'Mots-clés, formulaire, inscription');
    }

    public function formulaireinscriptionnational()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'Formulaire d\'inscription national');
        $this->set('description', 'Description de la page formulaire d\'inscription national');
        $this->set('keywords', 'Mots-clés, formulaire, inscription, national');
    }

    public function reservationstand()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'page cards de l\'inscriptionToEvent');
        $this->set('description', 'Description de la page L\'Algérie');
        $this->set('keywords', 'Mots-clés, event, sipa');
    }

    public function formulairevisa()
    {
        $this->viewBuilder()->setLayout('main');
        $this->set('title', 'formulairevisa');
        $this->set('description', 'formulairevisa');
        $this->set('keywords', 'formulairevisa');
    }
}
