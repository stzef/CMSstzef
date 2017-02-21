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
    $message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('info@colegiomontecarmelo.edu.co')
        ->setTo('sistematizaref.programador5@gmail.com')
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'Emails/registration.html.twig',
                array('name' => "Carlos")
            ),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'Emails/registration.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
    ;
    $this->get('mailer')->send($message);
    //dump($message);







        return $this->render('admin/index.html.twig', array());
    }
}
