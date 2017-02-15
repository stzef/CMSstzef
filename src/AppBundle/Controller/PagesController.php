<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    public function getContentPage($page){
        $valParamStatePublication = 1;
        $valParamTypeAccess = 1;
        $em = $this->getDoctrine()->getManager();
        if($page->getIdTypePage()->getId() == 1){


            $queryArticles = $em->createQuery(
                'SELECT article FROM AppBundle:CmsStzefArticles article
                WHERE article.idStatePublication = :paramStatePublication AND article.idTypeAccess = :paramTypeAccess AND article.idCategory = :paramIdCategory'
            )->setParameter('paramStatePublication',$valParamStatePublication)
            ->setParameter('paramTypeAccess',$valParamTypeAccess)
            ->setParameter('paramIdCategory',$page->getCategoryToShow());

            $contentPage = $queryArticles->getResult();
        }else if ($page->getIdTypePage()->getId() == 2){
            $queryArticle = $em->createQuery(
                'SELECT article FROM AppBundle:CmsStzefArticles article
                WHERE article.idStatePublication = :paramStatePublication AND article.idTypeAccess = :paramTypeAccess AND article.id = :paramIdArticle'
            )->setParameter('paramStatePublication',$valParamStatePublication)
            ->setParameter('paramTypeAccess',$valParamTypeAccess)
            ->setParameter('paramIdArticle',$page->getArticleToShow());
            $contentPage = $queryArticle->setMaxResults(1)->getOneOrNullResult();
        }
        //dump($contentPage);
        return $contentPage;
    }

    public function getArticlesDistinguished(){
        $em = $this->getDoctrine()->getManager();
        $valParamStatePublication = 1;
        $valParamTypeAccess = 1;

        $queryArticles = $em->createQuery(
            'SELECT article FROM AppBundle:CmsStzefArticles article
            WHERE article.idStatePublication = :paramStatePublication AND article.idTypeAccess = :paramTypeAccess AND article.ifDistinguished = :paramIfDistinguished'
        )->setParameter('paramStatePublication',$valParamStatePublication)
        ->setParameter('paramTypeAccess',$valParamTypeAccess)
        ->setParameter('paramIfDistinguished',1);
        $articles = $queryArticles->getResult();

        return $articles;
    }

    public function getTheme(){
        $repositoryParameters = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefParameters");
        $repositoryThemes = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefThemes");

        $id_theme = $repositoryParameters->find(7)->getValue();
        $theme = $repositoryThemes->find($id_theme);

        return $theme;
    }

    public function getSectionsTheme(){
        $twig = new \Twig_Environment(new \Twig_Loader_String());

        $valParamStatePublication = 1;
        $valParamTypeAccess = 1;

        $em = $this->getDoctrine()->getManager();
        $repositorySectionsTheme = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefSectionsTheme");

        $theme = $this->getTheme();
        $sectionsTheme = $repositorySectionsTheme->findByIdTheme($theme->getId());
        foreach ($sectionsTheme as $sectionTheme) {

            $queryModulos = $em->createQuery(
                'SELECT modulo FROM AppBundle:CmsStzefModules modulo
                WHERE modulo.idStatePublication = :paramStatePublication AND modulo.idTypeAccess = :paramTypeAccess AND modulo.idSectionTheme = :paramIdSectionTheme'
            )->setParameter('paramStatePublication',$valParamStatePublication)
            ->setParameter('paramTypeAccess',$valParamTypeAccess)
            ->setParameter('paramIdSectionTheme',$sectionTheme->getIdSectionTheme());

            $sectionTheme->modulos = $queryModulos->getResult();
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

        $valParamIfMain = 1;
        $valParamStatePublication = 1;
        $valParamTypeAccess = 1;

        $queryMenuMain = $em->createQuery(
            'SELECT menu FROM AppBundle:CmsStzefMenus menu
            WHERE menu.ifMain = :paramIfMain AND menu.idStatePublication = :paramStatePublication AND menu.idTypeAccess = :paramTypeAccess
            ORDER BY menu.orden ASC'
        )->setParameter('paramIfMain', $valParamIfMain)->setParameter('paramStatePublication',$valParamStatePublication)->setParameter('paramTypeAccess',$valParamTypeAccess);

        $querySubMenu = $em->createQuery(
            'SELECT menu FROM AppBundle:CmsStzefMenus menu
            WHERE menu.idStatePublication = :paramStatePublication AND menu.idTypeAccess = :paramTypeAccess AND menu.topMenu = :paramTopMenu
            ORDER BY menu.orden ASC'
        )->setParameter('paramStatePublication',$valParamStatePublication)->setParameter('paramTypeAccess',$valParamTypeAccess);

        $cmsStzefMenuses = $queryMenuMain->getResult();

        foreach ($cmsStzefMenuses as $cmsStzefMenu) {
            $subMenus = $querySubMenu->setParameter('paramTopMenu', $cmsStzefMenu->getid())->getResult();
            $cmsStzefMenu->subMenus = $subMenus;
            foreach ($subMenus as $subMenu) {
                $subMenus = $querySubMenu->setParameter('paramTopMenu', $subMenu->getid())->getResult();
                $subMenu->subMenus = $subMenus;
            }
        }
        return $cmsStzefMenuses;
    }

    public function getMainBanner(){
        $repositoryBanners = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefBanners");
        $repositoryBannerDeta = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefBannerDeta");

        $banner = $repositoryBanners->findOneByIfMain(1);
        $banner->deta = $repositoryBannerDeta->findByCmsStzefBanners($banner->getId());
        dump($banner);
        return $banner;
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
    public function indexAction(Request $request){
        $cmsStzefMenuses = $this->getMenu();
        $parameters = $this->getParameters();
        $theme = $this->getTheme();
        $sectionsTheme = $this->getSectionsTheme();

        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");

        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");


        $current_page = $repositoryPages->findOneByIfMain(1);
        $path_template = "themes/" . $theme->getSlug();

        $articles = [];
        if($current_page){
            $path_template .= "/index.html.twig";
            $articles = $this->getContentPage($current_page);

            if($current_page->getIdStatePublication()->getId() != 1){
                $path_template = "themes/" . $theme->getSlug() . "/despublicado.html.twig";
            }else if($current_page->getIdTypeAccess()->getId() != 1){
                $path_template = "themes/" . $theme->getSlug() . "/sin_permisos.html.twig";
            }
        }else{
            $path_template .= "/404.html.twig";
        }

        return $this->render("themes/" . $theme->getSlug() . "/index.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses,
            "parameters" => $parameters,
            "theme" => $theme,
            "sectionsTheme" => $sectionsTheme,
            "articles_distinguished" => $this->getArticlesDistinguished(),
            "current_page" => $current_page,
            "articles" => $articles,
            "main_banner" => $this->getMainBanner(),

            ));


    }

    /**
     * @Route("/articles/{id_article}", name="view_article_generic")
     */
    public function articleAction(Request $request,$id_article){
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

            if($current_article->getIdStatePublication()->getId() != 1){
                $path_template = "themes/" . $theme->getSlug() . "/despublicado.html.twig";
            }else if($current_article->getIdTypeAccess()->getId() != 1){
                $path_template = "themes/" . $theme->getSlug() . "/sin_permisos.html.twig";
            }
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
    public function pageAction(Request $request,$slug_page){

        $slug_page = $this->clean_string($slug_page);
        $cmsStzefMenuses = $this->getMenu();
        $sectionsTheme = $this->getSectionsTheme();

        $parameters = $this->getParameters();
        $theme = $this->getTheme();


        $em = $this->getDoctrine()->getManager();
        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");

        $current_page = $repositoryPages->findOneBySlug($slug_page);

        $main_banner = $this->getMainBanner();


        $articles = [];
        $path_template = "themes/" . $theme->getSlug();
        if($current_page){
            $path_template .= "/index.html.twig";
            $articles = $this->getContentPage($current_page);

            if($current_page->getIdStatePublication()->getId() != 1){
                $path_template = "themes/" . $theme->getSlug() . "/despublicado.html.twig";
            }else if($current_page->getIdTypeAccess()->getId() != 1){
                $path_template = "themes/" . $theme->getSlug() . "/sin_permisos.html.twig";
            }

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
            "articles_distinguished" => $this->getArticlesDistinguished(),
            "main_banner" => $main_banner,
        ));
    }

}
