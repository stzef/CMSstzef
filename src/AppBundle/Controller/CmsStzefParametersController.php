<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefParameters;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefparameter controller.
 *
 * @Route("parameters")
 */
class CmsStzefParametersController extends Controller
{
    /**
     * Lists all cmsStzefParameter entities.
     *
     * @Route("/", name="parameters_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefParameters = $em->getRepository('AppBundle:CmsStzefParameters')->findAll();

        return $this->render('cmsstzefparameters/index.html.twig', array(
            'cmsStzefParameters' => $cmsStzefParameters,
        ));
    }

    /**
     * Creates a new cmsStzefParameter entity.
     *
     * @Route("/new", name="parameters_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefParameter = new CmsStzefParameters();
        $form = $this->createForm('AppBundle\Form\CmsStzefParametersType', $cmsStzefParameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefParameter);
            $em->flush($cmsStzefParameter);

            return $this->redirectToRoute('parameters_show', array('id' => $cmsStzefParameter->getId()));
        }

        return $this->render('cmsstzefparameters/new.html.twig', array(
            'cmsStzefParameter' => $cmsStzefParameter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefParameter entity.
     *
     * @Route("/{id}", name="parameters_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefParameters $cmsStzefParameter)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefParameter);

        return $this->render('cmsstzefparameters/show.html.twig', array(
            'cmsStzefParameter' => $cmsStzefParameter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefParameter entity.
     *
     * @Route("/{id}/edit", name="parameters_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefParameters $cmsStzefParameter)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefParameter);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefParametersType', $cmsStzefParameter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parameters_edit', array('id' => $cmsStzefParameter->getId()));
        }

        return $this->render('cmsstzefparameters/edit.html.twig', array(
            'cmsStzefParameter' => $cmsStzefParameter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefParameter entity.
     *
     * @Route("/{id}", name="parameters_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefParameters $cmsStzefParameter)
    {
        $form = $this->createDeleteForm($cmsStzefParameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefParameter);
            $em->flush($cmsStzefParameter);
        }

        return $this->redirectToRoute('parameters_index');
    }

    /**
     * Creates a form to delete a cmsStzefParameter entity.
     *
     * @param CmsStzefParameters $cmsStzefParameter The cmsStzefParameter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefParameters $cmsStzefParameter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parameters_delete', array('id' => $cmsStzefParameter->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
