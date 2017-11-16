<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtapeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule')
            ->add('chantier', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Chantier',
                'property' => 'numPermis',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('specialite', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Specialite',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('dateDeb', 'date')
            ->add('dateFin', 'date')
            ->add('ajout', 'submit');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MaitreOeuvreBundle\Entity\Etape'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'maitreoeuvrebundle_etape';
    }


}
