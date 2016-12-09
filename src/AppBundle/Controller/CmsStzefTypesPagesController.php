<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefTypesPages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzeftypespage controller.
 *
 * @Route("admstzef/types_pages")
 */
class CmsStzefTypesPagesController extends Controller
{
    /**
     * Lists all cmsStzefTypesPage entities.
     *
     * @Route("/", name="admstzef_types_pages_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefTypesPages = $em->getRepository('AppBundle:CmsStzefTypesPages')->findAll();

        return $this->render('cmsstzeftypespages/index.html.twig', array(
            'cmsStzefTypesPages' => $cmsStzefTypesPages,
        ));
    }

    /**
     * Creates a new cmsStzefTypesPage entity.
     *
     * @Route("/new", name="admstzef_types_pages_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefTypesPage = new CmsStzefTypesPages();
        $form = $this->createForm('AppBundle\Form\CmsStzefTypesPagesType', $cmsStzefTypesPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefTypesPage);
            $em->flush($cmsStzefTypesPage);

            return $this->redirectToRoute('admstzef_types_pages_show', array('id' => $cmsStzefTypesPage->getId()));
        }

        return $this->render('cmsstzeftypespages/new.html.twig', array(
            'cmsStzefTypesPage' => $cmsStzefTypesPage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefTypesPage entity.
     *
     * @Route("/{id}", name="admstzef_types_pages_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefTypesPages $cmsStzefTypesPage)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTypesPage);

        return $this->render('cmsstzeftypespages/show.html.twig', array(
            'cmsStzefTypesPage' => $cmsStzefTypesPage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefTypesPage entity.
     *
     * @Route("/{id}/edit", name="admstzef_types_pages_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefTypesPages $cmsStzefTypesPage)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTypesPage);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefTypesPagesType', $cmsStzefTypesPage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_types_pages_edit', array('id' => $cmsStzefTypesPage->getId()));
        }

        return $this->render('cmsstzeftypespages/edit.html.twig', array(
            'cmsStzefTypesPage' => $cmsStzefTypesPage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefTypesPage entity.
     *
     * @Route("/{id}", name="admstzef_types_pages_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefTypesPages $cmsStzefTypesPage)
    {
        $form = $this->createDeleteForm($cmsStzefTypesPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefTypesPage);
            $em->flush($cmsStzefTypesPage);
        }

        return $this->redirectToRoute('admstzef_types_pages_index');
    }

    /**
     * Creates a form to delete a cmsStzefTypesPage entity.
     *
     * @param CmsStzefTypesPages $cmsStzefTypesPage The cmsStzefTypesPage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefTypesPages $cmsStzefTypesPage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_types_pages_delete', array('id' => $cmsStzefTypesPage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
