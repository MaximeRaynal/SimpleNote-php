<?php

namespace SimpleNote\NoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SimpleNoteNoteBundle:Default:index.html.twig', array('name' => $name));
    }
}
