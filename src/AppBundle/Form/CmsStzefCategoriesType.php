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

class CmsStzefCategoriesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name',TextType::class,array('label' => 'Descripción'))
        ->add('alias',TextType::class,array('label' => 'Alias'))
        ->add('description',TextType::class,array('label' => 'Descripción'))
        //->add('dateCreation')
        //->add('modified')
        //->add('params')
        ->add('idTypeAccess',EntityType::class,array('class' => 'AppBundle:CmsStzefTypesAccess','label' => 'Tipo Acceso'))
        ->add('idStatePublication',EntityType::class,array('class' => 'AppBundle:CmsStzefStatesPublication','label' => 'Estado Publicacion' ))
        //->add('creatorUser')
        ->add('topCategory',EntityType::class,array('class' => 'AppBundle:CmsStzefCategories','label' => 'Categoria' ))
        ;
    }



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefCategories'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefcategories';
    }


}
