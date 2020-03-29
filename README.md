# BlogArt

Ajouter la colonne admin dans user :
alter table USER  add column admin bool not null default False;

Pour accéder au compte admin : 
	login = admin
	mdp = admin 

Les problèmes / choses qui ne sont pas faites : 

- La barre de recherche n'est pas du tout intégrée
- système de like non intégré
- insert angle ne fonctionne pas
- je n'arrive pas à rester dans la même page lorsque l'on veut edit sur la panneau admin 
- modifier article : on ne peut pas uplaod une nouvelle photo
- dans le panneau admin, il faut remplacer l'affichage des clés par celui de libellé correspondants
- le front est très approximatif, plusieurs éléments restent à modifier notamment selectbox
- absolument pas responsive
- la modification des articles et des mots clés. 
- pas de cryptage des mdp et surement d'autres pb de sécurités
- les messages d'erreurs sur le paneeau admin
- titrer les pages


DONE : 
- Compte utilisateur inscription/connexion + admin
- Panneau admin : créer un article, les différentes listes, les suppressions. Pb pour edit et créer les autres élements
- page d'accueil
- page article
- mentions légales
- page utilisateur
- intégration des articles via le panneau admin sans pb
- le front se rapproche de la maquette, même si il reste trop inégale 


Les choses intérrésentes à tester :


- le crud fonctionne sauf pour angle ?????
- Si l'on se connecte avec un compte admin ou classique le bouton user nous emmène vers des pages différentes
- L'ajout de mot clé lors de la création d'articles est bien pensée
- la déconnexion se fait en cliquant sur le bouton user
- messages d'erreurs pour les mdp, notamment à l'inscrption
- le commentaires fonctionnent très bien et de manière très simple
- même si il reste fastidieux, le panneau d'admin est 100% fonctionnel

Les cases blanches qui sont vides proviennent des articles jeu essai qui ne possèdent pas d'image, je l'ai laissé puisque c'était vos consignes mais je l'avais enlevé, d'où l'absence d'images.
Je continu à avancer sur l'autre branche du projet hugobackup








