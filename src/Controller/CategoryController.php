<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{

    #[Route('/category/{category}', name: 'app_category')]
    public function show(EntityManagerInterface $entityManager, $content ): Response
    {
        $sto = $entityManager->getRepository(Category::class)->find($content);

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'content' => $sto
        ]);
    }
}
