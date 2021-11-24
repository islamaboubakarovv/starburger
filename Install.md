# Installation

Pré requis : 
* Wamp / XAMP / Lamp
* PHP 8 ou plus
* Node JS 
* Composer 
* Git 
* Symfony (via le site officiel Symfony https://symfony.com/download)


## PHP en ligne de commande

* Windows
    * Menu Démarrer 
    * Rechercher "variables"
    * Cliquer sur "Modifier les variables d'environnement"
    * Cliquer sur "Variables d'environnement"
    * Dans le cadre du bas, rechercher "Path" et le modifier
    * Copier le chemin où PHP est installé (Exemple : `C:\wamp64\bin\php\php7.3.12`)
    * Coller le chemin dans les variables "Path"
    * Valider
    * Ouvrir une invit de commande et lancer `php -v`

## Récupérer le projet

* Cloner ou télécharger le projet (URL : https://gitlab.com/fac2/techguys)
* Copier coller le projet dans le répertoire `www` de Wamp ( dossier `htdocs`pour Xamp)
* En ligne de commande se placer dans le dossier du projet, exemple : `cd C:\wamp64\www\techguys`

## Installation Packages PHP

* Dans le répertoire du projet, lancer la commande `composer i`
> Si vous n'avez que le `composer.phar`, lancer `php composer.phar i`

## Démarrage projet Symfony

### Création de la base de données

Modifier le fichier .`env.local` avec les informations de votre BDD, exemple : 

Avec mot de passe : `DATABASE_URL="mysql://root:root@localhost:3306/techguys"`

Sans mot de passe : `DATABASE_URL="mysql://root@localhost:3306/techguys"`

Si le serveur MySQL n'est pas trouvé, tenter avec :
`DATABASE_URL="mysql://root@127.0.0.1:3306/techguys"`

Utilisateurs MacOS : `DATABASE_URL="mysql://root@127.0.0.1:8889/techguys"`

Créer la base de données avec la commande ` php bin/console doctrine:database:create
`

# Mettre à jour la base de  données

* Créer les fichiers de migration : ` php bin/console make:migration`
* Lancer la mise à jour de la BDD : ` php bin/console doctrine:migrations:migrate` 

## Intégrer la couche graphique
> Pré requis : Node JS

* Installer les dépendances JavaScript et CSS : `npm i`
* Compiler le CSS et JS : `npm run dev`

# Lancer le serveur Symfony 
> Pré requis : Installer la commande Symfony via le site officiel Symfony (bouton Download)
>https://symfony.com/download

Lancer la commande `symfony server:start`
