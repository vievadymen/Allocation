<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Chambre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule', null, [
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('nom')
            ->add('prenom')
            ->add('datenaissance', null, [
                'widget' => 'single_text'
            ])
            ->add('email')
            ->add('tel')
            ->add(
            'typeetudiant', ChoiceType::class, [
                'choices' => [
                    'Boursier' => 'Boursier',
                    'Non Boursier' => 'non_boursier'
                ]
            ])
            ->add('adresse', null, [
                'required' => false
            ])
            ->add('chambre', EntityType::class,[
                'class' => Chambre::class,
                'choice_label' => 'numchambre',
                'label' => false
            ],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
