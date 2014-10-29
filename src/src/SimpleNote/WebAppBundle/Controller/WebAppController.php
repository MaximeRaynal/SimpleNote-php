<?php

namespace SimpleNote\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebAppController extends Controller
{
    public function indexAction()
    {
        return $this->render('SimpleNoteWebAppBundle:Global:layout.html.twig');
    }

    /**
     * Cette méthode permet de récupérer les templates d'Angular JS
     * Même si l'on force la publication dans web, l'URL Rewriting
     * peut empêcher une bonne récupération des templates.
     * Cette méthode capte l'appel et va chercher la vue dans le dossier
     * Resources/public/views/ de ce Bundle et renvoi la vu correspondate
     */
    public function resourcesAction($resources) {
        $prePath = dirname(__FILE__) . '/../Resources/public/views/';

        // L'utilisation de realpath permet de supprimer les accès relatif (..)
        // qui font planter file_get_contents
        return new Response(
                        file_get_contents(realpath($prePath . $resources)));
    }
}
