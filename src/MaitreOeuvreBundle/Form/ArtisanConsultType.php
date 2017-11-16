<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArtisanConsultType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',null,array(
                'disabled'=> true,
            ))
            ->add('dateCrea', 'date',array('disabled'=>true,))
            ->add('telPort', 'text',array(
                'disabled'=> true,
            ))
            ->add('rue', 'text',array(
                'disabled'=> true,
            ))
            ->add('ville', 'text',array(
                'disabled'=> true,
            ))
            ->add('cp', 'text',array(
                'disabled'=> true,
            ))
            ->add('specialite', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Specialite',
                'disabled'=>true,
            ))
            ->add('certification', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Certification',
                'property' => 'libelle',
                'disabled' => true,
            ))
            ->add('numPolice', 'text',array(
                'disabled'=> true,
            ))
            ->add('numAssureur', 'text',array(
                'disabled'=> true,
            ))
            ->add('site', 'text',array(
                'disabled'=> true,
            ))
            ->add('email','text',array(
                'disabled'=> true,
            ))
            ->add('avis','text',array(
                'disabled'=> true,
            ));
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
        return 'maitreoeuvrebundle_artisan';
    }


}
