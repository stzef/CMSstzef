<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefStatesPublication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefstatespublication controller.
 *
 * @Route("admstzef/states_publication")
 */
class CmsStzefStatesPublicationController extends Controller
{
    /**
     * Lists all cmsStzefStatesPublication entities.
     *
     * @Route("/", name="admstzef_states_publication_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefStatesPublications = $em->getRepository('AppBundle:CmsStzefStatesPublication')->findAll();

        return $this->render('cmsstzefstatespublication/index.html.twig', array(
            'cmsStzefStatesPublications' => $cmsStzefStatesPublications,
        ));
    }

    /**
     * Creates a new cmsStzefStatesPublication entity.
     *
     * @Route("/new", name="admstzef_states_publication_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefStatesPublication = new CmsStzefStatesPublication();
        $form = $this->createForm('AppBundle\Form\CmsStzefStatesPublicationType', $cmsStzefStatesPublication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefStatesPublication);
            $em->flush($cmsStzefStatesPublication);

            return $this->redirectToRoute('admstzef_states_publication_show', array('id' => $cmsStzefStatesPublication->getId()));
        }

        return $this->render('cmsstzefstatespublication/new.html.twig', array(
            'cmsStzefStatesPublication' => $cmsStzefStatesPublication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefStatesPublication entity.
     *
     * @Route("/{id}", name="admstzef_states_publication_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefStatesPublication $cmsStzefStatesPublication)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefStatesPublication);

        return $this->render('cmsstzefstatespublication/show.html.twig', array(
            'cmsStzefStatesPublication' => $cmsStzefStatesPublication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefStatesPublication entity.
     *
     * @Route("/{id}/edit", name="admstzef_states_publication_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefStatesPublication $cmsStzefStatesPublication)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefStatesPublication);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefStatesPublicationType', $cmsStzefStatesPublication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_states_publication_edit', array('id' => $cmsStzefStatesPublication->getId()));
        }

        return $this->render('cmsstzefstatespublication/edit.html.twig', array(
            'cmsStzefStatesPublication' => $cmsStzefStatesPublication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefStatesPublication entity.
     *
     * @Route("/{id}", name="admstzef_states_publication_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefStatesPublication $cmsStzefStatesPublication)
    {
        $form = $this->createDeleteForm($cmsStzefStatesPublication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefStatesPublication);
            $em->flush($cmsStzefStatesPublication);
        }

        return $this->redirectToRoute('admstzef_states_publication_index');
    }

    /**
     * Creates a form to delete a cmsStzefStatesPublication entity.
     *
     * @param CmsStzefStatesPublication $cmsStzefStatesPublication The cmsStzefStatesPublication entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefStatesPublication $cmsStzefStatesPublication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_states_publication_delete', array('id' => $cmsStzefStatesPublication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
