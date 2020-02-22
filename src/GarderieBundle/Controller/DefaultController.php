<?php

namespace GarderieBundle\Controller;

use GarderieBundle\Entity\Garderie;
use GarderieBundle\Entity\Responsable;
use GarderieBundle\Form\GarderieType;
use GarderieBundle\Form\ResponsableType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GarderieBundle:Default:index.html.twig');
    }

    public function ajoutgarderieAction(Request $request)
    {
        $garderie = new Garderie();
        $form = $this->createForm(GarderieType::class, $garderie);
        $form->handleRequest($request);
        //$garderie->setCinResp(null);
        if ($form->isValid()) {
            /**
             * @var UploadedFile $file
             */
            $file=$garderie->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
           $file->move($this->getParameter('brochures_directory'),$fileName);
            $em = $this->getDoctrine()->getManager();
            $garderie->setCinResp($this->getUser());
            $garderie->setImage($fileName);
            $em->persist($garderie);
            $em->flush();
            return $this->redirectToRoute('garderie_affiche');
        }

        return $this->render('@Garderie/Default/add.html.twig', array('form' => $form->createView()));

    }
    public function AfficherAction(){
        $em=$this->getDoctrine()->getManager();
        $garderie=$em->getRepository('GarderieBundle:Garderie')->findAll();
        return $this->render('@Garderie/Default/affiche.html.twig',array('Garderie'=>$garderie ));
    }
    function DeleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $garderie=$em->getRepository(Garderie::class)
            ->find($id);
        $em->remove($garderie);
        $em->flush();
        return $this->redirectToRoute('garderie_affiche');

    }
    function UpdateAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $garderie=$em->getRepository(Garderie::class)
            ->find($id);

        $Form=$this->createForm(GarderieType::class,$garderie);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $file=$garderie->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('brochures_directory'),$fileName);
            $em = $this->getDoctrine()->getManager();
            $garderie->setImage($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($garderie);
            $em->flush();
            return $this->redirectToRoute('garderie_affiche');


        }
        return $this->render('@Garderie/Default/Update.html.twig',
            array('form'=>$Form->createView()));
    }
    /////
    public function ajoutresponsableAction(Request $request)
    {
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class,$responsable);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($responsable);
            $em->flush();
            return $this->redirectToRoute('garderie_afficheresponsable');
        }

        return $this->render('@Garderie/Default/addresp.html.twig', array('form' => $form->createView()));

    }
    public function AfficherResponsableAction(){
        $em=$this->getDoctrine()->getManager();
        $responsable=$em->getRepository('GarderieBundle:Responsable')->findAll();
        return $this->render('@Garderie/Default/afficheresp.html.twig',array('Responsable'=>$responsable ));
    }
    function DeleteResponsableAction($id){
        $em=$this->getDoctrine()->getManager();
        $responsable=$em->getRepository(Responsable::class)
            ->find($id);
        $em->remove($responsable);
        $em->flush();
        return $this->redirectToRoute('garderie_afficheresponsable');

    }
    function UpdateResponsableAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $responsable=$em->getRepository(Responsable::class)
            ->find($id);
        $Form=$this->createForm(ResponsableType::class,$responsable);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('garderie_afficheresponsable');


        }
        return $this->render('@Garderie/Default/Updateresp.html.twig',
            array('form'=>$Form->createView()));
    }
    public function mapAction()
    {
        return $this->render('GarderieBundle:Default:map.html.twig');
    }

    public function getListEnfantaPayerAction(Request $request)
    {

    }


}
