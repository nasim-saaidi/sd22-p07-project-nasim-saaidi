<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function Index(EntityManagerInterface $entityManager): Response
    {
        $orderShow = $entityManager->getRepository(Order::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'FrontController',
            'orders' => $orderShow
        ]);
    }

    #[Route('/admin_delete/{order}', name: 'app_order_delete')]
    public function delete(EntityManagerInterface $entityManager, Order $order): response
    {
        $entityManager->remove($order);
        $entityManager->flush();


        $this->addFlash(
            'success',
            'order is verwijdert'
        );
        return $this->redirectToRoute('app_admin');

    }



}
