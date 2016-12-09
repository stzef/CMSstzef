<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefCategories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefcategory controller.
 *
 * @Route("admstzef/categories")
 */
class CmsStzefCategoriesController extends Controller
{
    /**
     * Lists all cmsStzefCategory entities.
     *
     * @Route("/", name="admstzef_categories_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefCategories = $em->getRepository('AppBundle:CmsStzefCategories')->findAll();

        return $this->render('cmsstzefcategories/index.html.twig', array(
            'cmsStzefCategories' => $cmsStzefCategories,
        ));
    }

    /**
     * Creates a new cmsStzefCategory entity.
     *
     * @Route("/new", name="admstzef_categories_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefCategory = new CmsStzefCategories();
        $form = $this->createForm('AppBundle\Form\CmsStzefCategoriesType', $cmsStzefCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefCategory);
            $em->flush($cmsStzefCategory);

            return $this->redirectToRoute('admstzef_categories_show', array('id' => $cmsStzefCategory->getId()));
        }

        return $this->render('cmsstzefcategories/new.html.twig', array(
            'cmsStzefCategory' => $cmsStzefCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefCategory entity.
     *
     * @Route("/{id}", name="admstzef_categories_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefCategories $cmsStzefCategory)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefCategory);

        return $this->render('cmsstzefcategories/show.html.twig', array(
            'cmsStzefCategory' => $cmsStzefCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefCategory entity.
     *
     * @Route("/{id}/edit", name="admstzef_categories_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefCategories $cmsStzefCategory)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefCategory);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefCategoriesType', $cmsStzefCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_categories_edit', array('id' => $cmsStzefCategory->getId()));
        }

        return $this->render('cmsstzefcategories/edit.html.twig', array(
            'cmsStzefCategory' => $cmsStzefCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefCategory entity.
     *
     * @Route("/{id}", name="admstzef_categories_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefCategories $cmsStzefCategory)
    {
        $form = $this->createDeleteForm($cmsStzefCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefCategory);
            $em->flush($cmsStzefCategory);
        }

        return $this->redirectToRoute('admstzef_categories_index');
    }

    /**
     * Creates a form to delete a cmsStzefCategory entity.
     *
     * @param CmsStzefCategories $cmsStzefCategory The cmsStzefCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefCategories $cmsStzefCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_categories_delete', array('id' => $cmsStzefCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
