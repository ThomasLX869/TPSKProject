<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('source')
            ->add('url')
            ->add('image')
            ->add('articleCategory')
            ->add('articleAgeRange')
            ->add('description')
            ->add('updateDate')
            ->add('creationDate')
            ->add('articleAuthor')
            ->add('content')
            ->add('nbLike')
            ->add('nbDislike')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
