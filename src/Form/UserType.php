<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'E-mail'
            ])
            // ->add('roles')
            // ->add('password')
            // ->add('isVerified')
            ->add('firstname', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('lastname',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('pseudo', TextType::class, [
                'attr' => ['readonly' => true],
                'label' => 'Le pseudo ne peut être modifié !'
            ])
            // ->add('slug')
            ->add('avatar', FileType::class, [
                'label' => 'Avatar (PNG, JPEG)',
                'mapped' => false,
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}