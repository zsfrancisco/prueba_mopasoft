<?php

namespace App\Form;

use App\Entity\Reserva;
use App\Entity\Sala;
use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hora_inicio_reserva', ChoiceType::class, [
                'choices'  => [
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                    '14' => 14,
                    '15' => 15,
                    '16' => 16,
                    '17' => 17,
                    '18' => 18,
                ],
            ])
            ->add('hora_fin_reserva', ChoiceType::class, [
                'choices'  => [
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                    '14' => 14,
                    '15' => 15,
                    '16' => 16,
                    '17' => 17,
                    '18' => 18,
                ],
            ])
            ->add('sala', EntityType::class,[
                'class' => Sala::class,
                'choice_label'=>'nombre_sala'
            ])
            ->add('cliente_reserva', EntityType::class,[
                'class' => Cliente::class,
                'choice_label'=>'cedula_cliente'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reserva::class,
        ]);
    }
}
