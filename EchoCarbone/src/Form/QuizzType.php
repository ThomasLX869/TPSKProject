<?php

namespace App\Form;

use App\Entity\Quizz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizzType extends AbstractType
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
            ->add('question')
            ->add('answer')
            ->add('nbLike')
            ->add('nbDislike')
            ->add('category')
            ->add('ageRange')
            ->add('author')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quizz::class,
        ]);
    }
}
