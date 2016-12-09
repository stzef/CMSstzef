<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefUsers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefuser controller.
 *
 * @Route("admstzef/users")
 */
class CmsStzefUsersController extends Controller
{
    /**
     * Lists all cmsStzefUser entities.
     *
     * @Route("/", name="admstzef_users_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefUsers = $em->getRepository('AppBundle:CmsStzefUsers')->findAll();

        return $this->render('cmsstzefusers/index.html.twig', array(
            'cmsStzefUsers' => $cmsStzefUsers,
        ));
    }

    /**
     * Creates a new cmsStzefUser entity.
     *
     * @Route("/new", name="admstzef_users_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefUser = new CmsStzefUsers();
        $form = $this->createForm('AppBundle\Form\CmsStzefUsersType', $cmsStzefUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefUser);
            $em->flush($cmsStzefUser);

            return $this->redirectToRoute('admstzef_users_show', array('id' => $cmsStzefUser->getId()));
        }

        return $this->render('cmsstzefusers/new.html.twig', array(
            'cmsStzefUser' => $cmsStzefUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefUser entity.
     *
     * @Route("/{id}", name="admstzef_users_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefUsers $cmsStzefUser)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefUser);

        return $this->render('cmsstzefusers/show.html.twig', array(
            'cmsStzefUser' => $cmsStzefUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefUser entity.
     *
     * @Route("/{id}/edit", name="admstzef_users_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefUsers $cmsStzefUser)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefUser);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefUsersType', $cmsStzefUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_users_edit', array('id' => $cmsStzefUser->getId()));
        }

        return $this->render('cmsstzefusers/edit.html.twig', array(
            'cmsStzefUser' => $cmsStzefUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefUser entity.
     *
     * @Route("/{id}", name="admstzef_users_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefUsers $cmsStzefUser)
    {
        $form = $this->createDeleteForm($cmsStzefUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefUser);
            $em->flush($cmsStzefUser);
        }

        return $this->redirectToRoute('admstzef_users_index');
    }

    /**
     * Creates a form to delete a cmsStzefUser entity.
     *
     * @param CmsStzefUsers $cmsStzefUser The cmsStzefUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefUsers $cmsStzefUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_users_delete', array('id' => $cmsStzefUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
