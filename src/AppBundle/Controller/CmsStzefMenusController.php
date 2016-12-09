<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefMenus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefmenu controller.
 *
 * @Route("admstzef/menus")
 */
class CmsStzefMenusController extends Controller
{
    /**
     * Lists all cmsStzefMenu entities.
     *
     * @Route("/", name="admstzef_menus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefMenuses = $em->getRepository('AppBundle:CmsStzefMenus')->findAll();

        return $this->render('cmsstzefmenus/index.html.twig', array(
            'cmsStzefMenuses' => $cmsStzefMenuses,
        ));
    }

    /**
     * Creates a new cmsStzefMenu entity.
     *
     * @Route("/new", name="admstzef_menus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefMenu = new CmsStzefMenus();
        $form = $this->createForm('AppBundle\Form\CmsStzefMenusType', $cmsStzefMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefMenu);
            $em->flush($cmsStzefMenu);

            return $this->redirectToRoute('admstzef_menus_show', array('id' => $cmsStzefMenu->getId()));
        }

        return $this->render('cmsstzefmenus/new.html.twig', array(
            'cmsStzefMenu' => $cmsStzefMenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefMenu entity.
     *
     * @Route("/{id}", name="admstzef_menus_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefMenus $cmsStzefMenu)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefMenu);

        return $this->render('cmsstzefmenus/show.html.twig', array(
            'cmsStzefMenu' => $cmsStzefMenu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefMenu entity.
     *
     * @Route("/{id}/edit", name="admstzef_menus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefMenus $cmsStzefMenu)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefMenu);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefMenusType', $cmsStzefMenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_menus_edit', array('id' => $cmsStzefMenu->getId()));
        }

        return $this->render('cmsstzefmenus/edit.html.twig', array(
            'cmsStzefMenu' => $cmsStzefMenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefMenu entity.
     *
     * @Route("/{id}", name="admstzef_menus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefMenus $cmsStzefMenu)
    {
        $form = $this->createDeleteForm($cmsStzefMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefMenu);
            $em->flush($cmsStzefMenu);
        }

        return $this->redirectToRoute('admstzef_menus_index');
    }

    /**
     * Creates a form to delete a cmsStzefMenu entity.
     *
     * @param CmsStzefMenus $cmsStzefMenu The cmsStzefMenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefMenus $cmsStzefMenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_menus_delete', array('id' => $cmsStzefMenu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
