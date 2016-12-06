<?php
	
	$w_routes = array(
		//  GET OU POST, chemin, Controller#Methode, nom de la route
		['GET', '/', 'Default#home', 'default_home'],

		// Route pour voir les commentaires 
		['GET', '/articles/[i:id]', 'Comment#seeComment', 'see_comment'],
		
		// Route pour ajouter un commentaire 
		['GET|POST', '/articles/add', 'Comment#addComment', 'add_comment'],

		
		['GET', '/articles', 'Articles#articlesList', 'articles_list'],
		['GET', '/articles/[i:id]', 'Articles#seeArticle', 'see_article'],

	);