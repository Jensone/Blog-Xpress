<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Categories
        $webTechCategories = [
            [
                'name' => 'Front-end Development',
                'description' => 'Focuses on the client-side development of websites and web applications.',
            ],
            [
                'name' => 'Back-end Development',
                'description' => 'Deals with server-side development and handles data processing and business logic.',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Focuses on creating user interfaces and enhancing the user experience.',
            ],
            [
                'name' => 'Database Management',
                'description' => 'Involves handling data storage, retrieval, and manipulation using database technologies.',
            ],
            [
                'name' => 'Cybersecurity',
                'description' => 'Focuses on protecting computer systems and networks from unauthorized access or attacks.',
            ]
        ];

        // Articles
        $webTechArticles = [
            [
                'category' => 'Front-end Development',
                'title' => 'Introduction to Front-end Development',
                'slug' => 'introduction-to-front-end-development',
                'content' => 'Front-end development focuses on creating user interfaces and enhancing the user experience. It involves using HTML, CSS, and JavaScript to build interactive websites and web applications that users can interact with directly in their browsers.',
                'featured' => false
            ],
            [
                'category' => 'Front-end Development',
                'title' => 'Top Front-end Frameworks in 2023',
                'slug' => 'top-front-end-frameworks-in-2023',
                'content' => 'Front-end development is evolving rapidly, and several frameworks have gained popularity. Some of the top front-end frameworks in 2023 include React, Angular, and Vue.js. These frameworks provide efficient tools and libraries that help developers build dynamic and responsive user interfaces.',
                'featured' => true
            ],
            [
                'category' => 'Back-end Development',
                'title' => 'Understanding Back-end Development',
                'slug' => 'understanding-back-end-development',
                'content' => 'Back-end development involves server-side programming and handling data processing and business logic. It focuses on the behind-the-scenes functionality that powers websites and web applications. Back-end developers often work with languages like PHP, Python, or Node.js and interact with databases to retrieve and manipulate data.',
                'featured' => false
            ],
            [
                'category' => 'Back-end Development',
                'title' => 'Building RESTful APIs with Node.js',
                'slug' => 'building-restful-apis-with-node-js',
                'content' => 'Building RESTful APIs is a crucial part of back-end development. Node.js, with its non-blocking and event-driven architecture, is an excellent choice for building high-performance APIs. With popular frameworks like Express.js, developers can create robust and scalable APIs that allow clients to interact with server resources.',
                'featured' => true
            ],
            [
                'category' => 'UI/UX Design',
                'title' => 'The Importance of UI/UX Design',
                'slug' => 'the-importance-of-ui-ux-design',
                'content' => 'UI/UX design plays a critical role in creating user-friendly and visually appealing interfaces. It involves understanding user needs, conducting research, and designing intuitive and engaging user experiences. By focusing on usability, accessibility, and aesthetics, UI/UX designers contribute to the success of websites and applications.',
                'featured' => false
            ],
            [
                'category' => 'UI/UX Design',
                'title' => 'Designing Mobile-first User Interfaces',
                'slug' => 'designing-mobile-first-user-interfaces',
                'content' => 'With the rise of mobile devices, designing mobile-first user interfaces has become essential. Mobile-first design prioritizes the mobile user experience, ensuring that websites and applications look and function well on smaller screens. By starting with mobile design, developers can create responsive and adaptive interfaces that scale up to larger devices.',
                'featured' => false
            ],
            [
                'category' => 'Database Management',
                'title' => 'Introduction to Database Management',
                'slug' => 'introduction-to-database-management',
                'content' => 'Database management is crucial for handling data storage, retrieval, and manipulation using database technologies. It involves understanding different database models (e.g., relational, NoSQL), optimizing query performance, ensuring data integrity, and implementing efficient data storage strategies.',
                'featured' => false
            ],
            [
                'category' => 'Database Management',
                'title' => 'Exploring NoSQL Databases',
                'slug' => 'exploring-nosql-databases',
                'content' => 'NoSQL databases have gained popularity for handling large-scale and unstructured data. These databases provide flexibility, scalability, and fast data retrieval, making them suitable for modern applications. Popular NoSQL databases include MongoDB, Cassandra, and Redis, each with its unique features and use cases.',
                'featured' => false
            ],
            [
                'category' => 'Cybersecurity',
                'title' => 'Understanding Cybersecurity Threats',
                'slug' => 'understanding-cybersecurity-threats',
                'content' => 'Cybersecurity focuses on protecting computer systems and networks from unauthorized access or attacks. Understanding common cybersecurity threats, such as malware, phishing, and data breaches, is crucial for implementing effective security measures. By staying informed about the latest security practices, organizations can safeguard their digital assets.',
                'featured' => false
            ],
            [
                'category' => 'Cybersecurity',
                'title' => 'Securing Web Applications',
                'slug' => 'securing-web-applications',
                'content' => 'Securing web applications is vital to prevent vulnerabilities and protect user data. Implementing measures such as secure coding practices, input validation, user authentication, and encryption helps defend against common web application attacks. Regular security audits and updates ensure that applications stay resilient against evolving threats.',
                'featured' => true
            ]
        ];

        // Boucle pour créer les catégories à partir du tableau $webTechCategories
        foreach ($webTechCategories as $webTechCategory) {
            $category = new Category();
            $category->setName($webTechCategory['name']);
            $category->setDescription($webTechCategory['description']);
            
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($category);
        }

        // Boucle pour créer les articles à partir du tableau $webTechArticles
        foreach ($webTechArticles as $webTechArticle) {
            $article = new Article();
            $article->setCategory($category);
            $article->setSlug($webTechArticle['slug']);
            $article->setTitle($webTechArticle['title']);
            $article->setCreatedAt(new \DateTimeImmutable());
            $article->setContent($webTechArticle['content']);
            $article->setFeatured($webTechArticle['featured']);
            
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($article);
        }

        $manager->flush();
    }
}
