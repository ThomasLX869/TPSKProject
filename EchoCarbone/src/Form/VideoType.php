<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Video;
use App\Entity\AgeRange;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                "label" => "Titre",
                "attr" => ["placeholder" => "Insérez un titre"]
            ])
            ->add('source', TextType::class, [
                "label" => "Source",
                "attr" => ["placeholder" => "Insérez une source"],
                'required' => false
            ])
            ->add('url', TextType::class, [
                "label" => "URL",
                "attr" => ["placeholder" => "Insérez une Url"]
            ])
            ->add('image', UrlType::class, [
                'label' => 'Lien de votre image',
                'attr'  => ['placeholder' => "Insérez l'image"],
                'required' => false
            ])
            ->add('description', TextType::class, [
                "label" => "Description",
                "attr"  => ["placeholder" => "Ajoutez une description"],
            ])
            ->add('content', TextType::class, [
                "label" => "Contenu",
                "attr"  => ["placeholder" => "Ajoutez un contenu"],
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
                'data_class' => Video::class,
            ]);
        }
}
