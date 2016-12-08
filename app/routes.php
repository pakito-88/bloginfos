<?php
	
	$w_routes = array(
		//  GET OU POST, chemin à partir de public, Controller#Methode, nom de la route
		['GET', '/', 'Default#home', 'default_home'],

		// Route pour afficher la liste des commentaires
		['GET', '/comments/list', 'Comment#CommentsList', 'comments_list'],
		
		// Route pour ajouter les commentaires 
		['GET|POST', '/comments/edit', 'Comment#editComments', 'add_comment'],
		
		// Route pour modifier les commentaires
		['GET|POST', '/comments/edit/[i:id]', 'Comment#editComments', 'update_comment'],
		

		// Route pour supprimer un commentaire
		['GET|POST', '/comments/delete/[i:id]', 'Comment#deleteComment', 'delete_comment'],

	
		['GET', '/articles', 'Articles#articlesList', 'articles_list'],
		['GET', '/articles/[i:id]', 'Articles#seeArticle', 'see_article'],	

	);