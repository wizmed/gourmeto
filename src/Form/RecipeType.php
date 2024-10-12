<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de la recette',
                'attr' => [
                    'class' => 'form-control',
                ],
                'row_attr' => [
                    'class' => 'mb-3 w-100 pe-2',
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu de la recette',
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'height: 30vh',
                ]
            ])
            ->add('duration', IntegerType::class, [
                'label' => 'Durée (en minutes)',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'boutton-custom-orange rounded-pill']
            ]);

        // Ajouter les champs de date et slug uniquement si `include_options` est vrai
        if ($options['include_options']) {
            $builder
                ->add('created_at', DateType::class, [
                    'label' => 'Date de création',
                    'widget' => 'single_text',
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'row_attr' => [
                        'class' => 'mb-3',
                    ]
                ])
                ->add('updated_at', DateType::class, [
                    'label' => 'Date de mise à jour',
                    'widget' => 'single_text',
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'row_attr' => [
                        'class' => 'mb-3',
                    ]
                ])
                ->add('slug', TextType::class, [
                    'label' => 'Slug',
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
            'include_options' => false, // Valeur par défaut
        ]);
    }
}
