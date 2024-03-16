<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route('/front', name: 'app_front')]

    public function front(EntityManagerInterface $entityManager): Response
    {

        $category = $entityManager->getRepository(Category::class)->findAll();
        return $this->render('front/index.html.twig', [

            'category' => $category,
            'controller_name' => 'FrontController',
        ]);
    }
}
