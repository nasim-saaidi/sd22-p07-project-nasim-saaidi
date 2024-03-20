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
    public function new(EntityManagerInterface $entityManager, Request $request, $product): Response
    {
        $form = $this->createForm(OrderType::class);

        //maken form uit de type
        $form = $this->createForm(OrderType::class);

        //symfony verwerkt formulier
        $form->handleRequest($request);

        //meesturen/ophalen van het product
        $product = $entityManager->getRepository(Product::class)->find($product);

        if($form->isSubmitted() && $form->isValid()) {
            //data halen uit formulir, geeft gevulde entity aan
            $task = $form->getData();

            //voeren de entity in de entitymanager in
            $entityManager->persist($task);

            //spoelen de entityManager, zo komt de data in de database
            $entityManager->flush();

            //flash message aanmaken
            $this->addFlash(
                'success',
                'De order is toegevoegd'
            );

            $order = $form->getData();
            $order->setProduct($product);
            $size = $order->getSize();
            $order->setProduct();

            if ($size === 'v-8') {
                $extraPrice = 0;
            }
            if ($size === 'v-12') {
                $extraPrice = 100;
            }
            if ($size === 'v-16') {
                $extraPrice = 200;
            }

            //stuur naar ander page
            return $this->redirectToRoute('app_front');



        }


        $order = $entityManager->getRepository(Order::class)->findAll();
        return $this->render('order/new.html.twig', [
            'form' =>$form,
            'controller_name' => 'OrderController',


        ]);

    }

}
