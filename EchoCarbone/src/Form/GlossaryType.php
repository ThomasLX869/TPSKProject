<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Glossary;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GlossaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('word', TextType::class, [
                "label" => "Mot ou expression",
                "attr" => ["placeholder" => "Insérez votre mot/expression"]])
            ->add('definition', TextType::class, [
                "label" => "Définition",
                "attr" => ["placeholder" => "Insérez votre défiition"]])
            ->add('source', TextType::class, [
                "label" => "Source",
                "attr" => ["placeholder" => "Insérez votre source"],
                'required'=>false])
            ->add('url', UrlType::class, [
                "label" => "Mot ou expression",
                "attr" => ["placeholder" => "Insérez votre mot/expression"],
                'required'=>false])
            ->add(
                'category',
                EntityType::class,
                [
                    // looks for choices from this entity
                    'class' => Category::class, 'choice_label' => 'label', 'multiple' => true,
                    'expanded' => true
                ])
            ->add(
                'author',
                EntityType::class,
                [
                    'class' => Admin::class, 'choice_label' => 'pseudo'
                ]);





    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Glossary::class,
        ]);
    }
}
