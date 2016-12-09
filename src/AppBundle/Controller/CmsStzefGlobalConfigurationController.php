<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefGlobalConfiguration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefglobalconfiguration controller.
 *
 * @Route("admstzef/global_configuration")
 */
class CmsStzefGlobalConfigurationController extends Controller
{
    /**
     * Lists all cmsStzefGlobalConfiguration entities.
     *
     * @Route("/", name="admstzef_global_configuration_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefGlobalConfigurations = $em->getRepository('AppBundle:CmsStzefGlobalConfiguration')->findAll();

        return $this->render('cmsstzefglobalconfiguration/index.html.twig', array(
            'cmsStzefGlobalConfigurations' => $cmsStzefGlobalConfigurations,
        ));
    }

    /**
     * Creates a new cmsStzefGlobalConfiguration entity.
     *
     * @Route("/new", name="admstzef_global_configuration_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefGlobalConfiguration = new CmsStzefGlobalConfiguration();
        $form = $this->createForm('AppBundle\Form\CmsStzefGlobalConfigurationType', $cmsStzefGlobalConfiguration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefGlobalConfiguration);
            $em->flush($cmsStzefGlobalConfiguration);

            return $this->redirectToRoute('admstzef_global_configuration_show', array('id' => $cmsStzefGlobalConfiguration->getId()));
        }

        return $this->render('cmsstzefglobalconfiguration/new.html.twig', array(
            'cmsStzefGlobalConfiguration' => $cmsStzefGlobalConfiguration,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefGlobalConfiguration entity.
     *
     * @Route("/{id}", name="admstzef_global_configuration_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefGlobalConfiguration $cmsStzefGlobalConfiguration)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefGlobalConfiguration);

        return $this->render('cmsstzefglobalconfiguration/show.html.twig', array(
            'cmsStzefGlobalConfiguration' => $cmsStzefGlobalConfiguration,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefGlobalConfiguration entity.
     *
     * @Route("/{id}/edit", name="admstzef_global_configuration_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefGlobalConfiguration $cmsStzefGlobalConfiguration)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefGlobalConfiguration);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefGlobalConfigurationType', $cmsStzefGlobalConfiguration);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_global_configuration_edit', array('id' => $cmsStzefGlobalConfiguration->getId()));
        }

        return $this->render('cmsstzefglobalconfiguration/edit.html.twig', array(
            'cmsStzefGlobalConfiguration' => $cmsStzefGlobalConfiguration,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefGlobalConfiguration entity.
     *
     * @Route("/{id}", name="admstzef_global_configuration_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefGlobalConfiguration $cmsStzefGlobalConfiguration)
    {
        $form = $this->createDeleteForm($cmsStzefGlobalConfiguration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefGlobalConfiguration);
            $em->flush($cmsStzefGlobalConfiguration);
        }

        return $this->redirectToRoute('admstzef_global_configuration_index');
    }

    /**
     * Creates a form to delete a cmsStzefGlobalConfiguration entity.
     *
     * @param CmsStzefGlobalConfiguration $cmsStzefGlobalConfiguration The cmsStzefGlobalConfiguration entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefGlobalConfiguration $cmsStzefGlobalConfiguration)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_global_configuration_delete', array('id' => $cmsStzefGlobalConfiguration->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
