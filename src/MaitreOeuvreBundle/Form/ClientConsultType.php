<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientConsultType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prenom',null,array(
            'disabled'=> true))
            ->add('telPort',null,array(
                'disabled'=> true))
            ->add('telFixe',null,array(
                'disabled'=> true))
            ->add('username',null,array(
                'disabled'=> true))
            ->add('rue',null,array(
                'disabled'=> true))
            ->add('ville',null,array(
                'disabled'=> true))
            ->add('cp',null,array(
                'disabled'=> true))
            ->add('dateCrea',null,array(
                'disabled'=> true))
            ->add('dateModif',null,array(
                'disabled'=> true));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_client';
    }


}
