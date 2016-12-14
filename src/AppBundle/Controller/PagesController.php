<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    public function getTheme(){
        $repositoryParameters = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefParameters");
        $repositoryThemes = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefThemes");

        $id_theme = $repositoryParameters->find(7)->getValue();
        $theme = $repositoryThemes->find($id_theme);

        return $theme;
    }

    public function getSectionsTheme(){
        $twig = new \Twig_Environment(new \Twig_Loader_String());


        $em = $this->getDoctrine()->getManager();
        $repositorySectionsTheme = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefSectionsTheme");
        $repositoryModules = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefModules");

        $theme = $this->getTheme();
        $sectionsTheme = $repositorySectionsTheme->findByIdTheme($theme->getId());
        foreach ($sectionsTheme as $sectionTheme) {
            $sectionTheme->modulos = $repositoryModules->findByIdSectionTheme($sectionTheme->getIdSectionTheme());
        }

        $data = array();
        $data["parameters"] = $this->getParameters(); 
        foreach ($sectionsTheme as $sectionTheme) {
            foreach ($sectionTheme->modulos as $modulo) {
                $modulo->renderContentHtml = $twig->render($modulo->getContentHtml(),$data);
            }
        }
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

    public function getParameters(){
        $em = $this->getDoctrine()->getManager();
        $repositoryParameters = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefParameters");

        $odb_parameters = $repositoryParameters->findAll();
        $parameters = array();

        foreach ($odb_parameters as $odb_parameter) {
            if( $odb_parameter->getCgroup() ){
                if( !array_key_exists ( $odb_parameter->getNgroup() , $parameters ) ){
                    $parameters[$odb_parameter->getNgroup()] = array();
                }

                array_push($parameters[$odb_parameter->getNgroup()], $odb_parameter->getValue());
                    
            }else{
                $parameters[$odb_parameter->getCparam()] = $odb_parameter->getValue();
            }
        }
        return (object)$parameters;
    }

    public function clean_string($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        $parameters = $this->getParameters();
        $theme = $this->getTheme();
        $sectionsTheme = $this->getSectionsTheme();
        

        return $this->render("themes/" . $theme->getSlug() . "/index.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "parameters" => $parameters,
            "theme" => $theme,
            "sectionsTheme" => $sectionsTheme,
            ));
    }

    /**
     * @Route("/articles/{id_article}", name="view_article_generic")
     */
    public function articleAction(Request $request,$id_article)
    {
        $cmsStzefMenuses = $this->getMenu();
        $parameters = $this->getParameters();
        $sectionsTheme = $this->getSectionsTheme();

        $em = $this->getDoctrine()->getManager();
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");
        $theme = $this->getTheme();

        $current_article = $repositoryArticles->find($id_article);

        $path_template = "themes/" . $theme->getSlug();
        if($current_article){
            $path_template .= "/article_detail.html.twig";
        }else{
            $path_template .= "/404.html.twig";
        }

        return $this->render($path_template, array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "current_article" => $current_article,
            "parameters" => $parameters,
            "sectionsTheme" => $sectionsTheme,
            "theme" => $theme,
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

        $parameters = $this->getParameters();
        $theme = $this->getTheme();


        $em = $this->getDoctrine()->getManager();
        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");

        $current_page = $repositoryPages->findOneBySlug($slug_page);
        dump($current_page);

        $articles = [];
        $path_template = "themes/" . $theme->getSlug();
        if($current_page){
            $path_template .= "/index.html.twig";
            $articles = $repositoryArticles->findByIdCategory($current_page->getCategoryToShow());
        }else{
            $path_template .= "/404.html.twig";
        }

        return $this->render($path_template, array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "current_page" => $current_page,
            "articles" => $articles,
            "sectionsTheme" => $sectionsTheme,
            "parameters" => $parameters,
            "theme" => $theme,
        ));
    }

}
