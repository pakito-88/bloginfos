<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
<<<<<<< HEAD
		['GET', '/users', 'User#listUsers', 'users_list'],
		['GET|POST', '/salon/[i:id]', 'Salon#seeSalon', 'see_salon'],
		['GET|POST', '/login', 'User#login', 'login'],
		['GET', '/logout', 'User#logout', 'logout'],
		['GET|POST', '/register', 'User#register', 'register'],
		['GET|POST', '/profile', 'User#register', 'profile'],
		// cette route va être accessible en ajax et servira à renvoyer les
		// messages d'un salon qui ont été posté depuis un id donné
		['GET', '/newmessages/[i:idSalon]/[i:idMessage]', 'Salon#newMessages', 'new_messages'],
		['GET|POST', '/salon/add', 'Salon#addSalon', 'add_salon'],

		['GET', '/categories', 'Categorie#listCategories', 'categories_list']
);
=======
	);
>>>>>>> bbb96092efd94dfd4ded7b5af6846fb4103cd6ec
