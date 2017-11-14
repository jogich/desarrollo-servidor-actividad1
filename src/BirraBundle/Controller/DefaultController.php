<?php

namespace BirraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BirraBundle\Entity\Cerveza;
use Symfony\Component\HttpFoundation\Request;
use BirraBundle\Form\CervezaType;
use \DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BirraBundle:Default:index.html.twig');
    }

    /**
     * @Route("/cerveza/", name="searchCerveza") 
     */
    public function showAction()
    {
        $birra = $this->getDoctrine()->getRepository('BirraBundle:Cerveza')->findAll();
        
        return $this->render('BirraBundle:Default:cerveza-search.html.twig', array('birra' => $birra));
    }

    /**
     * @Route("/crear/", name="newCerveza")
     */
    public function createAction(Request $request)
    {
            $cerveza = new Cerveza();
            $form = $this->createForm(CervezaType::class, $cerveza);
            
            $form->handleRequest($request);
            if ($form->isValid() && $form->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($cerveza);
                $em->flush();

                return $this->redirectToRoute('cerveza-list');
            }


        return $this->render('BirraBundle:Default:cerveza-new.html.twig', array('cerveza_new' => $form->createView()));
    }
}
