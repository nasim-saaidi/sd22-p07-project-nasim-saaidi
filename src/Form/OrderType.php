<?php

namespace App\Form;

use App\Entity\Order;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, ['label' => 'voornaam'])
            ->add('last_name', TextType::class, ['label' => 'achternaam'])
            ->add('street_name', TextType::class, ['label' => 'straatnaam'])
            ->add('house_number', TextType::class, ['label' => 'huisnummer'])
            ->add('zip_code', TextType::class, ['label' => 'zipcode'])
            ->add('city', TextType::class, ['label' => 'stad'])
            ->add('size', ChoiceType::class, [
                'label' => 'motor',
                'choices' => [
                    'v-8 motor + 0 euro' => 'v-8',
                    'v-12 motor + 100 euro ' => 'v-12',
                    'v-16 motor + 200 euro' => 'v-16'
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
