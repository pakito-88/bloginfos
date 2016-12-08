<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/login', 'User#login', 'login'],
		['GET', '/users', 'User#listUsers', 'users_list'],
		['GET|POST', '/register', 'User#register', 'register'],
		['GET', '/logout', 'User#logout', 'logout'],


		['GET', '/articles-admin', 'Articles#articlesList', 'articles_list'],
		['GET|POST', '/articles-admin/edit/[i:id]', 'Articles#editArticles', 'edit_articles'],
		['GET|POST', '/articles-admin/edit', 'Articles#editArticles', 'add_articles'],

		['GET', '/article/[i:id]', 'Articles#seeArticle', 'see_article'],
		['GET', '/suppression/article/[i:id]', 'Articles#deleteArticle', 'delete_article'],
		['GET', '/modification/article/[i:id]', 'Articles#updateArticle', 'update_article'],

		['GET', '/categories', 'Categories#categoriesList', 'categories_list'],
		['GET', '/categorie/[i:id]', 'Categories#seeCategory', 'see_category']
		);