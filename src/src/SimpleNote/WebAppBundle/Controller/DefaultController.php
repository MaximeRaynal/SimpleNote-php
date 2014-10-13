<?php

namespace SimpleNote\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SimpleNoteWebAppBundle:Default:index.html.twig');
    }
}
