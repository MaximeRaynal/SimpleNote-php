<?php

namespace SimpleNote\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebAppController extends Controller
{
    public function indexAction()
    {
        return $this->render('SimpleNoteWebAppBundle:Default:index.html.twig');
    }
}
