<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Front/layoutFront.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    public function ParentAction()
    {
        return $this->render('UserBundle::Page_Parent.html.twig');
    }
    public function ResponsableAction()
    {
        return $this->render('UserBundle::Page_Responsable.html.twig');
    }
    public function AdminAction()
    {
        return $this->render('UserBundle::Page_Admin.html.twig');
    }
}
