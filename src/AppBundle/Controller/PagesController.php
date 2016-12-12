<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    public function getMenu(){
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefMenus");

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
    public function clean_string($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    /**
     * @Route("/{slug_page}", name="page_generic")
     */
    public function pageAction(Request $request,$slug_page)
    {
        $slug_page = $this->clean_string($slug_page);
        $cmsStzefMenuses = $this->getMenu();

        $em = $this->getDoctrine()->getManager();
        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");

        $current_page = $repositoryPages->find($slug_page);

        if($current_page){
            $path_template = "pages/inicio.html.twig";
        }else{
            $path_template = "pages/inicio.html.twig";
        }

        $articles = $repositoryArticles->findByIdCategory($current_page->getCategoryToShow());

        dump($articles);

        return $this->render("pages/inicio.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "current_page" => $current_page,
            "articles" => $articles,
        ));
    }

    /**
     * @Route("/{slug_page}", name="page_inicio")
     */
    /*public function inicioAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        $page_id = $request->get("page_id");
        dump($page_id);

        return $this->render("pages/inicio.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses
            ));
    }*/
    /**
     * @Route("/nosotros", name="page_nosotros")
     */
    /*public function nosotrosAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        return $this->render("pages/nosotros.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses
        ));
    }*/
    /**
     * @Route("/contacto", name="page_contacto")
     */
    /*public function contactoAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        return $this->render("pages/contacto.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses
        ));
    }*/
    /**
     * @Route("/producto_1", name="page_producto_1")
     */
    /*public function producto1Action(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        return $this->render("pages/producto1.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses
        ));
    }*/
}
