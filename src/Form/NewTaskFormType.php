<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;

class NewTaskFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('details')
            ->add('fechaCreacion', DateType::class, [
                'mapped' => false,
                'widget'=>'single_text',
                'input' => 'datetime',
                'html5' => 'false',
                'constraints' => [
                    new NotBlank(['message'=>'Elija una fecha!']),
                    new LessThanOrEqual([
                        'value'=>'today',
                        'message'=>'La fecha debe ser el dia de hoy o anterior',
                    ]),
                ],
            ])
            ->add('category')
            ->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
