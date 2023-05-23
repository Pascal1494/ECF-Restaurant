# LE QUAI ANTHIQUE

## Description du projet
Le Chef Arnaud Michant aime passionnément les produits - et producteurs - de la Savoie. C’est pourquoi il a décidé d’ouvrir son troisième restaurant dans ce département. Le Quai Antique sera installé à Chambéry et proposera au déjeuner comme au dîner une expérience gastronomique, à travers une cuisine sans artifice. Plus encore que ses deux autres restaurants, Arnaud Michant le voit comme une promesse d’un voyage dans son univers culinaire. Lors de l’inauguration de son deuxième établissement, le chef Michant a pu constater l’impact positif que pouvait avoir un bon site web sur son chiffre d’affaires. C’est pourquoi il a fait appel à l’agence web dont vous faites partie. Dans le cadre de cette mission qui vous est affectée, vous aurez à créer une application web vitrine pour le Quai Antique avec ce goût de la qualité que recherche Arnaud Michant.

## Déploiement du site en local
Pour déployer le site en local, vous aurez besoin de suivre ces recommandations.

### Prérequis
1. Assurez-vous d'avoir installé PHP dans sa version 7 ou supérieure (lien vers https://www.php.net/downloads.php)
2. Un serveur web, je vous propose LARAGON, qui permet de transformer votre PC en serveur. Il est simple à configurer et à utiliser. (Lien vers l'installation de Laragon: https://www.youtube.com/watch?v=7h3rrY_n6fc&t=905s)
3. Téléchargez Mailhog (lien vers https://github.com/mailhog/MailHog/releases)
   MailHog est un outil de développement qui simule un serveur de messagerie électronique pour les environnements de développement locaux.
4. Un éditeur de code, VS Code qui est gratuit (https://code.visualstudio.com/download)
5. Installez Composer (lien vers https://getcomposer.org/download/)

### Clonage du projet
1. Lancez VS Code et ouvrez un dossier. Si vous avez installé Laragon, vous pouvez ouvrir le dossier `www` à la racine de ce logiciel.
2. Dans votre terminal VS Code, exécutez la commande suivante:
   git clone https://github.com/Pascal1494/FakeResto.git
3. Une fois le projet installé, vous devez vous positionner à la racine en exécutant la commande:
   cd fakeresto
4. Vous devrez maintenant installer toutes les dépendances en exécutant cette commande:
   composer install
5. Configurez votre base de données en modifiant les paramètres dans le fichier `.env`:
   DATABASE_URL=mysql://utilisateur:mot_de_passe@127.0.0.1:3306/nom_de_la_base_de_données
6. Créez la base de données en exécutant la commande suivante:
   php bin/console doctrine:database:create
7. Créez les tables grâce aux migrations:
   php bin/console doctrine:migrations:migrate
8. Générez les fixtures
     php bin/console doctrine:fixtures:load
9.Lancez votre serveur local:
symfony serve -d (le -d vous permet de reprendre la main sur le terminal

Vous avez un exemplaire du site en local. BRAVO !












