<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArtisanEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password', 'repeated', array(
                'required' => false,
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Nouveau mdp'),
                'second_options' => array('label' => 'Confirmation mdp'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('dateCrea', 'date',array( 'attr'=>array('style'=>'display:none;')) )
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
            ->add('enabled')
            ->add('numAssureur', 'text')
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
