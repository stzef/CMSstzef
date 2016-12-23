<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefBannerDeta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefbannerdetum controller.
 *
 * @Route("admstzef/banner_deta")
 */
class CmsStzefBannerDetaController extends Controller
{
    /**
     * Lists all cmsStzefBannerDetum entities.
     *
     * @Route("/", name="admstzef_banner_deta_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefBannerDetas = $em->getRepository('AppBundle:CmsStzefBannerDeta')->findAll();

        return $this->render('cmsstzefbannerdeta/index.html.twig', array(
            'cmsStzefBannerDetas' => $cmsStzefBannerDetas,
        ));
    }

    /**
     * Creates a new cmsStzefBannerDetum entity.
     *
     * @Route("/new", name="admstzef_banner_deta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefBannerDetum = new CmsStzefBannerDeta();
        $form = $this->createForm('AppBundle\Form\CmsStzefBannerDetaType', $cmsStzefBannerDetum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefBannerDetum);
            $em->flush($cmsStzefBannerDetum);

            return $this->redirectToRoute('admstzef_banner_deta_show', array('id' => $cmsStzefBannerDetum->getId()));
        }

        return $this->render('cmsstzefbannerdeta/new.html.twig', array(
            'cmsStzefBannerDetum' => $cmsStzefBannerDetum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefBannerDetum entity.
     *
     * @Route("/{id}", name="admstzef_banner_deta_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefBannerDeta $cmsStzefBannerDetum)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefBannerDetum);

        return $this->render('cmsstzefbannerdeta/show.html.twig', array(
            'cmsStzefBannerDetum' => $cmsStzefBannerDetum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefBannerDetum entity.
     *
     * @Route("/{id}/edit", name="admstzef_banner_deta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefBannerDeta $cmsStzefBannerDetum)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefBannerDetum);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefBannerDetaType', $cmsStzefBannerDetum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_banner_deta_edit', array('id' => $cmsStzefBannerDetum->getId()));
        }

        return $this->render('cmsstzefbannerdeta/edit.html.twig', array(
            'cmsStzefBannerDetum' => $cmsStzefBannerDetum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefBannerDetum entity.
     *
     * @Route("/{id}", name="admstzef_banner_deta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefBannerDeta $cmsStzefBannerDetum)
    {
        $form = $this->createDeleteForm($cmsStzefBannerDetum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefBannerDetum);
            $em->flush($cmsStzefBannerDetum);
        }

        return $this->redirectToRoute('admstzef_banner_deta_index');
    }

    /**
     * Creates a form to delete a cmsStzefBannerDetum entity.
     *
     * @param CmsStzefBannerDeta $cmsStzefBannerDetum The cmsStzefBannerDetum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefBannerDeta $cmsStzefBannerDetum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_banner_deta_delete', array('id' => $cmsStzefBannerDetum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
