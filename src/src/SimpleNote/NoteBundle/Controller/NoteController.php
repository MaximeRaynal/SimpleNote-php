<?php

namespace SimpleNote\NoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

use SimpleNote\NoteBundle\Entity\Note;
use SimpleNote\NoteBundle\Service\PageLoader;

class NoteController extends Controller
{
    /**
     * Renvoies toutes les notes disponibles pour l'utilisateur
     */
    public function notesListAction() {
        $notes = $this->getDoctrine()->
                        getRepository('SimpleNoteNoteBundle:Note')->findAll();
        return new Response(json_encode($notes), 200);
    }

    /**
     * Renvoies tous les tags des notes de l'utilisateurs
     * Il s'agit de la première version, il sera plus performent de
     * procéder avec une jointure
     */
    public function tagsListAction() {
        $notes = $this->getDoctrine()->
                        getRepository('SimpleNoteNoteBundle:Note')->findAll();
        $tags = array();
        foreach ($notes as $note) {
            $tags = array_merge($tags, $note->getTags()->toArray());
        }

        $tags = array_unique($tags, SORT_STRING);

        return new Response(json_encode($tags), 200);
    }

    /**
     * Retourne une note avec la liste de ces page charé
     * @ParamConverter("note", class="SimpleNoteNoteBundle:Note")
     */
    public function noteByIdAction(Note $note) {

        $pageLoader = $this->get('pageLoader');

        $pageLoader->loadPages($note);

        return new Response(json_encode($note), 200);
    }
}
