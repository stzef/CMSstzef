<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CmsStzefUsersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name')
        //->add('photo')
        ->add('username')
        ->add('email')
        ->add('password');
        //->add('plainPassword')
        //->add('activation')
        //->add('resgiterDate')
        //->add('usernameCanonical')
        //->add('emailCanonical')
        //->add('enabled')
        //->add('salt')
        //->add('lastLogin')
        //->add('expired')
        //->add('expiresAt')
        //->add('confirmationToken')
        //->add('passwordRequestedAt')
        //->add('credentialsExpired')
        //->add('credentialsExpireAt')
        //->add('locked')
        //->add('roles')        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CmsStzefUsers'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cmsstzefusers';
    }


}
