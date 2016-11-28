<?php
	/* quand on essaye d'acceder a localhost/t-chat/public
		l'url qui est réelement reçu c'est : localhost/t-chat/index.php/

		la partie avant le # du 3e arguement est le nom du controller moins le mot 'controler'
	*/
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		  // route unqiqment accesible par GET
		['GET','/test','test#monAction','test_index'],
		['GET','/users','User#listUsers','users_list'],
		['GET|POST','/salon/[i:id]','Salon#seeSalon','see_salon'],
		['GET|POST','/login','User#login','login'],
		['GET','/logout','User#logout','logout'],
	);