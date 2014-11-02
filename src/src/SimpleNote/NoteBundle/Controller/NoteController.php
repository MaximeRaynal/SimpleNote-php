<?php

namespace SimpleNote\NoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
}
