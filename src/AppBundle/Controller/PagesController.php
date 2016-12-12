<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    public function getSectionsTheme(){
        $em = $this->getDoctrine()->getManager();
        $repositoryParameters = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefParameters");
        $repositoryThemes = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefThemes");
        $repositorySectionsTheme = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefSectionsTheme");
        $repositoryModules = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefModules");

        $id_theme = $repositoryParameters->find(7)->getValue();
        $theme = $repositoryThemes->find($id_theme);
        $sectionsTheme = $repositorySectionsTheme->findByIdTheme($theme->getId());
        foreach ($sectionsTheme as $sectionTheme) {
            $sectionTheme->modulos = $repositoryModules->findByIdSectionTheme($sectionTheme->getIdSectionTheme());
        }
        dump($sectionsTheme);

        return $sectionsTheme;
    }
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
     * @Route("/articles/{id_article}", name="view_article_generic")
     */
    public function articleAction(Request $request,$id_article)
    {
        $cmsStzefMenuses = $this->getMenu();

        $em = $this->getDoctrine()->getManager();
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");

        $current_article = $repositoryArticles->find($id_article);

        if($current_article){
            $path_template = "pages/article_detail.html.twig";
        }else{
            $path_template = "pages/404.html.twig";
        }

        return $this->render($path_template, array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "current_article" => $current_article,
        ));
    }

    /**
     * @Route("/{slug_page}", name="page_generic")
     */
    public function pageAction(Request $request,$slug_page)
    {
        $slug_page = $this->clean_string($slug_page);
        $cmsStzefMenuses = $this->getMenu();
        $sectionsTheme = $this->getSectionsTheme();

        //dump($sectionsTheme);

        $em = $this->getDoctrine()->getManager();
        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");

        $current_page = $repositoryPages->find($slug_page);

        if($current_page){
            $path_template = "pages/inicio.html.twig";
            $articles = $repositoryArticles->findByIdCategory($current_page->getCategoryToShow());
        }else{
            $path_template = "pages/404.html.twig";
            $articles = [];
        }

        return $this->render($path_template, array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "current_page" => $current_page,
            "articles" => $articles,
            "sectionsTheme" => $sectionsTheme,
        ));
    }

}
