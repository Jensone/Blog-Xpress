<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(
        CategoryRepository $categories,
        ArticleRepository $articles
    ): Response
    {
        return $this->render('homepage/homepage.html.twig', [
            'categories' => $categories->findAll(),
            'featured' => $articles->findBy(
                ['featured' => true],
                ['createdAt' => 'DESC'],
                2
            ),
            'premium' => $articles->findOneBy(
                ['isPremium' => true],
                ['createdAt' => 'DESC'],
                1
            ),
            'articles' => $articles->findBy(
                ['featured' => false],
                ['createdAt' => 'DESC'],
                3
            )
        ]);
    }

    #[Route('/frontend', name: 'frontend', methods: ['GET'])]
    public function frontend(
        CategoryRepository $categoryRepository,
        ): Response
    {
        return $this->render('homepage/frontend.html.twig', [
            'articles' => $categoryRepository->findBy(
                ['name' => 'Frontend'],
            )
        ]);
    }

    #[Route('/backend', name: 'backend', methods: ['GET'])]
    public function backend(
        ArticleRepository $articleRepository
        ): Response
    {
        return $this->render('homepage/backend.html.twig', [
            'articles' => $articleRepository->findBy(
                ['category' => 'Backend'],
                ['createdAt' => 'DESC']
            ),
        ]);
    }

    #[Route('/design', name: 'design', methods: ['GET'])]
    public function design(
        ArticleRepository $articleRepository
        ): Response
    {
        return $this->render('homepage/design.html.twig', [
            'articles' => $articleRepository->findBy(
                ['category' => 'UI/UX Design'],
                ['createdAt' => 'DESC']
            ),
        ]);
    }

    #[Route('/data', name: 'data', methods: ['GET'])]
    public function data(
        ArticleRepository $articleRepository
        ): Response
    {
        return $this->render('homepage/data.html.twig', [
            'articles' => $articleRepository->findBy(
                ['category' => 'Base de données'],
                ['createdAt' => 'DESC']
            ),
        ]);
    }

    #[Route('/cybersecurity', name: 'cybersecurity', methods: ['GET'])]
    public function cybersecurity(
        ArticleRepository $articleRepository
        ): Response
    {
        return $this->render('homepage/cybersecurity.html.twig', [
            'articles' => $articleRepository->findBy(
                ['category' => 'Cybersécurité'],
                ['createdAt' => 'DESC']
            ),
        ]);
    }

    #[Route('/article/{slug}', name: 'app_article_only', methods: ['GET'])]
    public function articleOnly(
        Article $article
        ): Response
    {
        return $this->render('homepage/article.html.twig', [
            'article' => $article,
        ]);
    }
}
