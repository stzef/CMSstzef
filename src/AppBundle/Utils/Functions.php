<?php
namespace AppBundle\Utils;
class Functions
{
    public function getContentPage($page,$em){
        #$em = $this->getDoctrine()->getManager();

        $valParamStatePublication = 1;
        $valParamTypeAccess = 1;
        $contentPage = array();
        if($page->getIdTypePage()->getId() == 1 or $page->getIdTypePage()->getId() == 6){
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
        if($page->getIdTypePage()->getId() == 7){
            $repositoryCategories = $em->getRepository("AppBundle:CmsStzefCategories");
            $contentPage = $repositoryCategories->findByTopCategory($page->getCategoryToShow());

            foreach ($contentPage as $grupo) {
                $grupo->materias = $repositoryCategories->findByTopCategory($grupo->getId());
                foreach ($grupo->materias as $materia) {
                    $materia->tareas = $em->createQuery(
                        'SELECT article FROM AppBundle:CmsStzefArticles article
                        WHERE article.idStatePublication = :paramStatePublication AND article.idTypeAccess = :paramTypeAccess AND article.idCategory = :paramIdCategory'
                    )->setParameter('paramStatePublication',$valParamStatePublication)
                    ->setParameter('paramTypeAccess',$valParamTypeAccess)
                    ->setParameter('paramIdCategory',$materia->getId())->getResult();
                }
            }

            //dump($contentPage);exit();
        }
        if($page->getIdTypePage()->getId()== 8){
            $repositoryArticles = $em->getRepository("AppBundle:CmsStzefArticles");
            $repositoryContract = $em->getRepository("AppBundle:CmsStzefContracts");
            $contentPage = $repositoryArticles->findByIdCategory($page->getCategoryToShow());
            foreach ($contentPage as $article) {
                $idcontract = json_decode($article->getParams())->contract;
                $article->contrato = $repositoryContract->findOneById($idcontract);
            }
        }
        return $contentPage;
    }

    public function newVisitPage($em){
        $repositoryParameters = $em->getRepository("AppBundle:CmsStzefParameters");

        $numberVisits = $repositoryParameters->findOneByCparam("number_visit");
        $numberVisits->setValueInt( $numberVisits->getValueInt() + 1 );
        $em->persist($numberVisits);
        $em->flush($numberVisits);
    }
    public function getArticlesDistinguished($em){
        #$em = $this->getDoctrine()->getManager();
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

    public function getTheme($em){
        #$em = $this->getDoctrine()->getManager();
        $repositoryParameters = $em->getRepository("AppBundle:CmsStzefParameters");
        $repositoryThemes = $em->getRepository("AppBundle:CmsStzefThemes");

        $id_theme = $repositoryParameters->find(7)->getValue();
        $theme = $repositoryThemes->find($id_theme);

        return $theme;
    }

    public function getSectionsTheme($em){
        #$em = $this->getDoctrine()->getManager();
        $twig = new \Twig_Environment(new \Twig_Loader_String());

        $loader = new \Twig_Loader_Filesystem('../app/Resources/views/');
        $twig_files = new \Twig_Environment($loader);

        $valParamStatePublication = 1;
        $valParamTypeAccess = 1;

        $repositorySectionsTheme = $em->getRepository("AppBundle:CmsStzefSectionsTheme");

        $theme = $this->getTheme($em);
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
        $data["parameters"] = $this->getParameters($em);
        foreach ($sectionsTheme as $sectionTheme) {
            foreach ($sectionTheme->modulos as $modulo) {
                $data["parametersModule"] = json_decode($modulo->getParams());
                if ( $modulo->getIdTypeModule()->getId() == 1 ){
                    $modulo->renderContentHtml = $twig->render($modulo->getContentHtml(),$data);
                }
                if ( $modulo->getIdTypeModule()->getId() == 2 ){
                    $repositoryCategories = $em->getRepository("AppBundle:CmsStzefCategories");
                    $repositoryArticles = $em->getRepository("AppBundle:CmsStzefArticles");
                    $category = $repositoryCategories->find($data["parametersModule"]->category);
                    $category->articles = $repositoryArticles->findByIdCategory($category,array($data["parametersModule"]->order->field => $data["parametersModule"]->order->order),$data["parametersModule"]->limit);
                    $template = $twig_files->load("/themes/" . $theme->getSlug() . "/partials/types_modules/2_category.html.twig");
                    $modulo->renderContentHtml = $template->render(array("category"=>$category));
                }
            }
        }
        return $sectionsTheme;
    }

    public function getMenu($em){


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
            WHERE menu.ifMain != :paramIfMain AND menu.idStatePublication = :paramStatePublication AND menu.idTypeAccess = :paramTypeAccess AND menu.topMenu = :paramTopMenu
            ORDER BY menu.orden ASC'
        )->setParameter('paramIfMain', $valParamIfMain)->setParameter('paramStatePublication',$valParamStatePublication)->setParameter('paramTypeAccess',$valParamTypeAccess);

        $cmsStzefMenuses = $queryMenuMain->getResult();

        foreach ($cmsStzefMenuses as $cmsStzefMenu) {
            $subMenus = $querySubMenu->setParameter('paramTopMenu', $cmsStzefMenu->getid())->getResult();
            $cmsStzefMenu->subMenus = $subMenus;
            $cmsStzefMenu->getPage()->parameters = json_decode($cmsStzefMenu->getPage()->getParams());
            foreach ($subMenus as $subMenu) {
                $subMenus = $querySubMenu->setParameter('paramTopMenu', $subMenu->getid())->getResult();
                $subMenu->getPage()->parameters = json_decode($subMenu->getPage()->getParams());
                $subMenu->subMenus = $subMenus;
            }
        }
        return $cmsStzefMenuses;
    }

    public function getMainBanner($em){
        #$em = $this->getDoctrine()->getManager();
        $repositoryBanners = $em->getRepository("AppBundle:CmsStzefBanners");
        $repositoryBannerDeta = $em->getRepository("AppBundle:CmsStzefBannerDeta");

        $banner = $repositoryBanners->findOneByIfMain(1);
        $banner->deta = $repositoryBannerDeta->findByCmsStzefBanners($banner->getId());
        return $banner;
    }

    public function getBanner($em,$idBanner){
        #$em = $this->getDoctrine()->getManager();
        $repositoryBanners = $em->getRepository("AppBundle:CmsStzefBanners");
        $repositoryBannerDeta = $em->getRepository("AppBundle:CmsStzefBannerDeta");

        $banner = $repositoryBanners->findOneById($idBanner);
        $banner->deta = $repositoryBannerDeta->findByCmsStzefBanners($banner->getId());
        return $banner;
    }

    public function getBanForSection($em,$idSectionTheme){
        $repositoryBanners = $em->getRepository("AppBundle:CmsStzefBanners");
        $repositoryBannerDeta = $em->getRepository("AppBundle:CmsStzefBannerDeta");
        $banners = $repositoryBanners->findByIdSectionTheme($idSectionTheme);
        foreach ($banners as $index => $banner) {
            $banners[$index]->deta = $repositoryBannerDeta->findByCmsStzefBanners($banner->getId());
        }
        return $banners;
    }

    public function getParameters($em,$only_editable=false){
        #$em = $this->getDoctrine()->getManager();
        $repositoryParameters = $em->getRepository("AppBundle:CmsStzefParameters");

        if( $only_editable ){
            $parameter_editables = $repositoryParameters->find(777);
            //dump($odb_parameters->getValue());

            $qb = $em->createQueryBuilder();
            $qb->select('parameter');
            $qb->from('AppBundle:CmsStzefParameters', 'parameter');
            $qb->where($qb->expr()->in('parameter.id', $parameter_editables->getValue() ));

            //ArrayCollection
            $odb_parameters = $qb->getQuery()->getResult();
            //dump($odb_parameters);

        }else{
            $odb_parameters = $repositoryParameters->findAll();
        }
        $parameters = array();

        foreach ($odb_parameters as $odb_parameter) {
            if( $odb_parameter->getCgroup() ){
                if( !array_key_exists ( $odb_parameter->getNgroup() , $parameters ) ){
                    $parameters[$odb_parameter->getNgroup()] = array();
                }
                if( $odb_parameter->getValue() != "" ){
                    array_push($parameters[$odb_parameter->getNgroup()], $odb_parameter->getValue());
                }
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

    public $CTE_CMS_STZEF = array(
        "TYPE_PAGES" => array(
            "CATEGORY"=> 1 ,
            "ARTICLE"=> 2 ,
            "FILE"=> 3 ,
            "GALERY"=> 4 ,
            "FORM_CONTACT"=> 5 ,
            "STAFF"=> 6 ,
        )
    );
}
