# Geogram

Réseau social pour partager ces vacances avec ses abonnés.

## Outils

+ [Google map API](https://developers.google.com/maps/?hl=fr) 
+ [TinyMCE](https://www.tinymce.com/)
+ [jQuery](https://jquery.com/)
+ [Redis](https://redis.io/)
+ [Bootstrap 4](https://getbootstrap.com/)

## Installation
+ Cloner le dépôt
+ Faire les configs de base
+ Executer les migrations: `php artisan migrate`
+ Executer les seeders: `php artisan db:seed`
  Les deux précédentes commandes peuvent se faire en une seule : `php artisan migrate:refresh --seed`
  
## Redit

Nous avons des formulaires qui ont pour objectifs d'uploader des images et de les redimensionner ce qui peut rendre  
l'execution du formulaire plus lente.  
En effet, de base nous sommes en mode synchrone ce qui fait que toutes les actions se font les un après les autres.  
On peut rendre çà asyncrone avec les `jobs` de Laravel [Queues](https://laravel.com/docs/5.5/queues#job-events).  
Il faut modifier sont `.env` et mettre `QUEUE_DRIVER=sync`. Il faut mettre en route son serveur Redis.  
Il faut démarrer les jobs: `php artisan queue:work --tries=3`  
