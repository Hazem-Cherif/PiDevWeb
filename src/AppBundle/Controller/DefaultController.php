<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/backOffice", name="homeptage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Back/layoutBack.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/", name="homepageFront")
     */
    public function indexFrontAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Front/layoutFront.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
