<?php

namespace App\Form;

use App\Entity\Chambre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numchambre', null, [
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('numbatiment', NumberType::class)
            ->add('typechambre', ChoiceType::class, [
                'choices' => [
                    'Individuelle' => 'individuelle',
                    'A deux' => 'a_deux'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
