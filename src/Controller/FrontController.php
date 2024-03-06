<?php

namespace App\Controller;



use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    public function show(EntityManager $entityManager, $category): Response
    {
        $categoryShow = $entityManager->getRepository(Category::class)->find($category);
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'category_show' => $categoryShow,
        ]);
    }
}
