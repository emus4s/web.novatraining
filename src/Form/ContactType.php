<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre',TextType::class,[
                'mapped'=>false,
                'constraints'=> [
                    new NotBlank(),
                ]
            ])
            ->add('apellido',TextType::class,[
                'mapped'=>false,
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('telefono',NumberType::class,[
                'mapped'=>false,
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('email',EmailType::class,[
                'mapped'=>false,
                'constraints'=>[
                    new NotBlank(),
                ]
            ])
            ->add('mensaje',TextareaType::class,[
                'mapped'=>false,
                'constraints'=> [
                    new NotBlank()
                ]
            ])
           // ->add('enviar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
