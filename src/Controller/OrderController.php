<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderController extends AbstractController
{
    #[Route('/order/{product}', name: 'app_order')]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(OrderType::class);
        if($form->isSubmitted() && $form->isValid()) {
            echo "bruh";
        }
        $order = $entityManager->getRepository(Order::class)->findAll();
        return $this->render('order/new.html.twig', [
            'form' =>$form,
            'controller_name' => 'OrderController',


        ]);

    }

}
