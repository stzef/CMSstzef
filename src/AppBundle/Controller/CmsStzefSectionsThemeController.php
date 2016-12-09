<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefSectionsTheme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefsectionstheme controller.
 *
 * @Route("admstzef/sections_theme")
 */
class CmsStzefSectionsThemeController extends Controller
{
    /**
     * Lists all cmsStzefSectionsTheme entities.
     *
     * @Route("/", name="admstzef_sections_theme_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefSectionsThemes = $em->getRepository('AppBundle:CmsStzefSectionsTheme')->findAll();

        return $this->render('cmsstzefsectionstheme/index.html.twig', array(
            'cmsStzefSectionsThemes' => $cmsStzefSectionsThemes,
        ));
    }

    /**
     * Creates a new cmsStzefSectionsTheme entity.
     *
     * @Route("/new", name="admstzef_sections_theme_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefSectionsTheme = new CmsStzefSectionsTheme();
        $form = $this->createForm('AppBundle\Form\CmsStzefSectionsThemeType', $cmsStzefSectionsTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefSectionsTheme);
            $em->flush($cmsStzefSectionsTheme);

            return $this->redirectToRoute('admstzef_sections_theme_show', array('id' => $cmsStzefSectionsTheme->getId()));
        }

        return $this->render('cmsstzefsectionstheme/new.html.twig', array(
            'cmsStzefSectionsTheme' => $cmsStzefSectionsTheme,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmsStzefSectionsTheme entity.
     *
     * @Route("/{id}", name="admstzef_sections_theme_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefSectionsTheme $cmsStzefSectionsTheme)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefSectionsTheme);

        return $this->render('cmsstzefsectionstheme/show.html.twig', array(
            'cmsStzefSectionsTheme' => $cmsStzefSectionsTheme,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefSectionsTheme entity.
     *
     * @Route("/{id}/edit", name="admstzef_sections_theme_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefSectionsTheme $cmsStzefSectionsTheme)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefSectionsTheme);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefSectionsThemeType', $cmsStzefSectionsTheme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_sections_theme_edit', array('id' => $cmsStzefSectionsTheme->getId()));
        }

        return $this->render('cmsstzefsectionstheme/edit.html.twig', array(
            'cmsStzefSectionsTheme' => $cmsStzefSectionsTheme,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefSectionsTheme entity.
     *
     * @Route("/{id}", name="admstzef_sections_theme_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefSectionsTheme $cmsStzefSectionsTheme)
    {
        $form = $this->createDeleteForm($cmsStzefSectionsTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefSectionsTheme);
            $em->flush($cmsStzefSectionsTheme);
        }

        return $this->redirectToRoute('admstzef_sections_theme_index');
    }

    /**
     * Creates a form to delete a cmsStzefSectionsTheme entity.
     *
     * @param CmsStzefSectionsTheme $cmsStzefSectionsTheme The cmsStzefSectionsTheme entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefSectionsTheme $cmsStzefSectionsTheme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_sections_theme_delete', array('id' => $cmsStzefSectionsTheme->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
