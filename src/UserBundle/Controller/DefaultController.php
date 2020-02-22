<?php

namespace UserBundle\Controller;

use GarderieBundle\Entity\Garderie;
use GarderieBundle\Form\GarderieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function ResponsableAction(Request $request)
    {
        {
            $garderie = new Garderie();
            $form = $this->createForm(GarderieType::class, $garderie);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($garderie);
                $em->flush();
                return $this->redirectToRoute('garderie_affiche');
            }

            return $this->render('@Garderie/Default/add.html.twig', array('form' => $form->createView()));

        }
    }
    public function AdminAction()
    {
        return $this->render('UserBundle::Page_Admin.html.twig');

    }
}
