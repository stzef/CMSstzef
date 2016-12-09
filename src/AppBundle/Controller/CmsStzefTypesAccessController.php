<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefTypesAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzeftypesaccess controller.
 *
 * @Route("admstzef/types_access")
 */
class CmsStzefTypesAccessController extends Controller
{
    /**
     * Lists all cmsStzefTypesAccess entities.
     *
     * @Route("/", name="admstzef_types_access_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefTypesAccesses = $em->getRepository('AppBundle:CmsStzefTypesAccess')->findAll();

        return $this->render('cmsstzeftypesaccess/index.html.twig', array(
            'cmsStzefTypesAccesses' => $cmsStzefTypesAccesses,
        ));
    }

    /**
     * Creates a new cmsStzefTypesAccess entity.
     *
     * @Route("/new", name="admstzef_types_access_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefTypesAccess = new CmsStzefTypesAccess();
        $form = $this->createForm('AppBundle\Form\CmsStzefTypesAccessType', $cmsStzefTypesAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefTypesAccess);
            $em->flush($cmsStzefTypesAccess);

            return $this->redirectToRoute('admstzef_types_access_show', array('id' => $cmsStzefTypesAccess->getId()));
        }

        return $this->render('cmsstzeftypesaccess/new.html.twig', array(
            'cmsStzefTypesAccess' => $cmsStzefTypesAccess,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefTypesAccess entity.
     *
     * @Route("/{id}", name="admstzef_types_access_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefTypesAccess $cmsStzefTypesAccess)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTypesAccess);

        return $this->render('cmsstzeftypesaccess/show.html.twig', array(
            'cmsStzefTypesAccess' => $cmsStzefTypesAccess,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefTypesAccess entity.
     *
     * @Route("/{id}/edit", name="admstzef_types_access_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefTypesAccess $cmsStzefTypesAccess)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTypesAccess);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefTypesAccessType', $cmsStzefTypesAccess);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_types_access_edit', array('id' => $cmsStzefTypesAccess->getId()));
        }

        return $this->render('cmsstzeftypesaccess/edit.html.twig', array(
            'cmsStzefTypesAccess' => $cmsStzefTypesAccess,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefTypesAccess entity.
     *
     * @Route("/{id}", name="admstzef_types_access_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefTypesAccess $cmsStzefTypesAccess)
    {
        $form = $this->createDeleteForm($cmsStzefTypesAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefTypesAccess);
            $em->flush($cmsStzefTypesAccess);
        }

        return $this->redirectToRoute('admstzef_types_access_index');
    }

    /**
     * Creates a form to delete a cmsStzefTypesAccess entity.
     *
     * @param CmsStzefTypesAccess $cmsStzefTypesAccess The cmsStzefTypesAccess entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefTypesAccess $cmsStzefTypesAccess)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_types_access_delete', array('id' => $cmsStzefTypesAccess->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
