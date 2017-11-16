<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArtisanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('plainPassword', PasswordType::class)
            ->add('dateCrea', 'date')
            ->add('telPort', 'text')
            ->add('rue', 'text')
            ->add('ville', 'text')
            ->add('cp', 'text')
            ->add('specialite', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Specialite'
            ))
            ->add('certification', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Certification',
                'multiple' => true,
                'expanded' => false,
                'property' => 'libelle'
            ))
            ->add('numPolice', 'text')
            ->add('numAssureur', 'text')
            ->add('enabled')
            ->add('site', 'text')
            ->add('email','text')
            ->add('avis','text')
            ->add('Ajouter', 'submit');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User',
            'allow_add'    => true,
            'allow_delete' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'maitreoeuvrebundle_client';
    }


}
