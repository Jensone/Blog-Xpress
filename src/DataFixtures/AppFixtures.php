<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Création d'un utilisateur ADMIN
        $admin = new User();
        $admin->setEmail('hello@blogxpress.fr');
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setPassword('$2y$13$0YLl5ftr31zS1vN7BMs6getunDRHUi1vXxObuJ9rvV98T2wbJ0hBS');
        $manager->persist($admin);
        
        // Ajout des categories
        $frontendCategory = new Category();
        $frontendCategory->setName('Frontend');
        $frontendCategory->setDescription('Se concentre sur le développement côté client des sites Web et des applications Web.');
        $manager->persist($frontendCategory);

        $backendCategory = new Category();
        $backendCategory ->setName('Backend');
        $backendCategory ->setDescription('Traite du développement côté serveur et gère le traitement des données et la logique métier.');
        $manager->persist($backendCategory);

        $uxCategory = new Category();
        $uxCategory ->setName('UI/UX Design');
        $uxCategory ->setDescription('Se concentre sur la création d\'interfaces utilisateur et l\'amélioration de l\'expérience utilisateur.');
        $manager->persist($uxCategory);

        $bddCategory = new Category();
        $bddCategory ->setName('Base de Données');
        $bddCategory ->setDescription('Implique la gestion du stockage, de la récupération et de la manipulation des données à l\'aide de technologies de base de données.');
        $manager->persist($bddCategory);

        $cyberCategory = new Category();
        $cyberCategory ->setName('Cybersécurité');
        $cyberCategory ->setDescription('Se concentre sur la protection des systèmes informatiques et des réseaux contre les accès non autorisés ou les attaques.');
        $manager->persist($cyberCategory);

        // Articles
        $frontend = [
            [
                'category' => $frontendCategory,
                'title' => 'Introduction au Développement Front-end',
                'slug' => 'introduction-au-developpement-front-end',
                'content' => 'Le développement front-end se concentre sur la création d\'interfaces utilisateur et l\'amélioration de l\'expérience utilisateur. Il implique l\'utilisation de HTML, CSS et JavaScript pour construire des sites Web interactifs et des applications Web avec lesquels les utilisateurs peuvent interagir directement dans leur navigateur.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $frontendCategory,
                'title' => 'Meilleurs Frameworks Front-end en 2023',
                'slug' => 'meilleurs-frameworks-front-end-en-2023',
                'content' => 'Le développement front-end évolue rapidement et plusieurs frameworks ont gagné en popularité. Parmi les meilleurs frameworks front-end en 2023, on retrouve React, Angular et Vue.js. Ces frameworks fournissent des outils et des bibliothèques efficaces qui aident les développeurs à construire des interfaces utilisateur dynamiques et réactives.',
                'isPremium' => false,
                'featured' => true
            ],
            [
                'category' => $frontendCategory,
                'title' => 'Optimisation des performances Front-end',
                'slug' => 'optimisation-des-performances-front-end',
                'content' => 'L\'optimisation des performances est un aspect crucial du développement front-end. Cela implique l\'utilisation de techniques telles que la minification des fichiers CSS et JavaScript, la mise en cache des ressources, l\'optimisation des requêtes réseau, etc. pour garantir des temps de chargement rapides et une expérience utilisateur fluide.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $frontendCategory,
                'title' => 'Responsive Web Design',
                'slug' => 'responsive-web-design',
                'content' => 'Le Responsive Web Design est une approche de conception qui vise à rendre les sites Web et les applications Web adaptatifs à différents appareils et tailles d\'écran. En utilisant des techniques telles que les media queries et les grilles CSS, les développeurs peuvent créer des interfaces qui s\'ajustent automatiquement et offrent une expérience utilisateur cohérente sur tous les appareils.',
                'isPremium' => true,
                'featured' => false
            ],
            [
                'category' => $frontendCategory,
                'title' => 'Accessibilité Web',
                'slug' => 'accessibilite-web',
                'content' => 'L\'accessibilité Web consiste à concevoir et à développer des sites Web et des applications Web qui peuvent être utilisés par tous, y compris les personnes ayant des handicaps ou des limitations. Cela implique l\'utilisation de bonnes pratiques, telles que l\'utilisation appropriée des balises HTML, l\'ajout d\'attributs d\'accessibilité, la prise en charge des lecteurs d\'écran, etc.',
                'isPremium' => false,
                'featured' => false
            ]
        ];

        // Boucle pour créer la catégorie $frontend
        foreach ($frontend as $item) {
            $article = new Article();
            $article->setCategory($item['category']);
            $article->setSlug($item['slug']);
            $article->setTitle($item['title']);
            $article->setCreatedAt(new DateTimeImmutable());
            $article->setContent($item['content']);
            $article->setIsPremium($item['isPremium']);
            $article->setFeatured($item['featured']);
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($article);
        }
        
        $backend = [
            [
                'category' => $backendCategory,
                'title' => 'Comprendre le Développement Backend',
                'slug' => 'comprendre-le-developpement-backend',
                'content' => 'Le développement backend implique la programmation côté serveur et la gestion du traitement des données et de la logique métier. Il se concentre sur les fonctionnalités en coulisses qui alimentent les sites Web et les applications Web. Les développeurs backend travaillent souvent avec des langages tels que PHP, Python ou Node.js et interagissent avec des bases de données pour récupérer et manipuler des données.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $backendCategory,
                'title' => 'Construction d\'APIs RESTful avec Node.js',
                'slug' => 'construction-d-apis-restful-avec-node-js',
                'content' => 'La construction d\'APIs RESTful est une partie cruciale du développement backend. Node.js, avec son architecture non bloquante et événementielle, est un excellent choix pour construire des APIs performantes. Avec des frameworks populaires comme Express.js, les développeurs peuvent créer des APIs robustes et évolutives qui permettent aux clients d\'interagir avec les ressources du serveur.',
                'isPremium' => false,
                'featured' => true
            ],
            [
                'category' => $backendCategory,
                'title' => 'Gestion des Bases de Données avec MySQL',
                'slug' => 'gestion-des-bases-de-donnees-avec-mysql',
                'content' => 'La gestion des bases de données est une compétence essentielle pour les développeurs backend. MySQL est l\'un des systèmes de gestion de bases de données relationnelles les plus populaires. Les développeurs peuvent utiliser SQL pour créer, interroger et maintenir des bases de données MySQL, permettant ainsi le stockage et la récupération efficace des données.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $backendCategory,
                'title' => 'Sécurité Web pour les Applications Backend',
                'slug' => 'securite-web-pour-les-applications-backend',
                'content' => 'La sécurité Web est d\'une importance capitale lors du développement d\'applications backend. Les développeurs doivent se protéger contre les attaques courantes telles que les injections SQL, les attaques par force brute, les vulnérabilités XSS, etc. en appliquant les meilleures pratiques de sécurité, telles que la validation des entrées utilisateur, l\'utilisation de pare-feu applicatifs Web (WAF), et l\'utilisation de protocoles de sécurité tels que HTTPS.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $backendCategory,
                'title' => 'Déploiement d\'Applications Backend avec Docker',
                'slug' => 'deploiement-d-applications-backend-avec-docker',
                'content' => 'Le déploiement d\'applications backend peut être simplifié et rendu plus portable avec Docker. Docker permet d\'empaqueter une application avec toutes ses dépendances dans un conteneur, ce qui garantit une exécution cohérente sur différents environnements. Les développeurs peuvent utiliser Docker pour créer des images d\'application, les distribuer et les exécuter facilement sur des serveurs.',
                'isPremium' => false,
                'featured' => false
            ]
        ];

        // Boucle pour créer la catégorie $backend
        foreach ($backend as $item) {
            $article = new Article();
            $article->setCategory($item['category']);
            $article->setSlug($item['slug']);
            $article->setTitle($item['title']);
            $article->setCreatedAt(new DateTimeImmutable());
            $article->setContent($item['content']);
            $article->setIsPremium($item['isPremium']);
            $article->setFeatured($item['featured']);
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($article);
        }
        
        $ux = [
            [
                'category' => $uxCategory,
                'title' => 'L\'Importance du Design UI/UX',
                'slug' => 'l-importance-du-design-ui-ux',
                'content' => 'Le design UI/UX joue un rôle crucial dans la création d\'interfaces conviviales et esthétiquement attrayantes. Il implique de comprendre les besoins des utilisateurs, de mener des recherches et de concevoir des expériences utilisateur intuitives et engageantes. En se concentrant sur l\'utilisabilité, l\'accessibilité et l\'esthétique, les designers UI/UX contribuent au succès des sites Web et des applications.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $uxCategory,
                'title' => 'Conception d\'Interfaces Utilisateur Mobiles',
                'slug' => 'conception-d-interfaces-utilisateur-mobiles',
                'content' => 'Avec la montée des appareils mobiles, la conception d\'interfaces utilisateur mobiles est devenue essentielle. Le design mobile-first privilégie l\'expérience utilisateur mobile, en veillant à ce que les sites Web et les applications aient un aspect et une fonctionnalité adaptés aux écrans plus petits. En commençant par la conception mobile, les développeurs peuvent créer des interfaces réactives et adaptatives qui s\'adaptent aux appareils plus grands.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $uxCategory,
                'title' => 'Psychologie des Couleurs dans le Design',
                'slug' => 'psychologie-des-couleurs-dans-le-design',
                'content' => 'La psychologie des couleurs joue un rôle important dans le design UI/UX. Les différentes couleurs peuvent avoir un impact sur les émotions, les perceptions et les comportements des utilisateurs. Comprendre comment les couleurs sont perçues et utiliser judicieusement la palette de couleurs peut aider les designers à transmettre efficacement des messages et à créer des expériences visuelles engageantes.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $uxCategory,
                'title' => 'Amélioration de l\'Expérience Utilisateur avec l\'Animation',
                'slug' => 'amelioration-de-l-experience-utilisateur-avec-l-animation',
                'content' => 'L\'animation peut jouer un rôle clé dans l\'amélioration de l\'expérience utilisateur. Les transitions fluides, les micro-interactions et les effets visuels subtils peuvent rendre l\'utilisation d\'une interface plus agréable et intuitive. Les designers UI/UX utilisent l\'animation pour guider les utilisateurs, renforcer les interactions et ajouter une touche de dynamisme aux interfaces.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $uxCategory,
                'title' => 'Conception d\'Interfaces Utilisateur Accessibles',
                'slug' => 'conception-d-interfaces-utilisateur-accessibles',
                'content' => 'La conception d\'interfaces utilisateur accessibles vise à rendre les sites Web et les applications utilisables par tous, y compris les personnes ayant des limitations physiques ou cognitives. En adoptant des pratiques de conception inclusives, les designers UI/UX peuvent créer des interfaces accessibles qui offrent une expérience optimale à tous les utilisateurs, quelles que soient leurs capacités.',
                'isPremium' => false,
                'featured' => false
            ]
        ];

        // Boucle pour créer la catégorie $ux
        foreach ($ux as $item) {
            $article = new Article();
            $article->setCategory($item['category']);
            $article->setSlug($item['slug']);
            $article->setTitle($item['title']);
            $article->setCreatedAt(new DateTimeImmutable());
            $article->setContent($item['content']);
            $article->setIsPremium($item['isPremium']);
            $article->setFeatured($item['featured']);
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($article);
        }

        $bdd = [
            [
                'category' => $bddCategory,
                'title' => 'Introduction à la Gestion de Base de Données',
                'slug' => 'introduction-a-la-gestion-de-base-de-donnees',
                'content' => 'La gestion de base de données est cruciale pour la gestion du stockage, de la récupération et de la manipulation des données à l\'aide de technologies de base de données. Cela implique de comprendre différents modèles de base de données (par exemple, relationnelles, NoSQL), d\'optimiser les performances des requêtes, de garantir l\'intégrité des données et de mettre en œuvre des stratégies efficaces de stockage des données.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $bddCategory,
                'title' => 'Exploration des Bases de Données NoSQL',
                'slug' => 'exploration-des-bases-de-donnees-nosql',
                'content' => 'Les bases de données NoSQL ont gagné en popularité pour la gestion de données à grande échelle et non structurées. Ces bases de données offrent une flexibilité, une évolutivité et une récupération rapide des données, ce qui les rend adaptées aux applications modernes. Les bases de données NoSQL populaires incluent MongoDB, Cassandra et Redis, chacune avec ses fonctionnalités et ses cas d\'utilisation uniques.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $bddCategory,
                'title' => 'Les Avantages des Bases de Données Relationnelles',
                'slug' => 'les-avantages-des-bases-de-donnees-relationnelles',
                'content' => 'Les bases de données relationnelles offrent une structure et une organisation rigoureuses pour la gestion des données. Elles utilisent des tables, des clés primaires et des relations pour représenter les données de manière cohérente. Les bases de données relationnelles sont adaptées aux applications nécessitant une intégrité des données, des opérations complexes de jointure et une gestion précise des relations entre les entités.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $bddCategory,
                'title' => 'Sécurité des Bases de Données : Bonnes Pratiques',
                'slug' => 'securite-des-bases-de-donnees-bonnes-pratiques',
                'content' => 'La sécurité des bases de données est essentielle pour protéger les données sensibles des utilisateurs et des entreprises. Les bonnes pratiques de sécurité incluent la gestion des accès et des autorisations, le chiffrement des données, la détection des intrusions et la sauvegarde régulière des données. Les administrateurs de bases de données doivent également suivre les mises à jour de sécurité et les meilleures pratiques recommandées par les fournisseurs de bases de données.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $bddCategory,
                'title' => 'Migration de Bases de Données : Guide Pratique',
                'slug' => 'migration-de-bases-de-donnees-guide-pratique',
                'content' => 'La migration de bases de données est le processus de transfert de données d\'une source vers une autre, généralement pour des raisons de mise à niveau ou de consolidation. Ce processus implique la planification, la conversion des schémas, l\'extraction des données, la transformation et le chargement dans le nouveau système. Une migration réussie nécessite une compréhension approfondie des deux bases de données impliquées et une gestion rigoureuse du processus.',
                'isPremium' => false,
                'featured' => false
            ]
        ];

        // Boucle pour créer la catégorie $bdd
        foreach ($bdd as $item) {
            $article = new Article();
            $article->setCategory($item['category']);
            $article->setSlug($item['slug']);
            $article->setTitle($item['title']);
            $article->setCreatedAt(new DateTimeImmutable());
            $article->setContent($item['content']);
            $article->setIsPremium($item['isPremium']);
            $article->setFeatured($item['featured']);
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($article);
        }

        $cyber = [
            [
                'category' => $cyberCategory,
                'title' => 'Comprendre les Menaces de Cybersécurité',
                'slug' => 'comprendre-les-menaces-de-cybersecurite',
                'content' => 'La cybersécurité se concentre sur la protection des systèmes informatiques et des réseaux contre les accès non autorisés ou les attaques. Comprendre les menaces de cybersécurité courantes, telles que les logiciels malveillants, le phishing et les violations de données, est essentiel pour mettre en œuvre des mesures de sécurité efficaces. En restant informées des meilleures pratiques de sécurité, les organisations peuvent protéger leurs actifs numériques.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $cyberCategory,
                'title' => 'Sécurisation des Applications Web',
                'slug' => 'securisation-des-applications-web',
                'content' => 'La sécurisation des applications Web est essentielle pour prévenir les vulnérabilités et protéger les données utilisateur. En mettant en œuvre des mesures telles que des bonnes pratiques de codage sécurisé, la validation des entrées, l\'authentification utilisateur et le chiffrement, on peut se défendre contre les attaques courantes des applications Web. Des audits de sécurité réguliers et des mises à jour garantissent que les applications restent résilientes face aux menaces évolutives.',
                'isPremium' => false,
                'featured' => true
            ],
            [
                'category' => $cyberCategory,
                'title' => 'Gestion des Vulnérabilités et des Correctifs',
                'slug' => 'gestion-des-vulnerabilites-et-des-correctifs',
                'content' => 'La gestion des vulnérabilités et des correctifs est une composante essentielle de la cybersécurité. Il s\'agit d\'identifier les failles de sécurité dans les systèmes, les applications et les infrastructures, puis de mettre en place des correctifs pour les résoudre. Une gestion efficace des vulnérabilités comprend la surveillance constante, l\'évaluation des risques, la priorisation des correctifs et la mise en œuvre des mises à jour de sécurité.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $cyberCategory,
                'title' => 'Stratégies de Détection des Intrusions',
                'slug' => 'strategies-de-detection-des-intrusions',
                'content' => 'Les stratégies de détection des intrusions sont utilisées pour identifier les activités suspectes ou malveillantes sur les réseaux et les systèmes informatiques. Ces stratégies comprennent l\'utilisation de systèmes de détection d\'intrusion (IDS), de journaux d\'événements, de l\'analyse comportementale et de la surveillance du trafic réseau. Une détection précoce des intrusions permet de prendre des mesures pour prévenir les attaques et protéger les données sensibles.',
                'isPremium' => false,
                'featured' => false
            ],
            [
                'category' => $cyberCategory,
                'title' => 'Cryptographie : Fondements et Applications',
                'slug' => 'cryptographie-fondements-et-applications',
                'content' => 'La cryptographie est une discipline qui étudie les techniques de protection de l\'information en la transformant de manière à ce qu\'elle devienne illisible pour toute personne non autorisée. Elle est utilisée pour assurer la confidentialité, l\'intégrité et l\'authenticité des données. La cryptographie trouve des applications dans divers domaines tels que les communications sécurisées, les transactions financières en ligne et la protection des mots de passe.',
                'isPremium' => false,
                'featured' => false
            ]
        ];

        // Boucle pour créer la catégorie $cyber
        foreach ($cyber as $item) {
            $article = new Article();
            $article->setCategory($item['category']);
            $article->setSlug($item['slug']);
            $article->setTitle($item['title']);
            $article->setCreatedAt(new DateTimeImmutable());
            $article->setContent($item['content']);
            $article->setIsPremium($item['isPremium']);
            $article->setFeatured($item['featured']);
            // Persist permet de sauvegarder les données dans la base de données
            $manager->persist($article);
        }

        $manager->flush();
    }
}
