<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Quizz;
use App\Entity\AgeRange;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuizzType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
            "label" => "Titre",
            "attr"  =>["placeholder" => "Ecrire le titre de votre quizz"] 
            ])

            ->add('source', TextType::class, [
                "label" => "Source",
                "attr"  =>["placeholder" => "Merci de préciser la source"],
                "required" =>false 
                ])

                ->add('url', TextType::class, [
                "label" => "Source",
                "attr"  =>["placeholder" => "Merci de préciser l'url"] 
                ])

            ->add('image', UrlType::class, [
                'label' => "Lien de votre avatar",
                'attr'  => ['placeholder' => "Insérer le lien de l'image"],
                "required" =>false 
                ])

            ->add('description', TextType::class, [
                "label" => "description",
                "attr"  => ["placeholder" => "Merci de compléter la description "],
                'required'=>false
                ])

            ->add('question', TextType::class, [
                "label" => "question",
                "attr"  => ["placeholder" => "Merci de saisir la question "]
                ])

            ->add('answer', TextType::class, [
                "label" => "answer",
                "attr"  => ["placeholder" => "Merci de saisir la réponse"],
                ])

            ->add(
                'category',
                EntityType::class,
                [
                    // looks for choices from this entity
                    'class' => Category::class, 'choice_label' => 'label', 'multiple' => true,
                    'expanded' => true
                ]
            )
            ->add(
                'ageRange',
                EntityType::class,
                [
                    'class' => AgeRange::class, 'choice_label' => 'label',
                    'expanded' => true,
                    'multiple' => true
                ]
            )
            ->add(
                'author',
                EntityType::class,
                [
                    'class' => Admin::class, 'choice_label' => 'pseudo'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quizz::class,
        ]);
    }
}
