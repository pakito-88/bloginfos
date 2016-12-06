<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/comments/[i:id]', 'Comment#seeComment', 'see_comment'],
		//  GET OU POST, chemin, Controller#Methode, 

	);