<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderController extends AbstractController
{
    #[Route('/order/{product}', name: 'app_order')]
    public function new(EntityManagerInterface $entityManager, Request $request, Product $product): Response
    {
        //maken form uit de type
        $form = $this->createForm(OrderType::class);

        //symfony verwerkt formulier
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $product->addProduct($order);
            $size = $order->getSize();


            $extraPrice = 0;
            if ($size === 'v-12') {
                $extraPrice = 100;
            } elseif ($size === 'v-16') {
                $extraPrice = 200;
            }

            //veranderen prijs product
            $order->setTotalPrice($product->getPrice() + $extraPrice);

            $entityManager->persist($order);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'order is aangemaakt'
            );
            //stuur naar ander page
            return $this->redirectToRoute('app_front');
        }

//        $order = $entityManager->getRepository(Order::class)->findAll();
        return $this->render('order/new.html.twig', [
            'form' =>$form,
            'controller_name' => 'OrderController',
            'product' => $product
        ]);




    }




}
