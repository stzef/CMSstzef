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

class CmsStzefMenusType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name',TextType::class,array('label' => 'Nombre'))
        ->add('alias',TextType::class,array('label' => 'Alias'))
        ->add('orden')
        ->add('target')
        ->add('ifMain',CheckboxType::class,array('label' => 'Principal',"required"=>false))
        //->add('dateCreation')
        //->add('modified')
        //->add('params')
        ->add('page',EntityType::class,array('class' => 'AppBundle:CmsStzefPages','label' => 'Pagina' ))
        ->add('topMenu',EntityType::class,array('class' => 'AppBundle:CmsStzefMenus','label' => 'Menu Mayor' ))
        ->add('idTypeAccess',EntityType::class,array('class' => 'AppBundle:CmsStzefTypesAccess','label' => 'Tipo Acceso'))
        //->add('creatorUser',HiddenType::class,array('label' => 'Usuario'))
        ->add('idStatePublication',EntityType::class,array('class' => 'AppBundle:CmsStzefStatesPublication','label' => 'Estado Publicacion' ))        ;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefMenus'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefmenus';
    }


}
