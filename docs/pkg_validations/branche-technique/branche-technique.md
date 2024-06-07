---
layout: default
chapitre: true
package : pkg_validations
order: 441
---

# Branche technique 

La branche technique fait référence à la partie du projet qui est axée sur les aspects techniques et de développement. Cette branche englobe les activités liées à la conception, la programmation, et la mise en œuvre des fonctionnalités et des composants du projet. Elle implique généralement l'utilisation d'outils de développement, la gestion des versions du code source, et la collaboration entre les développeurs. La branche technique joue un rôle essentiel dans la création d'un produit final de haute qualité, en veillant à ce que les spécifications techniques soient respectées et que les fonctionnalités soient correctement implémentées



## Capture des besoins techniques

Pour le développement de l'application Soli-LMS, nous avons choisi Laravel comme framework backend pour sa robustesse et ses fonctionnalités avancées, associé à MySQL pour la gestion des données en raison de sa fiabilité. Pour l'interface, AdminLTE a été sélectionné pour son design moderne et ses fonctionnalités avancées, assurant une expérience utilisateur conviviale. En intégrant ces technologies avec des design patterns comme les repositories, notre objectif est de développer une application  solide, performante et facile à utiliser, répondant de manière efficace et optimale aux besoins de gestion de formation. L'utilisation des repositories garantit une séparation claire des préoccupations entre le backend et le frontend, améliorant ainsi la maintenabilité, la scalabilité et la performance globale de l'application.



## Architecture de l'application  :


L'architecture de notre application suit le modèle Modèle-Vue-Contrôleur (MVC) avec une couche supplémentaire pour le Repository Pattern.
Le Modèle-Vue-Contrôleur est un modèle d'architecture logicielle qui divise une application en trois parties principales : le modèle (qui représente les données et la logique de l'application), la vue (qui affiche les données au client) et le contrôleur (qui gère les entrées utilisateur et coordonne les interactions entre le modèle et la vue).

Le Repository Pattern ajoute une couche supplémentaire d'abstraction qui permet de séparer la logique de stockage des données de la logique métier de l'application. Cette couche est responsable de l'accès aux données, de leur persistance et de leur récupération. Cette abstraction permet une meilleure maintenabilité et évolutivité de l'application.
En utilisant cette architecture, nous avons pu séparer les différentes responsabilités de l'application, ce qui facilite la maintenance et l'évolution de celle-ci.


![Architecture mvc](/soli-lms/pkg_validations/branche-technique/images/MVC.png){:width="100%"}
*Figure 10:  Architecture de l'application*


## Prototype 

Avant de démarrer la réalisation de notre projet Soli-LMS, nous avons mis en place un prototype fonctionnel détaillé qui a été développé sur trois sprints distincts :

Gestion des Projets (Sprint 1) : Nous avons débuté avec la création du sprint de gestion des projets, qui comprend les opérations CRUD basiques pour la gestion des projets. Ces opérations incluent la création, la lecture, la mise à jour et la suppression de projets, ainsi que leur association avec les utilisateurs et les tâches. Nous avons également intégré des fonctionnalités d'importation et d'exportation de données pour permettre aux utilisateurs de manipuler facilement les données et d'effectuer des recherches dynamiques avec Ajax.

Gestion des Tâches (Sprint 2) : Bien que prévu dans le planning, ce sprint n'a pas encore été réalisé. Il sera dédié à la gestion des tâches au sein des projets, y compris la création, l'assignation, le suivi et la collaboration sur les différentes tâches.

Gestion de Stock (Sprint 3) : Également en attente de réalisation, ce sprint sera axé sur la gestion des stocks et des ressources matérielles nécessaires à la réalisation des projets. Cela comprendra la gestion des stocks, des commandes, des entrées/sorties de matériel, et d'autres fonctionnalités liées à la gestion des ressources.

En parallèle, le prototype intègre un système d'authentification et d'autorisation utilisant Spatie pour assurer la sécurité et la gestion des droits d'accès des utilisateurs. Ce processus itératif nous a permis de valider rapidement les principales fonctionnalités de l'application, de recueillir des retours d'utilisateurs pour optimiser l'expérience utilisateur, et de garantir une transition fluide vers la phase de développement complète.
