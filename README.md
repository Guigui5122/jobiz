*JOBIZ* est un site d'emploi pour le secteur informatique
Réalisation du projet en PHP POO et MVC

1- Réalisation du MCD (JMerise)
2- Création de la BDD (phpmyadmin)
3- Création du repo (git github)  *https://github.com/Guigui5122/jobiz.git*

### Etape création de l'architecture des dossiers 
/src
/src / Controller
/src / Entity (représente les entités de la bdd) partie Modèle (du MVC)
/src / Repository (classes PHP une par entité (contient les méthodes d'accès aux données))
/src /...

/templates (contient les affichages, vues)
/public (images, asset, securité, etc... tout ce qui est visible par le navigateur web)

⚠️ si on joute un fichier *index.php* (même) vide dans ce dossier, nous n'aurons pas accès aux listings des fichiers!


## Ajouter un domaine local
1- ajouter le domaine dans le HOSTS (C:\Windows\System32\drivers\etc\hosts)
*127.0.0.1 jobiz.local*
2- modifier le fichier ``httpd-vhosts.conf`` pour indiquer à Apache vers quel dossier le domaine doit pointer :
*C:\wamp64\bin\apache\apache2.4.62.1\conf\extra\httpd-vhosts.conf*
insérer : 
<VirtualHost *:80>
	DocumentRoot "C:\wamp64\www\jobiz\public"
	ServerName jobiz.local
</VirtualHost>

> redémarrer les servicres WAMP 
On a maintenant accès au dossier /public en local depuis le navigateur en tapant ``jobiz.local``

## Installation de Composer (gestionnaire de dépendance PHP)
>Permet d'installer des modules et fonctionnalités déjà coder (idem NPM en javascript)
Il gère le système d'autoload

1- créer le fichier ``composer.json`` 
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
2- exécuter la commande : ``composer dump-autoload``
> ajout du dossier /vendor avec les fichiers d'autoload (autoload.php) etc...

### Controller
## Création de la page PageController.php
Classe qui va gérer l'affichage des pages de base de notre site (a propos, mentions legales, etc...)

On a créé des méthodes 'home()', et 'about()' qui renvoie un affichage avec une autre méthode render()
cette méthode sera refactorée ultérieurement dans un contrôleur de base (ex: Controller.php) pour gérer l'affichage de plusieures controleurs. Cela évitera la redondance de code dans les controleurs.

## public/Index.php
Création de l'index.php dans /public (point d'entrée de l'app)
On a définit une constante pour avoir la racine de l'app
*define('APP_ROOT', dirname(__DIR__));*

Grâce au ``'namespace'`` on précise qu'elle classe on veut utiliser avec ``"use"`` :
*use App\Controller\PageController;*

On a instancié un PageController pour pouvoir appeler les méthodes de la classe PageController

*$pageController = new PageController();*
*$pageController->home();*


## Création du dossier ./src/templates
Les templates font parties de la 'Vue', ils gèreront l'affichage, et seront réutilisables et adaptables

Dans ce dossier templates, on créer le dossier ``/pages`` puis dans ce dossier nos différents templates de pages (home.php, about.php, etc...)

## Création du Controller.php (contrôleur de base)
## Création du dossier /src/Routing/
* gère les Routes avec le fichier Router.php = distribut la requête au bon controleur !



## Dossier /config
On créer un fichier ``routes.php`` qui va répertorier dans un fichier de config toutes les routes disponibles dans un tableau associatif.

## Réécriture d'URL 
On créer un fichier ``.htaccess`` (dans le dossier /public) pour autoriser la réécriture d'URL (plus propre), et rediriger vers *index.php [QSA,L]*

[QSA = Query String Append] autorise les paramètres d'url
[L = last]

Le fichier .htaccess est lié à Apache



//TODO : replay live 4/6