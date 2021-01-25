<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Video;
use App\Entity\AgeRange;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('source')
            ->add('url')
            ->add('image')
            ->add('description')
            ->add('updateDate')
            ->add('creationDate')
            ->add('content')
            ->add('nbLike')
            ->add('nbDislike')
            // ->add('category')
            // ->add('ageRange')
            // ->add('author')
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
