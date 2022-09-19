<?php

namespace App\Form;

use App\Entity\Tiers;
use App\Entity\TypeCompte;
use App\Entity\TreasuryAccount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TreasuryAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Tiers', EntityType::class, [
                'class' => Tiers::class
            ])
            ->add('echeance_reglement',DateType::class, [
                'widget' => 'single_text',
                'html5' => 'true',
            ])
            ->add('typeCompte', EntityType::class, [
                'class' => TypeCompte::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TreasuryAccount::class,
        ]);
    }
}
