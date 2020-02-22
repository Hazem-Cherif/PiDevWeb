<?php

namespace UserBundle\Controller;

use ClubBundle\Entity\club;
use ClubBundle\Form\clubType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction()
    {

        return $this->render('@Club/Default/layoutFront.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);



    }
    public function ParentAction()
    {
        return $this->render('@Club/Default/layoutFront.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
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
