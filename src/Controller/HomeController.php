<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/homepro', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hello, im bussin',
        ]);
    }

    public function front(EntityManagerInterface $entityManager): Response
    {
        $category = $entityManager->getRepository(Category::class)->findAll();

        return $this->render('front/index.html.twig', [
            'category' => $category,
            'controller_name' => 'FrontController',
        ]);
    }
}
