<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CmsStzefContractsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('proccess')
        ->add('description')
        //->add('path')
        ->add('path',"elfinder",array('label' => 'Imagen','instance'=>'form', 'enable'=>true,'attr' =>  array('placeholder' => 'Doble click para seleccionar Archivo','class' => 'form-control')))
        ->add('dateApertura')
        ->add('dateAclaracion')
        ->add('dateCierre')
        ->add('dateAdjudicion')        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefContracts'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefcontracts';
    }


}
