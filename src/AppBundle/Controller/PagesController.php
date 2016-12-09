<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    /**
     * @Route("/inicio", name="inicio")
     */
    public function inicioAction(Request $request)
    {
        return $this->render('pages/inicio.html.twig', array());
    }
    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        return $this->render('pages/nosotros.html.twig', array());
    }
    /**
     * @Route("/contacto", name="contacto")
     */
    public function contactoAction(Request $request)
    {
        return $this->render('pages/contacto.html.twig', array());
    }
}
