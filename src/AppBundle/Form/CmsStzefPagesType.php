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

class CmsStzefPagesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('slug',TextType::class,array('label' => 'Slug'))
        ->add('name',TextType::class,array('label' => 'Nombre'))
        ->add('ifMain',CheckboxType::class,array('label' => 'Principal',"required"=>false))
        //->add('dateCreation')
        //->add('modified')
        //->add('params')
        ->add('idTypePage',EntityType::class,array('class' => 'AppBundle:CmsStzefTypesPages','label' => 'Tipo Pagina'))
        //->add('creatorUser',HiddenType::class,array('label' => 'Usuario'))
        ->add('idTypeAccess',EntityType::class,array('class' => 'AppBundle:CmsStzefTypesAccess','label' => 'Tipo Acceso'))
        ->add('idStatePublication',EntityType::class,array('class' => 'AppBundle:CmsStzefStatesPublication','label' => 'Estado Publicacion' ))
        ->add('categoryToShow',EntityType::class,array('class' => 'AppBundle:CmsStzefCategories','label' => 'Categoria' ))
        ->add('idDisplayType',EntityType::class,array('class' => 'AppBundle:CmsStzefDisplayTypes','label' => 'Visualizacion'))
        ->add('articleToShow',EntityType::class,array('class' => 'AppBundle:CmsStzefArticles','label' => "Articulo"));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefPages'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefpages';
    }


}
