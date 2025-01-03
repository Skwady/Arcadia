# 🦁 Arcadia Zoo
## 🌍 Description du projet :
**Arcadia Zoo** est une application web interactive qui enrichit l'expérience des visiteurs en leur fournissant des informations détaillées sur les habitats des animaux, les espèces présentes et les services proposés par le zoo. Ce projet met également en avant les actions écologiques et les engagements du zoo pour la durabilité, sensibilisant ainsi les visiteurs aux enjeux environnementaux.
---
## 💻 Technologies Utilisées
- **Front-end** : HTML5, CSS (Bootstrap), JavaScript
- **Back-end** : PHP avec PDO
- **Base de données** : MySQL (relationnelle) et MongoDB (NoSQL)
- **Stockage d'images** : Cloudinary
- **Envoie de mail** : PHPMailer
- **Variables d'environnement** : Dotenv
- **Gestion des dépendances** : Composer
- **Déploiement** : Heroku
---
## 🎯 Fonctionnalités principales :
- **Informations détaillées sur les habitats** : Présentation détaillée des habitats et des animaux qu’ils abritent, avec des photos et des descriptions interactives.
- **Thèmes écologiques** : Une rubrique dédiée aux actions et initiatives du zoo pour la durabilité et la protection de la biodiversité.
- **Services du zoo** : Informations sur les services du zoo, tels que les visites guidées, les balades en train, la restauration, et les spectacles.
- **Contact** : Un formulaire simple pour permettre aux visiteurs de poser des questions ou de demander des renseignements.
- **Dashboard** : Un tableau de bord sécurisé permettant de gérer :
                    Les utilisateurs du site
                    Les rapports vétérinaires
                    Les informations des habitats et des animaux
                    Les services disponibles
---
## 🛠️ Installation et déploiement :
- 1. Prérequis :
- PHP 8.3 ou supérieur
- Serveur MySQL/MongoDB
- Composer installé
- Clé API pour Cloudinary et configuration SMTP pour PHPMailer
- 2. Cloner le dépôt :
- bash
- Copier le code
- git clone https://github.com/Skwady/Arcadia.git
- cd Arcadia
- 3. Installer les dépendances :
- bash
- Copier le code
- composer install
- 4. Configurer les variables d’environnement :
- Créer un fichier .env à la racine et ajouter les informations nécessaires (exemple ci-dessous) :

- makefile
- Copier le code
- DB_HOST=localhost
- DB_NAME=Arcadia
- DB_USER=root
- DB_PASS=root
- CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
- SMTP_HOST=smtp.example.com
- SMTP_USER=user@example.com
- SMTP_PASS=yourpassword
- 5. Importer la base de données :
- Importer le fichier SQL fourni dans le dépôt pour créer les tables nécessaires :

- bash
- Copier le code
- mysql -u <username> -p <dbname> < database.sql
- 6. Lancer le serveur local :
- bash
- Copier le code
- php -S localhost:8000
- 7. Déployer sur Alwaysdata ou Heroku :
- Pour Alwaysdata, suivre le guide de configuration sur leur plateforme.
- Pour Heroku, utiliser les commandes :
- bash
- Copier le code
- heroku login
- git push heroku main

## 🧩 Contributeurs :
Yohann Vaslot : Développeur Full-Stack et créateur du projet Arcadia Zoo.