<?php

namespace MaitreOeuvreBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ChantierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $role = array('ROLE_CLIENT');
        $builder
            ->add('numPermis')
            ->add('typeChantier', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:TypeChantier',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('client', EntityType::class, array(
                'class' => 'UserBundle:User',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :ROLE')
                        ->setParameter('ROLE', '%'.'ROLE_CLIENT'.'%');},
                'property' => 'prenom',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('rue')
            ->add('cp')
            ->add('ville')
            ->add('etat')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('Ajouter','submit');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MaitreOeuvreBundle\Entity\Chantier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'maitreoeuvrebundle_chantier';
    }
}
