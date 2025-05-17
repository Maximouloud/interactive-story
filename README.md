
# Projet : Histoire interactive à choix - Maximilien Maret

Ce projet est une application Laravel + Breeze (Inertia.js + Vue.js) qui propose une **histoire interactive**, où chaque utilisateur peut lire, naviguer et reprendre sa progression dans un récit narratif à choix multiples.

---

## Stack technique

- **Laravel 12**
- **Breeze (Inertia.js + Vue 3)** pour l'authentification et la structure SPA
- **Base de données SQLite**
- **Aucune API publique REST, tout est passé via Inertia**

---

##  Fonctionnalités principales

- Lecture d'une **histoire interactive** : chaque chapitre propose du texte et 2 choix.
- Page d'accueil avec liste des histoires.
- Les **choix influencent la suite** de l'histoire (arborescence ramifiée).
- Seuls les utilisateurs connectés peuvent lire ou progresser.
- **Sauvegarde automatique** du chapitre en cours (base de données utilisateur).
- Accès sécurisé via middleware `auth`.

---

## Structure des modèles

- `Story` : représente une histoire complète.
- `Chapter` : contient le texte d'un chapitre et ses choix.
- `Choice` : permet de naviguer d’un chapitre vers un autre.
- `User` : possède un champ `current_chapter_id` pour mémoriser la progression.

---

## Installation locale

1. Cloner le projet :
```bash
git clone "https://github.com/Maximouloud/interactive-story"
cd interactive-story
```

2. Installer les dépendances :
```bash
composer install
npm install && npm run build
```

3. Configurer `.env` :
```bash
cp .env.example .env
php artisan key:generate
```

4. Lancer les migrations et les données :
```bash
php artisan migrate:fresh --seed
```

5. Lancer le serveur :
```bash
php artisan serve
```

---

## Authentification

- Utilise **Breeze avec Inertia.js** (sessions Laravel).
- Les routes `/stories` et `/stories/{id}` sont protégées par middleware `auth`.

---

## 🎨 Fonctionnalités frontend

- Interface **responsive** adaptée aux mobiles et desktop
- Affichage clair et conditionnel des chapitres et des choix
- Transitions animées entre les chapitres
- Ajout d'une **image de couverture** personnalisable pour chaque histoire
- Fin d’histoire avec message de conclusion + **bouton “Recommencer”**
- Sauvegarde de progression dans `localStorage` pour revenir automatiquement à son chapitre
- Architecture **SPA complète** : aucune recharge de page

---

## À noter

Le projet devait initialement inclure une API versionnée avec Laravel Sanctum, mais après plusieurs tentatives non concluantes en local, une décision a été prise afin d'avancer dans le projet :

> Pas d’API REST publique →  tout est passé via Inertia et sécurisé via `auth`

Cette approche reste fonctionnelle mais pas la version idéale prévue initialement.

---

## Auteur

Projet réalisé dans le cadre du cours **Web fullstack / Laravel + Vue** – HEIG-VD - Maximilien Maret.
