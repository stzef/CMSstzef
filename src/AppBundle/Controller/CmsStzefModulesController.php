<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefModules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefmodule controller.
 *
 * @Route("admstzef/modules")
 */
class CmsStzefModulesController extends Controller
{
    /**
     * Lists all cmsStzefModule entities.
     *
     * @Route("/", name="admstzef_modules_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefModules = $em->getRepository('AppBundle:CmsStzefModules')->findAll();

        return $this->render('cmsstzefmodules/index.html.twig', array(
            'cmsStzefModules' => $cmsStzefModules,
        ));
    }

    /**
     * Creates a new cmsStzefModule entity.
     *
     * @Route("/new", name="admstzef_modules_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefModule = new CmsStzefModules();
        $form = $this->createForm('AppBundle\Form\CmsStzefModulesType', $cmsStzefModule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefModule);
            $em->flush($cmsStzefModule);

            return $this->redirectToRoute('admstzef_modules_show', array('id' => $cmsStzefModule->getId()));
        }

        return $this->render('cmsstzefmodules/new.html.twig', array(
            'cmsStzefModule' => $cmsStzefModule,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefModule entity.
     *
     * @Route("/{id}", name="admstzef_modules_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefModules $cmsStzefModule)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefModule);

        return $this->render('cmsstzefmodules/show.html.twig', array(
            'cmsStzefModule' => $cmsStzefModule,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefModule entity.
     *
     * @Route("/{id}/edit", name="admstzef_modules_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefModules $cmsStzefModule)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefModule);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefModulesType', $cmsStzefModule);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_modules_edit', array('id' => $cmsStzefModule->getId()));
        }

        return $this->render('cmsstzefmodules/edit.html.twig', array(
            'cmsStzefModule' => $cmsStzefModule,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefModule entity.
     *
     * @Route("/{id}", name="admstzef_modules_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefModules $cmsStzefModule)
    {
        $form = $this->createDeleteForm($cmsStzefModule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefModule);
            $em->flush($cmsStzefModule);
        }

        return $this->redirectToRoute('admstzef_modules_index');
    }

    /**
     * Creates a form to delete a cmsStzefModule entity.
     *
     * @param CmsStzefModules $cmsStzefModule The cmsStzefModule entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefModules $cmsStzefModule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_modules_delete', array('id' => $cmsStzefModule->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
