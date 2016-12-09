<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefTypesModules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzeftypesmodule controller.
 *
 * @Route("admstzef/types_modules")
 */
class CmsStzefTypesModulesController extends Controller
{
    /**
     * Lists all cmsStzefTypesModule entities.
     *
     * @Route("/", name="admstzef_types_modules_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefTypesModules = $em->getRepository('AppBundle:CmsStzefTypesModules')->findAll();

        return $this->render('cmsstzeftypesmodules/index.html.twig', array(
            'cmsStzefTypesModules' => $cmsStzefTypesModules,
        ));
    }

    /**
     * Creates a new cmsStzefTypesModule entity.
     *
     * @Route("/new", name="admstzef_types_modules_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefTypesModule = new CmsStzefTypesModules();
        $form = $this->createForm('AppBundle\Form\CmsStzefTypesModulesType', $cmsStzefTypesModule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefTypesModule);
            $em->flush($cmsStzefTypesModule);

            return $this->redirectToRoute('admstzef_types_modules_show', array('id' => $cmsStzefTypesModule->getId()));
        }

        return $this->render('cmsstzeftypesmodules/new.html.twig', array(
            'cmsStzefTypesModule' => $cmsStzefTypesModule,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefTypesModule entity.
     *
     * @Route("/{id}", name="admstzef_types_modules_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefTypesModules $cmsStzefTypesModule)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTypesModule);

        return $this->render('cmsstzeftypesmodules/show.html.twig', array(
            'cmsStzefTypesModule' => $cmsStzefTypesModule,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefTypesModule entity.
     *
     * @Route("/{id}/edit", name="admstzef_types_modules_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefTypesModules $cmsStzefTypesModule)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefTypesModule);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefTypesModulesType', $cmsStzefTypesModule);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_types_modules_edit', array('id' => $cmsStzefTypesModule->getId()));
        }

        return $this->render('cmsstzeftypesmodules/edit.html.twig', array(
            'cmsStzefTypesModule' => $cmsStzefTypesModule,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefTypesModule entity.
     *
     * @Route("/{id}", name="admstzef_types_modules_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefTypesModules $cmsStzefTypesModule)
    {
        $form = $this->createDeleteForm($cmsStzefTypesModule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefTypesModule);
            $em->flush($cmsStzefTypesModule);
        }

        return $this->redirectToRoute('admstzef_types_modules_index');
    }

    /**
     * Creates a form to delete a cmsStzefTypesModule entity.
     *
     * @param CmsStzefTypesModules $cmsStzefTypesModule The cmsStzefTypesModule entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefTypesModules $cmsStzefTypesModule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_types_modules_delete', array('id' => $cmsStzefTypesModule->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
