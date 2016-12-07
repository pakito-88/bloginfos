<?php
	
	$w_routes = array(
		//  GET OU POST, chemin à partir de public, Controller#Methode, nom de la route
		['GET', '/', 'Default#home', 'default_home'],

		// Route pour afficher la liste des commentaires
		['GET|POST', '/comments/list', 'Comment#CommentsList', 'comments_list'],
		

		// Route pour voir / ajouter les commentaires 
		['GET|POST', '/comments/[i:id]', 'Comment#seeComments', 'see_comment'],
	
		['GET', '/articles', 'Articles#articlesList', 'articles_list'],
		['GET', '/articles/[i:id]', 'Articles#seeArticle', 'see_article'],	

	);