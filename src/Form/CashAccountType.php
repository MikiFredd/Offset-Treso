<?php

namespace App\Form;

use App\Entity\CashAccount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CashAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('num_cpte', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            //->add('code_journal', TextType::class, [
            //    'attr' => [
            //        'required' => false,
            //    ]
            //])
            ->add('solde_ouv', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('plafond', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('solde_plancher', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('caissier', TextType::class, [
                'attr' => [
                    'required' => false, 
                ]
            ])
            ->add('contact', TextType::class, [
                'attr' => [
                    'required' => false, 
                ]
            ])
            ->add('responsable', TextType::class, [
                'attr' => [
                    'required' => false, 
                ]
            ])
            //->add('created_at')
            //->add('updated_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CashAccount::class,
        ]);
    }
}
