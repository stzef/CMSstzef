<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefStates;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefstate controller.
 *
 * @Route("states")
 */
class CmsStzefStatesController extends Controller
{
    /**
     * Lists all cmsStzefState entities.
     *
     * @Route("/", name="states_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefStates = $em->getRepository('AppBundle:CmsStzefStates')->findAll();

        return $this->render('cmsstzefstates/index.html.twig', array(
            'cmsStzefStates' => $cmsStzefStates,
        ));
    }

    /**
     * Creates a new cmsStzefState entity.
     *
     * @Route("/new", name="states_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefState = new CmsStzefStates();
        $form = $this->createForm('AppBundle\Form\CmsStzefStatesType', $cmsStzefState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefState);
            $em->flush($cmsStzefState);

            return $this->redirectToRoute('states_show', array('id' => $cmsStzefState->getId()));
        }

        return $this->render('cmsstzefstates/new.html.twig', array(
            'cmsStzefState' => $cmsStzefState,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefState entity.
     *
     * @Route("/{id}", name="states_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefStates $cmsStzefState)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefState);

        return $this->render('cmsstzefstates/show.html.twig', array(
            'cmsStzefState' => $cmsStzefState,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefState entity.
     *
     * @Route("/{id}/edit", name="states_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefStates $cmsStzefState)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefState);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefStatesType', $cmsStzefState);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('states_edit', array('id' => $cmsStzefState->getId()));
        }

        return $this->render('cmsstzefstates/edit.html.twig', array(
            'cmsStzefState' => $cmsStzefState,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefState entity.
     *
     * @Route("/{id}", name="states_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefStates $cmsStzefState)
    {
        $form = $this->createDeleteForm($cmsStzefState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefState);
            $em->flush($cmsStzefState);
        }

        return $this->redirectToRoute('states_index');
    }

    /**
     * Creates a form to delete a cmsStzefState entity.
     *
     * @param CmsStzefStates $cmsStzefState The cmsStzefState entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefStates $cmsStzefState)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('states_delete', array('id' => $cmsStzefState->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
