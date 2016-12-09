<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefThemes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzeftheme controller.
 *
 * @Route("admstzef/themes")
 */
class CmsStzefThemesController extends Controller
{
    /**
     * Lists all cmsStzefTheme entities.
     *
     * @Route("/", name="admstzef_themes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefThemes = $em->getRepository('AppBundle:CmsStzefThemes')->findAll();

        return $this->render('cmsstzefthemes/index.html.twig', array(
            'cmsStzefThemes' => $cmsStzefThemes,
        ));
    }

    /**
     * Creates a new cmsStzefTheme entity.
     *
     * @Route("/new", name="admstzef_themes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefTheme = new CmsStzefThemes();
        $form = $this->createForm('AppBundle\Form\CmsStzefThemesType', $cmsStzefTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefTheme);
            $em->flush($cmsStzefTheme);

            return $this->redirectToRoute('admstzef_themes_show', array('id' => $cmsStzefTheme->getId()));
        }

        return $this->render('cmsstzefthemes/new.html.twig', array(
            'cmsStzefTheme' => $cmsStzefTheme,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefTheme entity.
     *
     * @Route("/{id}", name="admstzef_themes_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefThemes $cmsStzefTheme)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTheme);

        return $this->render('cmsstzefthemes/show.html.twig', array(
            'cmsStzefTheme' => $cmsStzefTheme,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefTheme entity.
     *
     * @Route("/{id}/edit", name="admstzef_themes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefThemes $cmsStzefTheme)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTheme);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefThemesType', $cmsStzefTheme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_themes_edit', array('id' => $cmsStzefTheme->getId()));
        }

        return $this->render('cmsstzefthemes/edit.html.twig', array(
            'cmsStzefTheme' => $cmsStzefTheme,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefTheme entity.
     *
     * @Route("/{id}", name="admstzef_themes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefThemes $cmsStzefTheme)
    {
        $form = $this->createDeleteForm($cmsStzefTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefTheme);
            $em->flush($cmsStzefTheme);
        }

        return $this->redirectToRoute('admstzef_themes_index');
    }

    /**
     * Creates a form to delete a cmsStzefTheme entity.
     *
     * @param CmsStzefThemes $cmsStzefTheme The cmsStzefTheme entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefThemes $cmsStzefTheme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_themes_delete', array('id' => $cmsStzefTheme->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
