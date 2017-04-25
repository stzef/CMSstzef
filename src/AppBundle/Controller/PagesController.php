<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        $this->get('app.fns')->newVisitPage($em);

        $messages = array();
        if (array_key_exists("messages", $_GET)){
            $messages = $_GET["messages"];
        }

        $cmsStzefMenuses = $this->get('app.fns')->getMenu($em);
        $parameters = $this->get('app.fns')->getParameters($em);
        $theme = $this->get('app.fns')->getTheme($em);
        $sectionsTheme = $this->get('app.fns')->getSectionsTheme($em);

        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");

        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");


        $current_page = $repositoryPages->findOneByIfMain(1);
        $params = $current_page->getParams();
        $current_page->parameters = json_decode($params);

        $path_template = "themes/" . $theme->getSlug();

        $articles = [];
        if($current_page){
            $path_template .= "/index.html.twig";
            $articles = $this->get('app.fns')->getContentPage($current_page,$em);

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
            "articles_distinguished" => $this->get('app.fns')->getArticlesDistinguished($em),
            "current_page" => $current_page,
            "articles" => $articles,
            "main_banner" => $this->get('app.fns')->getMainBanner($em),
            "messages" => $messages,
            ));


    }

    /**
     * @Route("/articles/{id_article}", name="view_article_generic")
     */
    public function articleAction(Request $request,$id_article){

        $em = $this->getDoctrine()->getManager();

        $this->get('app.fns')->newVisitPage($em);

        $cmsStzefMenuses = $this->get('app.fns')->getMenu($em);
        $parameters = $this->get('app.fns')->getParameters($em);
        $sectionsTheme = $this->get('app.fns')->getSectionsTheme($em);

        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");
        $theme = $this->get('app.fns')->getTheme($em);

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
        $em = $this->getDoctrine()->getManager();

        $this->get('app.fns')->newVisitPage($em);

        $gallery = null;
        $slug_page = $this->get('app.fns')->clean_string($slug_page);
        $cmsStzefMenuses = $this->get('app.fns')->getMenu($em);
        $sectionsTheme = $this->get('app.fns')->getSectionsTheme($em);

        $parameters = $this->get('app.fns')->getParameters($em);
        $theme = $this->get('app.fns')->getTheme($em);


        $repositoryPages = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefPages");
        $repositoryArticles = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefArticles");

        $current_page = $repositoryPages->findOneBySlug($slug_page);
        $params = $current_page->getParams();
        $current_page->parameters = json_decode($params);

        $main_banner = $this->get('app.fns')->getMainBanner($em);

        $articles = [];
        $path_template = "themes/" . $theme->getSlug();
        if($current_page){
            $path_template .= "/index.html.twig";
            $articles = $this->get('app.fns')->getContentPage($current_page,$em);

            if($current_page->getIdTypePage()->getId() == 4){
                $gallery = $this->get('app.fns')->getBanner($em,$current_page->parameters->idBanner);
            }
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
            "gallery" => $gallery,
            "articles_distinguished" => $this->get('app.fns')->getArticlesDistinguished($em),
            "main_banner" => $main_banner,
        ));
    }

}
