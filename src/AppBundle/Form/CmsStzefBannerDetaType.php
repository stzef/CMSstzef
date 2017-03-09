<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CmsStzefBannerDetaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //->add('image')
        ->add('cmsStzefBanners',"entity",array('class' => 'AppBundle:CmsStzefBanners','label' => 'Galeria'))
        ->add('image',"elfinder",array('label' => 'Imagen','instance'=>'form', 'enable'=>true,'attr' =>  array('placeholder' => 'Click para seleccionar Archivo','readonly' => true,'class' => 'form-control')))
        ->add('contentHtml',"textarea",array('label' => 'Contenido'));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefBannerDeta'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefbannerdeta';
    }


}
