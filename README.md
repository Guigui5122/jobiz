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

//replay live 2/6 25'