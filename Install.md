# Installation

* Pré requis : 
    * Wamp / XAMP / Lamp
    * PHP 8 ou plus
    * Node JS 
    * Composer 
    * Git 
    * Symfony (via le site officiel Symfony https://symfony.com/download)

## Récupérer le projet

* Cloner ou télécharger le projet (URL : https://gitlab.com/fac2/techguys)
* En ligne de commande se placer dans le dossier du projet, exemple : `cd C:\wamp64\www\techguys`

## Installation Packages PHP

* Dans le répertoire du projet, lancer la commande `composer i`

## Création de la base de données

Modifier le fichier .`env.local` avec les informations de votre BDD, exemple : 

Avec mot de passe : `DATABASE_URL="mysql://root:root@localhost:3306/techguys"`

Sans mot de passe : `DATABASE_URL="mysql://root@localhost:3306/techguys"`

Si le serveur MySQL n'est pas trouvé, tenter avec :
`DATABASE_URL="mysql://root@127.0.0.1:3306/techguys"`

Utilisateurs MacOS : `DATABASE_URL="mysql://root@127.0.0.1:8889/techguys"`

Créer la base de données avec la commande `php bin/console doctrine:database:create`

## Mettre à jour la base de  données

* Créer les fichiers de migration : ` php bin/console make:migration`
* Lancer la mise à jour de la BDD : ` php bin/console doctrine:migrations:migrate` 

## Intégrer la couche graphique

* Installer les dépendances JavaScript et CSS : `npm i`
* Compiler le CSS et JS : `npm run dev`

## Lancer le serveur Symfony 

Lancer la commande `symfony server:start`
