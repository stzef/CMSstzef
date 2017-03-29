<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CmsStzefParametersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //->add('cparam')
        //->add('cgroup')
        //->add('ngroup')
        //->add('type')
        //->add('name')
        ->add('valueText',"text",array ("label"=>"Valor") )
        ->add('valueBool',"checkbox",array ("label"=>"Valor") )
        ->add('valueInt',"text",array ("label"=>"Valor") )        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefParameters'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefparameters';
    }


}
