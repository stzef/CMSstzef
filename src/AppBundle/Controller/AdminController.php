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
    }
    /**
     * @Route("/mails/send_form", name="url_send_form")
     */
    public function sendFormAction(Request $request){

        $name = $request->request->get('name', '');
        $email = $request->request->get('email', '');
        $message = $request->request->get('message', '');

        // replace this example code with whatever you need
        $message = \Swift_Message::newInstance()
            ->setSubject('Mensaje Pagina Web')
            ->setFrom('info@colegiomontecarmelo.edu.co')
            ->setTo('sistematizaref.programador5@gmail.com')
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    array('name' => $name,'email' => $email,'message' => $message)
                ),
                'text/html'
            );
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
        if( $this->get('mailer')->send($message) ){
            $context = array("messages"=>array(array("type"=>"success","text"=>"El Mensaje se Envio Corectamente")));
        }else{
            $context = array("messages"=>array(array("type"=>"danger","text"=>"El Mensaje No se pudo enviar")));
        }
        dump($context);
        return $this->redirect($this->generateUrl('homepage',$context));
        //return $this->render('index.html.twig', $context);
    }
}
