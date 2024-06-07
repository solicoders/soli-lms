---
layout: default
presentation: true
chapitre: true
package : pkg_competences
order: 126
---


# Branche technique 
{:class="sectionHeader"}

<!-- new slide -->

## Analyse technique

![Analyse technique](/soli-lms/pkg_competences/branche-technique/images/analyse-technique.png){:width="500px"}
*Figure: Analyse technique*

<!-- note -->

Pour le développement na utiliser de différentes technologies, notamment :

PHP: est un langage de script côté serveur.
Rôle : Gérer la logique métier de l’application, traiter les requêtes et générer des pages dynamiques.
MySQL : est une base de données relationnelle.
Rôle : Stocker et gérer les données de l’application.
Laravel: est un framework PHP.
Rôle : Faciliter le développement en fournissant une structure MVC, des outils de migration de base de données, etc.
AdminLTE: est un thème d’administration basé sur Bootstrap.
Rôle: Offrir une interface utilisateur moderne et réactive pour la gestion de l’application.
Pour la mise en place des tests unitaires, on va séparer les tâches entre le frontend et le backend :

Test unitaire : Séparation des tâches en frontend et backend pour l’ajout de tests unitaires.

Interfaces : Les développeurs ne respectent pas les méthodes.

<!-- new slide -->

## Architecture mvc :

![Architecture mvc](/soli-lms/pkg_competences/branche-technique/images/Architecture-mvc.png){:width="100%" height="500px"}
_Figure : Architecture mvc_

<!-- note -->

L'architecture MVC (Modèle-Vue-Contrôleur) est un modèle de conception qui permet de séparer les différentes parties d'une application pour faciliter la maintenance et l'évolutivité du code. Le Modèle gère les données, la Vue présente les données à l'utilisateur et le Contrôleur gère les interactions de l'utilisateur avec l'application. L'architecture MVC est 
souvent utilisée dans le développement de sites Web, d'applications mobiles et d'autres projets logiciels pour améliorer l'organisation du code, la réutilisabilité et la maintenance.

<!-- new slide -->

## Prototype

Pour la partie web, nous avons mis en place un prototype qui permettait de créer, lire, mettre à jour, supprimer, rechercher, filtrer, importer et exporter (CRUD) des compétences en utilisant Laravel et en intégrant des patterns de conception.