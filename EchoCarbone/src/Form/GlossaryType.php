<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Glossary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GlossaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('word')
            ->add('definition')
            ->add('source')
            ->add('url')
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
            'data_class' => Glossary::class,
        ]);
    }
}
