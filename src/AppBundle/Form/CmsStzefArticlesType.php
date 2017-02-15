<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use FM\ElfinderBundle\Form\Type\ElFinderType;



class CmsStzefArticlesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add('name')->add('description')->add('contentHtml')->add('imageMain')->add('ifDistinguished')->add('dateCreation')->add('modified')->add('params')->add('idStatePublication')->add('idCategory')->add('creatorUser')->add('idTypeAccess')        ;
        $builder
        ->add('name',TextType::class,array('label' => 'Nombre'))
        ->add('description',TextType::class,array('label' => 'Descripción'))
        ->add('contentHtml',TextareaType::class,array('label' => 'Contenido'))
        ->add('ifDistinguished',CheckboxType::class,array('label' => 'Destacado',"required"=>false))
        ->add('idStatePublication',EntityType::class,array('class' => 'AppBundle:CmsStzefStatesPublication','label' => 'Estado Publicacion' ))
        ->add('idCategory',EntityType::class,array('class' => 'AppBundle:CmsStzefCategories','label' => 'Categoria' ))
        //->add('creatorUser',HiddenType::class,array('label' => 'Usuario'))
        ->add('idTypeAccess',EntityType::class,array('class' => 'AppBundle:CmsStzefTypesAccess','label' => 'Tipo Acceso'))
        ->add('imageMain',ElFinderType::class,array('instance'=>'form', 'enable'=>true,'attr' =>  array('class' => 'form-control')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefArticles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefarticles';
    }


}
