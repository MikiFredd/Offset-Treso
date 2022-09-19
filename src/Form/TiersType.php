<?php

namespace App\Form;

use App\Entity\Tiers;
use App\Entity\TypeTiers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TiersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Code')
            ->add('intitule')
            ->add('raison_sociale')
            ->add('telephone')
            ->add('address')
            ->add('postal')
            ->add('num_cc')
            ->add('siege')
            ->add('typeTiers', EntityType::class,
            [
                'class' => TypeTiers::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tiers::class,
        ]);
    }
}
