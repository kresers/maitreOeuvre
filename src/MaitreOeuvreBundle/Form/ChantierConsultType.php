<?php

namespace MaitreOeuvreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ChantierConsultType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'text',array(
                'disabled'=> true,
            ))
            ->add('numPermis',null,array(
                'disabled'=> true,
            ))
            ->add('ville', 'text',array(
                'disabled'=>true,
            ))
            ->add('rue', 'text',array(
                'disabled'=> true,
            ))
            ->add('cp', 'text',array(
                'disabled'=> true,
            ))
            ->add('etat', 'text',array(
                'disabled'=> true,
            ));
            /**->add('client', EntityType::class, array(
                'class' => 'UserBundle:User',
                'disabled'=>true,
            ))**/

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
