<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(
        ArticleRepository $articles
    ): Response
    {
        return $this->render('homepage/homepage.html.twig', [
            'articles' => $articles->findBy(
                ['featured' => false],
                ['createdAt' => 'DESC'],
                4
            )
        ]);
    }

}
