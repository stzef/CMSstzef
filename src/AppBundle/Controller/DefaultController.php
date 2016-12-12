<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
        /**
     * @Route("/", name="homepage_admin")
     */
    public function indexAdminAction(Request $request)
    {
        $cmsStzefMenuses = $this->getMenu();
        $page_id = $request->get("page_id");
        dump($page_id);

        return $this->render("pages/inicio.html.twig", array(
            "cmsStzefMenuses" => $cmsStzefMenuses
            ));
    }
    /**
     * @Route("/admstzef", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
