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
    // Route pour afficher la page d'accueil
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

    // Route pour afficher les articles de la catégorie Frontend
    #[Route('/frontend', name: 'frontend', methods: ['GET'])]
    public function frontend(
        CategoryRepository $categoryRepository,
        ): Response
    {
        return $this->render('homepage/articles.html.twig', [
            'articles' => $categoryRepository->findBy(
                ['name' => 'Frontend'],
            )
        ]);
    }

    // Route pour afficher les articles de la catégorie Backend
    #[Route('/backend', name: 'backend', methods: ['GET'])]
    public function backend(
        CategoryRepository $categoryRepository
        ): Response
    {
        return $this->render('homepage/articles.html.twig', [
            'articles' => $categoryRepository->findBy(
                ['name' => 'Backend'],
            )
        ]);
    }

    // Route pour afficher les articles de la catégorie UI/UX Design
    #[Route('/design', name: 'design', methods: ['GET'])]
    public function design(
        CategoryRepository $categoryRepository
        ): Response
    {
        return $this->render('homepage/articles.html.twig', [
            'articles' => $categoryRepository->findBy(
                ['name' => 'UI/UX Design'],
            ),
        ]);
    }

    // Route pour afficher les articles de la catégorie Base de données
    #[Route('/data', name: 'data', methods: ['GET'])]
    public function data(
        CategoryRepository $categoryRepository
        ): Response
    {
        return $this->render('homepage/articles.html.twig', [
            'articles' => $categoryRepository->findBy(
                ['name' => 'Base de données'],
            )
        ]);
    }

    // Route pour afficher les articles de la catégorie Cybersécurité
    #[Route('/cybersecurity', name: 'cybersecurity', methods: ['GET'])]
    public function cybersecurity(
        CategoryRepository $categoryRepository
        ): Response
    {
        return $this->render('homepage/articles.html.twig', [
            'articles' => $categoryRepository->findBy(
                ['name' => 'Cybersécurité'],
            )
        ]);
    }

    // Route pour afficher un article de n'importe quelle catégorie
    #[Route('/article/{slug}', name: 'app_article_only', methods: ['GET'])]
    public function articleOnly(
        Article $article
        ): Response
    {
        return $this->render('homepage/article.html.twig', [
            'article' => $article,
        ]);
    }

    // Route pour afficher les articles premium
    #[Route('/premium', name: 'premium', methods: ['GET'])]
    public function premium(
        ArticleRepository $articleRepository
    ): Response
    {
        return $this->render('homepage/premium.html.twig', [
            'articles' => $articleRepository->findBy(
                ['isPremium' => true],
                ['createdAt' => 'DESC'],
            ),
            'stripe_key' => $_ENV["STRIPE_KEY"],
        ]);
    }
}
