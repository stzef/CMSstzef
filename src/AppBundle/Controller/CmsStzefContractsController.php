<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CmsStzefContracts;
use AppBundle\Entity\CmsStzefArticles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmsstzefcontract controller.
 *
 * @Route("admstzef/contracts")
 */
class CmsStzefContractsController extends Controller
{
    /**
     * Lists all cmsStzefContract entities.
     *
     * @Route("/", name="admstzef_contracts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmsStzefContracts = $em->getRepository('AppBundle:CmsStzefContracts')->findAll();

        return $this->render('cmsstzefcontracts/index.html.twig', array(
            'cmsStzefContracts' => $cmsStzefContracts,
        ));
    }

    /**
     * Creates a new cmsStzefContract entity.
     *
     * @Route("/new", name="admstzef_contracts_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmsStzefContract = new CmsstzefContracts();
        $cmsStzefArticle = new CmsStzefArticles();
        $em = $this->getDoctrine()->getManager();
        $parametros = $em->getRepository("AppBundle:CmsStzefParameters");
        $publicado = $em->getRepository("AppBundle:CmsStzefStatesPublication");
        $categorias = $em->getRepository("AppBundle:CmsStzefCategories");
        $access = $em->getRepository("AppBundle:CmsStzefTypesAccess");
        $form = $this->createForm('AppBundle\Form\CmsStzefContractsType', $cmsStzefContract);
        $form->handleRequest($request);
        $param_id = $parametros->findOneByCparam("contract_category");
        $idStatePublication = $publicado->findOneById(1);
        $category = $categorias->findOneById($param_id->getValueInt());
        $typeAccess = $access->findOneById(1);
        $fecha = date('Y-m-d');
        //$stamp = date_timestamp_get($fecha);
       //dump($fecha);exit();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmsStzefContract);
            $em->flush($cmsStzefContract);
                $user= $this->get('security.context')->getToken()->getUser();
                $form = $this->createForm('AppBundle\Form\CmsStzefArticlesType', $cmsStzefArticle);
                $cmsStzefArticle->setName($cmsStzefContract->getProccess());
                $cmsStzefArticle->setDescription("'{$cmsStzefContract->getDescripcion()}'");
                $cmsStzefArticle->setContentHtml("");
                $cmsStzefArticle->setImageMain("");
                $cmsStzefArticle->setIfDistinguished("0");
                //$cmsStzefArticle->setDateCreation($fecha);
                $cmsStzefArticle->setModified(NULL);
                $cmsStzefArticle->setParams('{"contract" : '.$cmsStzefContract->getId().'}');
                $cmsStzefArticle->setIdStatePublication($idStatePublication);
                $cmsStzefArticle->setIdCategory($category);
                $cmsStzefArticle->setCreatorUser($user);
                $cmsStzefArticle->setIdTypeAccess($typeAccess);
                $em->persist($cmsStzefArticle);
                $em->flush($cmsStzefArticle);
            return $this->redirectToRoute('admstzef_contracts_show', array('id' => $cmsStzefContract->getId()));
        }
        return $this->render('cmsstzefcontracts/new.html.twig', array(
            'cmsStzefContract' => $cmsStzefContract,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a cmsStzefContract entity.
     *
     * @Route("/{id}", name="admstzef_contracts_show")
     * @Method("GET")
     */
    public function showAction(CmsStzefContracts $cmsStzefContract)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefContract);

        return $this->render('cmsstzefcontracts/show.html.twig', array(
            'cmsStzefContract' => $cmsStzefContract,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmsStzefContract entity.
     *
     * @Route("/{id}/edit", name="admstzef_contracts_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CmsStzefContracts $cmsStzefContract)
    {
        $deleteForm = $this->createDeleteForm($cmsStzefContract);
        $editForm = $this->createForm('AppBundle\Form\CmsStzefContractsType', $cmsStzefContract);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admstzef_contracts_edit', array('id' => $cmsStzefContract->getId()));
        }

        return $this->render('cmsstzefcontracts/edit.html.twig', array(
            'cmsStzefContract' => $cmsStzefContract,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmsStzefContract entity.
     *
     * @Route("/{id}", name="admstzef_contracts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CmsStzefContracts $cmsStzefContract)
    {
        $form = $this->createDeleteForm($cmsStzefContract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmsStzefContract);
            $em->flush($cmsStzefContract);
        }

        return $this->redirectToRoute('admstzef_contracts_index');
    }

    /**
     * Creates a form to delete a cmsStzefContract entity.
     *
     * @param CmsStzefContracts $cmsStzefContract The cmsStzefContract entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CmsStzefContracts $cmsStzefContract)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admstzef_contracts_delete', array('id' => $cmsStzefContract->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
