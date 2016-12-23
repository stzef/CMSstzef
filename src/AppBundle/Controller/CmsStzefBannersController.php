<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefBanners;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefbanner controller.
 *
 * @Route("admstzef/banners")
 */
class CmsStzefBannersController extends Controller
{
    /**
     * Lists all cmsStzefBanner entities.
     *
     * @Route("/", name="admstzef_banners_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefBanners = $em->getRepository('AppBundle:CmsStzefBanners')->findAll();

        return $this->render('cmsstzefbanners/index.html.twig', array(
            'cmsStzefBanners' => $cmsStzefBanners,
        ));
    }

    /**
     * Creates a new cmsStzefBanner entity.
     *
     * @Route("/new", name="admstzef_banners_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefBanner = new CmsStzefBanners();
        $form = $this->createForm('AppBundle\Form\CmsStzefBannersType', $cmsStzefBanner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefBanner);
            $em->flush($cmsStzefBanner);

            return $this->redirectToRoute('admstzef_banners_show', array('id' => $cmsStzefBanner->getId()));
        }

        return $this->render('cmsstzefbanners/new.html.twig', array(
            'cmsStzefBanner' => $cmsStzefBanner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefBanner entity.
     *
     * @Route("/{id}", name="admstzef_banners_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefBanners $cmsStzefBanner)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefBanner);

        return $this->render('cmsstzefbanners/show.html.twig', array(
            'cmsStzefBanner' => $cmsStzefBanner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefBanner entity.
     *
     * @Route("/{id}/edit", name="admstzef_banners_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefBanners $cmsStzefBanner)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefBanner);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefBannersType', $cmsStzefBanner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_banners_edit', array('id' => $cmsStzefBanner->getId()));
        }

        return $this->render('cmsstzefbanners/edit.html.twig', array(
            'cmsStzefBanner' => $cmsStzefBanner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefBanner entity.
     *
     * @Route("/{id}", name="admstzef_banners_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefBanners $cmsStzefBanner)
    {
        $form = $this->createDeleteForm($cmsStzefBanner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefBanner);
            $em->flush($cmsStzefBanner);
        }

        return $this->redirectToRoute('admstzef_banners_index');
    }

    /**
     * Creates a form to delete a cmsStzefBanner entity.
     *
     * @param CmsStzefBanners $cmsStzefBanner The cmsStzefBanner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefBanners $cmsStzefBanner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_banners_delete', array('id' => $cmsStzefBanner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
