<?php

namespace UserBundle\Controller;

use EnfantBundle\Entity\enfant;
use EnfantBundle\Entity\suivi;
use EnfantBundle\Form\enfantType;
use EnfantBundle\Form\suiviType;
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
    public function ParentAction(Request $request)
    {
        $enfant= new enfant();
        $form=$this->createForm(enfantType::class,$enfant);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('@Enfant/Default/ajoutEnfant.html.twig',array('form'=>$form->createView()));
    }
    public function ResponsableAction(Request $request)
    {
        {
            $suivi= new suivi();
            $form=$this->createForm(suiviType::class,$suivi);
            $form->handleRequest($request);


            if($form->isSubmitted())
            {
                if(($suivi->getNoteAnglais()+$suivi->getNoteFrancais()+$suivi->getNoteInfo())/3>10 and ($suivi->getNoteAnglais()+$suivi->getNoteFrancais()+$suivi->getNoteInfo())/3<15)
                    $suivi->setEvaluation('moyenne');
                if(($suivi->getNoteAnglais()+$suivi->getNoteFrancais()+$suivi->getNoteInfo())/3<10)
                    $suivi->setEvaluation('faible');
                if(($suivi->getNoteAnglais()+$suivi->getNoteFrancais()+$suivi->getNoteInfo())/3>15)
                    $suivi->setEvaluation('excellent');
                $em=$this->getDoctrine()->getManager();
                $em->persist($suivi);
                $em->flush();

            }
            return $this->render('@Enfant/Default/ajoutSuivi.html.twig',array('form'=>$form->createView()));
        }
    }
    public function AdminAction()
    {
        return $this->render('UserBundle::Page_Admin.html.twig');
    }
}
