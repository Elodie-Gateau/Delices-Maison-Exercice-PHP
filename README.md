# 🍽️ Les Délices Maison — site de recettes (PHP)

> **Projet pédagogique** réalisé dans le cadre de la préparation au **Titre Professionnel DWWM** (Développeur Web & Web Mobile).  
> Objectifs : pratiquer la structuration d’un mini-site en **PHP procédural**, manipuler des **données PHP**, travailler l’**affichage dynamique**, la **navigation**, et l’**intégration SCSS/CSS**, en cohérence avec le référentiel (Front + Back).

---

## 🧭 Fonctionnalités

- **Accueil** avec visuel « hero » et **mise en avant d’une recette aléatoire**.
- **Liste des recettes** (page *Recettes*) avec :
  - 🔎 **Recherche** pleine‑texte sur le titre (GET `?search=`),
  - 🏷️ **Filtre par catégorie** via slug (GET `?categorie=`),
  - ⭐ **Tri par difficulté** (GET `?sortlevel=true`) avec regroupement par niveaux (Facile, Moyen, Difficile),
  - 📊 **Statistiques** (totaux par difficulté, total recettes, temps moyen).
- **Détail d’une recette** via **slug** (page `recipe_detail.php?slug=...`).
- **Astuces** cuisine (contenu depuis `data/astuces.php`).
- **À propos** du site.
- **Menu burger** responsive (JS vanilla) et **SCSS modulaire** (variables, mixins, composants).

---

## 🛠️ Stack & prérequis

- **PHP 8+**
- **SCSS**

---

## 📂 Arborescence (extrait)

```
recettes-cuisine/
├── index.php
├── recettes.php
├── recipe_detail.php
├── astuces.php
├── apropos.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── menu.php
│   └── recipe_card.php
├── fonctions/
│   └── utils.php
├── data/
│   ├── recettes.php
│   ├── astuces.php
│   └── pages.php
├── images/      # visuels des recettes + hero + logo
├── js/
│   └── main.js  # burger menu
├── scss/        # sources SCSS (variables, mixins, pages…)
│   └── style.scss
└── css/
    └── style.css  # CSS compilé
```

---

## 🔗 Navigation & routes

- **Accueil** : `index.php`  
  - Récupère une recette **aléatoire** (fonctions utilitaires), génère son **slug** et **URL**.
- **Recettes** : `recettes.php`  
  - **Recherche** par titre (`?search=`)  
  - **Catégories** (liens pré‑générés via `extractCategories()` → `?categorie=`)  
  - **Tri par difficulté** (`?sortlevel=true`) avec `usort()` et regroupement par niveau  
  - **Statistiques** via `countRecipes()`
- **Détail** : `recipe_detail.php?slug=...`  
  - Charge une recette par **slug**, affiche ingrédients + étapes, durée, difficulté (étoiles).
- **Astuces** : `astuces.php` (boucle sur `data/astuces.php`)  
- **À propos** : `apropos.php`  
- **Header/Menu** : `includes/header.php`, `includes/menu.php` (+ burger en JS)

---



## 🔒 Sécurité & robustesse

- **Échappement de l’entrée** : `htmlspecialchars()` sur les paramètres GET (`search`, `categorie`, `sortlevel`, `slug`).  



## 🚀 Installation locale (XAMPP)

1. Copier le dossier dans votre racine web (ex. `htdocs/recettes-cuisine` sous XAMPP).
2. Lancer Apache (et PHP).
3. Ouvrir : `http://localhost/recettes-cuisine/index.php`

---

## ✅ Alignement référentiel DWWM

- **Front‑end** : intégration d’interfaces statiques/dynamiques, responsivité, accessibilité, qualité (SCSS modulaire).  fileciteturn29file0
- **Back‑end** : logique de traitement (filtres/tri), gestion d’URL/slug, hygiène des entrées (sécurité).  fileciteturn28file0
- **Organisation** : séparation du code (includes, data, fonctions), documenter et structurer.  fileciteturn29file0
- **Communication & démarche** : résolution de problèmes, veille (ex. choix SCSS, perf, accessibilité).  fileciteturn28file0

---


## 📜 Licence

Projet d’apprentissage — **usage pédagogique dans le cadre du TP DWWM**.
