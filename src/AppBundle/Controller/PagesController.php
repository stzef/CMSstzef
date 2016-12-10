<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    public function getMenu(){
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:CmsStzefMenus');

        $cmsStzefMenuses = $repository->findByIfMain("1");

        foreach ($cmsStzefMenuses as $cmsStzefMenu) {
            $subMenus = $repository->findByTopMenu($cmsStzefMenu->getid());
            $cmsStzefMenu->subMenus = $subMenus;
            foreach ($subMenus as $subMenu) {
                $subMenus = $repository->findByTopMenu($subMenu->getid());
                $subMenu->subMenus = $subMenus;
            }
        }
        return $cmsStzefMenuses;
    }
    /**
     * @Route("/inicio", name="page_inicio")
     */
    public function inicioAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();

        return $this->render('pages/inicio.html.twig', array(
            "cmsStzefMenuses" => $cmsStzefMenuses
            ));
    }
    /**
     * @Route("/nosotros", name="page_nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        return $this->render('pages/nosotros.html.twig', array(
            "cmsStzefMenuses" => $cmsStzefMenuses
        ));
    }
    /**
     * @Route("/contacto", name="page_contacto")
     */
    public function contactoAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        return $this->render('pages/contacto.html.twig', array(
            "cmsStzefMenuses" => $cmsStzefMenuses
        ));
    }
    /**
     * @Route("/producto_1", name="page_producto_1")
     */
    public function producto1Action(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        return $this->render('pages/producto1.html.twig', array(
            "cmsStzefMenuses" => $cmsStzefMenuses
        ));
    }
}
