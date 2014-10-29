SimpleNote
==========

Outil de prise de notes, simple, Markdown et autohébergable.

###Features prévues :
- Prise de notes Markdown
- Autohébergable
- Les notes sont organisées en tags
- Gestion de tags multi-niveaux
- Traduction multilingue (au moins en - fr)
- Cryptage client side
- Cryptage server side
- Gestion de comptes utlisateurs
- Partage inter utilisateurs / par mdp / public
- Système de plugin / personalisation
- Auto install

### Technos :
Angular JS pour le front
PHP / Symfony pour le back
Bootstrap pour l'UI

### Setup Dev Environement :
Installer docker sur le poste de dev.

Exécuter en root `docker-build.sh` pour builder l'image.

Puis `docker-run.sh` pour lancer le dock et obtenir un accès sur la VM.

Dans la VM lancer `composer install` et choisir les réponses par défaut.

Ensuite `php app/console doctrine:schema:update` pour générer la base de données

Terminer par un `php app/console doctrine:fixtures:load` pour charger les jeux de test.

Pour accèder à l'application :

- user : test
- pass : test

Si un message indiquant des problèmes de droit apparaît, quitter et relancer la VM, elle est configurée pour remettre les droits au lancement.