<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CompanyName', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Forme', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Activities', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Numero_RCC', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Numero_CC', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Telephone', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Adresse', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Siege_social', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Capital_social', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Gerant', TextType::class, [
                'attr' => [
                    'required' => true, 
                ]
            ])
            ->add('Annee_debut_activ', DateType::class, [
                'widget' => 'single_text',
                'html5' => 'true',
            ])
            //->add('createdAt')
            //->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
