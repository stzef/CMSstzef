<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefArticles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefarticle controller.
 *
 * @Route("admstzef/articles")
 */
class CmsStzefArticlesController extends Controller
{
    /**
     * Lists all cmsStzefArticle entities.
     *
     * @Route("/", name="admstzef_articles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefArticles = $em->getRepository('AppBundle:CmsStzefArticles')->findAll();

        return $this->render('cmsstzefarticles/index.html.twig', array(
            'cmsStzefArticles' => $cmsStzefArticles,
        ));
    }

    /**
     * Creates a new cmsStzefArticle entity.
     *
     * @Route("/new", name="admstzef_articles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $cmsStzefArticle = new CmsStzefArticles();
        $form = $this->createForm('AppBundle\Form\CmsStzefArticlesType', $cmsStzefArticle);
        //$form->get('creatorUser')->setData($user);
        $cmsStzefArticle->setCreatorUser($user);
        $form->handleRequest($request);
        dump($form);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefArticle);
            $em->flush($cmsStzefArticle);

            return $this->redirectToRoute('admstzef_articles_show', array('id' => $cmsStzefArticle->getId()));
        }

        return $this->render('cmsstzefarticles/new.html.twig', array(
            'cmsStzefArticle' => $cmsStzefArticle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefArticle entity.
     *
     * @Route("/{id}", name="admstzef_articles_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefArticles $cmsStzefArticle)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefArticle);

        return $this->render('cmsstzefarticles/show.html.twig', array(
            'cmsStzefArticle' => $cmsStzefArticle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefArticle entity.
     *
     * @Route("/{id}/edit", name="admstzef_articles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefArticles $cmsStzefArticle)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefArticle);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefArticlesType', $cmsStzefArticle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_articles_edit', array('id' => $cmsStzefArticle->getId()));
        }

        return $this->render('cmsstzefarticles/edit.html.twig', array(
            'cmsStzefArticle' => $cmsStzefArticle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefArticle entity.
     *
     * @Route("/{id}", name="admstzef_articles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefArticles $cmsStzefArticle)
    {
        $form = $this->createDeleteForm($cmsStzefArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefArticle);
            $em->flush($cmsStzefArticle);
        }

        return $this->redirectToRoute('admstzef_articles_index');
    }

    /**
     * Creates a form to delete a cmsStzefArticle entity.
     *
     * @param CmsStzefArticles $cmsStzefArticle The cmsStzefArticle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefArticles $cmsStzefArticle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_articles_delete', array('id' => $cmsStzefArticle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
