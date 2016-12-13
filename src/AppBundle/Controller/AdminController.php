<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admstzef", name="homepage_admin")
     */
    public function indexAdminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('admin/index.html.twig', array());
    }
}
