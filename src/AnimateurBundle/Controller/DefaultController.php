<?php

namespace AnimateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AnimateurBundle:Default:index.html.twig');
    }
}
