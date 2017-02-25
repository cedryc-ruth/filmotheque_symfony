<?php

namespace EPFC\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ActeurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom');
        $builder->add('dateNaissance', DateType::class, [
            'widget' => 'single_text'
        ]);
        $builder->add('sexe', ChoiceType::class, array(
            'choices'  => array(
                'Veuillez choisir' => null,
                'M' => 'M',
                'F' => 'F',
            ))
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EPFC\TestBundle\Entity\Acteur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'epfc_testbundle_acteur';
    }


}
