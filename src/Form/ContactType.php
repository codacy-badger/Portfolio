<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::Class, [
                'label'  => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom',
                    'class' => 'form-control'
                ]
            ])
            ->add('email', TextType::Class, [
                'label'  => 'Adresse Mail',
                'attr' => [
                    'placeholder' => 'Entrez votre adresse mail',
                    'class' => 'form-control'
                ]
            ])
            ->add('phone', TextType::class, [
                'label'  => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone',
                    'class' => 'form-control'
                ]
            ])
            ->add('message', TextareaType::Class, [
                'label'  => 'Message',
                'attr' => [
                    'placeholder' => 'Écrivez votre message',
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'App\Entity\Contact']);
    }

    public function getBlockPrefix()
    {
        return 'app_contact';
    }

}