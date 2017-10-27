<?php

namespace BirraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
     * @Route("/cerveza/{id}", name="searchCerveza") 
     */
    public function showAction($id)
    {
        $birra = $this->getDoctrine()->getRepository('BirraBundle:Cerveza')->findById($id);
        
        return $this->render('BirraBundle:Default:cerveza-list.html.twig', array('birra' => $birra));
    }
}
