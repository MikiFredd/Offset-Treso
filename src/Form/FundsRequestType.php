<?php

namespace App\Form;

use App\Entity\CashAccount;
use App\Entity\FundsRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FundsRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',  DateType::class, [
                'widget' => 'single_text',
                'html5' => 'true',
            ])
            ->add('caisse', EntityType::class, [
                'class' => CashAccount::class,
                'placeholder' => 'Choisissez la caisse'
            ])
            ->add('montant_depenses', TextType::class)
            ->add('solde_apres', TextType::class)
            ->add('objet', TextareaType::class)
            ->add('montant', TextType::class)
            ->add('montant_lettres', TextareaType::class)
            //->add('created_at', TextType::class)
            //->add('updated_at', TextType::class)
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FundsRequest::class,
        ]);
    }
}
