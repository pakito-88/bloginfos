<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/login', 'User#login', 'login'],
		['GET', '/users', 'User#listUsers', 'users_list'],
		['GET|POST', '/register', 'User#register', 'register'],
		['GET', '/logout', 'User#logout', 'logout']


		);