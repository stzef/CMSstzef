<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @Route("/users/change_estate_user/{id}", name="change_estate_user")
     */
public function changEstateUserAction(Request $request,$id)
{
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository('AppBundle:CmsStzefUsers')->find($id);
    if ( $user->getEnabled() ){
        $user->setEnabled(false);
    }else{
        $user->setEnabled(true);
    }
    $em->persist($user);
    $em->flush($user);
    return $this->redirectToRoute('admstzef_users_index');

}
    /**
     * @Route("/users/change_rol_user", name="change_rol_user")
     */
public function changeRolUserAction(Request $request)
{

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:CmsStzefUsers')->find($request->request->get("user"));

        $userManager = $this->get('fos_user.user_manager');

        //$user->addRole('ROLE_ADMIN');
        //$user->removeRole('ROLE_PROFE');

        $user->setRoles(array($request->request->get("rol")));


        //if ($user->hasRole('ROLE_ADMIN'))
        $userManager->updateUser($user);


   $response = array("ok" => true );
  //you can return result as JSON
  return new Response(json_encode($response));

}
    /**
     * @Route("/admstzef/login", name="login")
     */
/*public function loginAction(Request $request)
{
    $authenticationUtils = $this->get('security.authentication_utils');
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
    ));
}*/
}
