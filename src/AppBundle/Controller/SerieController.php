<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Serie;
use AppBundle\Form\SerieType;

class SerieController extends Controller
{
    /**
     * @Route("/serie/{id}", name="serie_index")
     */
    public function indexAction(Request $request)
    {
     return $this->render('Serie/view.html.twig');
    }
    
    /**
     * @Route("/serie/add", name="serie_add")
     */ 
    public function addAction(Request $request)
    {
       $serie = new Serie();
       $form = $this->get('form.factory')->create(new SerieType(), $serie);
       
       $form->handleRequest($request);
       
       if($form->isValid())
       {
           $em = $this->getDoctrine()->getManager();
           $em->persist($serie);
           $em->flush();
           
           $request->getSession()->getFlashBag()->add('notice', 'Serie correctement enregistrée');
            
            return $this->redirect($this->generateUrl('serie_index', ['id' => $serie->getId()]));
       } 
       
       return $this->render(
           'Serie/add.html.twig',
           ['form' => $form->createView()]
           ); 
    }
}
