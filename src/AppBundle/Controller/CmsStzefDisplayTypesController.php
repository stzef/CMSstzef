<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefDisplayTypes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefdisplaytype controller.
 *
 * @Route("admstzef/display_types")
 */
class CmsStzefDisplayTypesController extends Controller
{
    /**
     * Lists all cmsStzefDisplayType entities.
     *
     * @Route("/", name="admstzef_display_types_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefDisplayTypes = $em->getRepository('AppBundle:CmsStzefDisplayTypes')->findAll();

        return $this->render('cmsstzefdisplaytypes/index.html.twig', array(
            'cmsStzefDisplayTypes' => $cmsStzefDisplayTypes,
        ));
    }

    /**
     * Creates a new cmsStzefDisplayType entity.
     *
     * @Route("/new", name="admstzef_display_types_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefDisplayType = new CmsStzefDisplayTypes();
        $form = $this->createForm('AppBundle\Form\CmsStzefDisplayTypesType', $cmsStzefDisplayType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefDisplayType);
            $em->flush($cmsStzefDisplayType);

            return $this->redirectToRoute('admstzef_display_types_show', array('id' => $cmsStzefDisplayType->getId()));
        }

        return $this->render('cmsstzefdisplaytypes/new.html.twig', array(
            'cmsStzefDisplayType' => $cmsStzefDisplayType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefDisplayType entity.
     *
     * @Route("/{id}", name="admstzef_display_types_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefDisplayTypes $cmsStzefDisplayType)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefDisplayType);

        return $this->render('cmsstzefdisplaytypes/show.html.twig', array(
            'cmsStzefDisplayType' => $cmsStzefDisplayType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefDisplayType entity.
     *
     * @Route("/{id}/edit", name="admstzef_display_types_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefDisplayTypes $cmsStzefDisplayType)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefDisplayType);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefDisplayTypesType', $cmsStzefDisplayType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_display_types_edit', array('id' => $cmsStzefDisplayType->getId()));
        }

        return $this->render('cmsstzefdisplaytypes/edit.html.twig', array(
            'cmsStzefDisplayType' => $cmsStzefDisplayType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefDisplayType entity.
     *
     * @Route("/{id}", name="admstzef_display_types_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefDisplayTypes $cmsStzefDisplayType)
    {
        $form = $this->createDeleteForm($cmsStzefDisplayType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefDisplayType);
            $em->flush($cmsStzefDisplayType);
        }

        return $this->redirectToRoute('admstzef_display_types_index');
    }

    /**
     * Creates a form to delete a cmsStzefDisplayType entity.
     *
     * @param CmsStzefDisplayTypes $cmsStzefDisplayType The cmsStzefDisplayType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefDisplayTypes $cmsStzefDisplayType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_display_types_delete', array('id' => $cmsStzefDisplayType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
