<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisiteChantierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etape', EntityType::class, array(
                'class' => 'MaitreOeuvreBundle:Etape',
                'property' => 'intitule',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('dateVisite')
            ->add('compteRendu',TextareaType::class)
            ->add('valider','submit');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MaitreOeuvreBundle\Entity\VisiteChantier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'maitreoeuvrebundle_visitechantier';
    }


}
