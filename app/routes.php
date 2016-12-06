<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/comments/[i:id]', 'Comment#seeComment', 'see_comment'],
		//  GET OU POST, chemin, Controller#Methode, nom de la route
		['GET|POST', '/comments/[i:id]', 'Comment#addComment', 'add_comment'],

	);