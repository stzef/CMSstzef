<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefSections;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefsection controller.
 *
 * @Route("admstzef/sections")
 */
class CmsStzefSectionsController extends Controller
{
    /**
     * Lists all cmsStzefSection entities.
     *
     * @Route("/", name="admstzef_sections_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefSections = $em->getRepository('AppBundle:CmsStzefSections')->findAll();

        return $this->render('cmsstzefsections/index.html.twig', array(
            'cmsStzefSections' => $cmsStzefSections,
        ));
    }

    /**
     * Creates a new cmsStzefSection entity.
     *
     * @Route("/new", name="admstzef_sections_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefSection = new CmsStzefSections();
        $form = $this->createForm('AppBundle\Form\CmsStzefSectionsType', $cmsStzefSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefSection);
            $em->flush($cmsStzefSection);

            return $this->redirectToRoute('admstzef_sections_show', array('id' => $cmsStzefSection->getId()));
        }

        return $this->render('cmsstzefsections/new.html.twig', array(
            'cmsStzefSection' => $cmsStzefSection,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefSection entity.
     *
     * @Route("/{id}", name="admstzef_sections_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefSections $cmsStzefSection)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefSection);

        return $this->render('cmsstzefsections/show.html.twig', array(
            'cmsStzefSection' => $cmsStzefSection,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefSection entity.
     *
     * @Route("/{id}/edit", name="admstzef_sections_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefSections $cmsStzefSection)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefSection);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefSectionsType', $cmsStzefSection);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_sections_edit', array('id' => $cmsStzefSection->getId()));
        }

        return $this->render('cmsstzefsections/edit.html.twig', array(
            'cmsStzefSection' => $cmsStzefSection,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefSection entity.
     *
     * @Route("/{id}", name="admstzef_sections_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefSections $cmsStzefSection)
    {
        $form = $this->createDeleteForm($cmsStzefSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefSection);
            $em->flush($cmsStzefSection);
        }

        return $this->redirectToRoute('admstzef_sections_index');
    }

    /**
     * Creates a form to delete a cmsStzefSection entity.
     *
     * @param CmsStzefSections $cmsStzefSection The cmsStzefSection entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefSections $cmsStzefSection)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_sections_delete', array('id' => $cmsStzefSection->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
