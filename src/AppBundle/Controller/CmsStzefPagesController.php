<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefPages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefpage controller.
 *
 * @Route("admstzef/pages")
 */
class CmsStzefPagesController extends Controller
{
    /**
     * Lists all cmsStzefPage entities.
     *
     * @Route("/", name="admstzef_pages_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefPages = $em->getRepository('AppBundle:CmsStzefPages')->findAll();

        return $this->render('cmsstzefpages/index.html.twig', array(
            'cmsStzefPages' => $cmsStzefPages,
        ));
    }

    /**
     * Creates a new cmsStzefPage entity.
     *
     * @Route("/new", name="admstzef_pages_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefPage = new CmsStzefPages();
        $form = $this->createForm('AppBundle\Form\CmsStzefPagesType', $cmsStzefPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefPage);
            $em->flush($cmsStzefPage);

            return $this->redirectToRoute('admstzef_pages_show', array('id' => $cmsStzefPage->getId()));
        }

        return $this->render('cmsstzefpages/new.html.twig', array(
            'cmsStzefPage' => $cmsStzefPage,
            'form' => $form->createView(),
        ));

        //Crear Action en PagesController
        //Crear Template en pages/
    }

    /**
     * Finds and displays a cmsStzefPage entity.
     *
     * @Route("/{id}", name="admstzef_pages_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefPages $cmsStzefPage)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefPage);

        return $this->render('cmsstzefpages/show.html.twig', array(
            'cmsStzefPage' => $cmsStzefPage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefPage entity.
     *
     * @Route("/{id}/edit", name="admstzef_pages_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefPages $cmsStzefPage)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefPage);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefPagesType', $cmsStzefPage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_pages_edit', array('id' => $cmsStzefPage->getId()));
        }

        return $this->render('cmsstzefpages/edit.html.twig', array(
            'cmsStzefPage' => $cmsStzefPage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefPage entity.
     *
     * @Route("/{id}", name="admstzef_pages_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefPages $cmsStzefPage)
    {
        $form = $this->createDeleteForm($cmsStzefPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefPage);
            $em->flush($cmsStzefPage);
        }

        return $this->redirectToRoute('admstzef_pages_index');
    }

    /**
     * Creates a form to delete a cmsStzefPage entity.
     *
     * @param CmsStzefPages $cmsStzefPage The cmsStzefPage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefPages $cmsStzefPage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_pages_delete', array('id' => $cmsStzefPage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
