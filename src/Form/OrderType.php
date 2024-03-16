<?php

namespace App\Form;

use App\Entity\Order;
use App\Entity\product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('total_price')
            ->add('first_name')
            ->add('last_name')
            ->add('street_name')
            ->add('house_number')
            ->add('zip_code')
            ->add('city')
            ->add('size')
            ->add('product', EntityType::class, [
                'class' => product::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
