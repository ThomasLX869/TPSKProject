<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email', EmailType::class, [
                "label" => "Email",
                "attr"  => ["placeholder" => "Votre email"]
            ])
            ->add('password', PasswordType::class, [
                "label" => "Mot de passe",
                "attr"  => ["placeholder" => "Votre mot de passe"]
            ])
            ->add('image')
            ->add('pseudo')
            ->add('presentation')
            ->add('roles', ChoiceType::class, array(
                    'attr'  =>  array('class' => 'form'),
                    'choices' =>
                        array
                        (
                            'Administrateur' => 'ROLE_ADMIN',
                            'Auteur' => 'ROLE_USER',
                        )
                ,
                    'multiple' => true,
                    'required' => true,
                )
            )
            ->add('Inscription', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
