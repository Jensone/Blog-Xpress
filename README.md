# Projet backend - Blog Xpress

<p align="center">
  <img src="public/images/core/bx-color.svg" alt="Actus Crypto" width="300" />
</p>

## Description

Pour mes étudiants : Ce projet est un site web qui permet de consulter les actualités sur le domaine de la tech. Il est conçu avec le framework PHP, Symfony 6.

Ce projet fait partie de la formation Agiliteach "Développement Web Moderne avec l'IA". Disponible sur la plateforme Udemy.

## Technologies utilisées

| Technologies | Usage |
| ------------ | ----- |
| HTML         | Structure de la page |
| Twig         | Moteur de template |
| Bootstrap    | Framework CSS |
| JavaScript   | Intéractivité avec l'interface |
| PHP 8.*      | Programmation côté serveur |
| Symfony      | Framework PHP |
| SQL          | Langage de bases de données |
| Doctrine     | ORM (Object Relational Mapping) |
| EasyAdmin    | Interface d'administration |
| Git          | Gestionnaire de version |
| Composer     | Gestionnaire de dépendances PHP |
| Symfony CLI  | Outil en ligne de commande |

## Installation

1. Cloner le projet sur votre machine ou téléchargez le fichier zip et décompressez-le.

```bash
git clone https://github.com/Jensone/Blog-Xpress.git
```

2. Installer les extensions recommandées pour le projet, elle sont automatiquement détectées par VSCode et vous pouvez les installer en cliquant sur le bouton "Install All" qui s'affiche en bas à droite de votre écran.

3. Ouvrir le fichier `.env` et modifier la ligne suivante avec vos informations de connexion à la base de données.

```bash
DATABASE_URL="mysql://user:password@host:port/database_name"
```

4. Installer les dépendances du projet avec Composer.

```bash
composer install
```

5. Créer la base de données.

```bash
php bin/console doctrine:database:create
```

6. Créer les tables de la base de données.

```bash
php bin/console doctrine:migrations:migrate
```

7. Charger les données de test.

```bash
php bin/console doctrine:fixtures:load
```

8. Lancer le serveur.

```bash
symfony server:start -d
```

---
![Agiliteach](https://cdn.agiliteach.org/medias/images/github-at-.gif)