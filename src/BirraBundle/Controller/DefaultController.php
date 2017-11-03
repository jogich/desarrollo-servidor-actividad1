<?php

namespace BirraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BirraBundle\Entity\Cerveza;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/cerveza/{id}", name="searchCerveza") 
     */
    public function showAction($id)
    {
        $birra = $this->getDoctrine()->getRepository('BirraBundle:Cerveza')->findById($id);
        
        return $this->render('BirraBundle:Default:cerveza-search.html.twig', array('birra' => $birra));
    }

    /**
     * @Route("/crear/{nombre}/{pais}/", name="newCerveza")
     */
    public function createAction($nombre = "Turia",$pais = "España",$poblacion = "Valencia",$tipo = "Tostada",$importacion = "Alemania",$tamanyo = 1,$fecha = "2017-11-03",$cantidad = 5,$foto = "img")
    {
            $cerveza = new Cerveza();

            $cerveza->setNombre($nombre);
            $cerveza->setPais($pais);
            $cerveza->setPoblacion($poblacion);
            $cerveza->setTipo($tipo);
            $cerveza->setTamanyo($tamanyo);
            $cerveza->setImportacion($importacion);
            $cerveza->setFechaAlmacen(new \DateTime($fecha));
            $cerveza->setCantidad($cantidad);
            $cerveza->setFoto($foto);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cerveza);
            $em->flush($cerveza);


        return $this->render('BirraBundle:Default:cerveza-new.html.twig');
    }
}
