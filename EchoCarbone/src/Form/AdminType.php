<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class, [
            "label" => "Prénom",
            "attr" => ["placeholder" => "Insérer votre prénom"]
            ])
            ->add('lastname',TextType::class, [
                "label" => "Nom",
                "attr" => ["placeholder" => "Insérer votre nom"]
            ])
            ->add('email', EmailType::class, [
                "label" => "Email",
                "attr"  => ["placeholder" => "Insérer votre email"]
            ])
            ->add('password', PasswordType::class, [
                "label" => "Mot de passe",
                "attr"  => ["placeholder" => "Insérer votre mot de passe"]
            ])
            ->add('passwordConfirm', PasswordType::class, [
                "label" => "Confirmer votre mot de passe",
                "attr"  => ["placeholder" => "Retapez votre mot de passe"]
            ])
            ->add('image', UrlType::class, [
                'label' => 'Lien de votre avatar',
                'attr'  => ['placeholder' => "Insérer le lien de l'image"],
                'required'=>false
            ])
            ->add('Pseudo', TextType::class, [
                "label" => "Pseudo",
                "attr"  => ["placeholder" => "Insérer votre pseudo"]
            ])
            ->add('presentation', TextType::class, [
                "label" => "Présentation",
                "attr"  => ["placeholder" => "Une brève présentation de votre choix"],
                'required'=>false
            ])
            ->add('roles', ChoiceType::class, [
                    "label" => "Rôle",
                    'choices' =>
                        [
                            'Administrateur' => 'ROLE_ADMIN',
                            'Auteur' => 'ROLE_AUTHOR',
                        ]
                ,
                    'multiple' => true,
                    'expanded' => true,
                ]
            )
            ->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
