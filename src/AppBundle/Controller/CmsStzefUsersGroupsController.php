<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefUsersGroups;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefusersgroup controller.
 *
 * @Route("admstzef/users_groups")
 */
class CmsStzefUsersGroupsController extends Controller
{
    /**
     * Lists all cmsStzefUsersGroup entities.
     *
     * @Route("/", name="admstzef_users_groups_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefUsersGroups = $em->getRepository('AppBundle:CmsStzefUsersGroups')->findAll();

        return $this->render('cmsstzefusersgroups/index.html.twig', array(
            'cmsStzefUsersGroups' => $cmsStzefUsersGroups,
        ));
    }

    /**
     * Creates a new cmsStzefUsersGroup entity.
     *
     * @Route("/new", name="admstzef_users_groups_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefUsersGroup = new CmsStzefUsersGroups();
        $form = $this->createForm('AppBundle\Form\CmsStzefUsersGroupsType', $cmsStzefUsersGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefUsersGroup);
            $em->flush($cmsStzefUsersGroup);

            return $this->redirectToRoute('admstzef_users_groups_show', array('id' => $cmsStzefUsersGroup->getId()));
        }

        return $this->render('cmsstzefusersgroups/new.html.twig', array(
            'cmsStzefUsersGroup' => $cmsStzefUsersGroup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefUsersGroup entity.
     *
     * @Route("/{id}", name="admstzef_users_groups_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefUsersGroups $cmsStzefUsersGroup)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefUsersGroup);

        return $this->render('cmsstzefusersgroups/show.html.twig', array(
            'cmsStzefUsersGroup' => $cmsStzefUsersGroup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefUsersGroup entity.
     *
     * @Route("/{id}/edit", name="admstzef_users_groups_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefUsersGroups $cmsStzefUsersGroup)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefUsersGroup);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefUsersGroupsType', $cmsStzefUsersGroup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_users_groups_edit', array('id' => $cmsStzefUsersGroup->getId()));
        }

        return $this->render('cmsstzefusersgroups/edit.html.twig', array(
            'cmsStzefUsersGroup' => $cmsStzefUsersGroup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefUsersGroup entity.
     *
     * @Route("/{id}", name="admstzef_users_groups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefUsersGroups $cmsStzefUsersGroup)
    {
        $form = $this->createDeleteForm($cmsStzefUsersGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefUsersGroup);
            $em->flush($cmsStzefUsersGroup);
        }

        return $this->redirectToRoute('admstzef_users_groups_index');
    }

    /**
     * Creates a form to delete a cmsStzefUsersGroup entity.
     *
     * @param CmsStzefUsersGroups $cmsStzefUsersGroup The cmsStzefUsersGroup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefUsersGroups $cmsStzefUsersGroup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_users_groups_delete', array('id' => $cmsStzefUsersGroup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
