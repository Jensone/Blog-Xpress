<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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


        foreach ($webTechCategories as $webTechCategory) {
            $category = new Category();
            $category->setName($webTechCategory['name']);
            $category->setDescription($webTechCategory['description']);
            $manager->persist($category);
        }
        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
