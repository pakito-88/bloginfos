<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
<<<<<<< HEAD
		['GET', '/BackOffice','Default#statistique', 'statistique'],
		

		//User
		['GET|POST', '/login', 'User#login', 'login'],
		['GET', '/logout', 'User#logout', 'logout'],

		//tableau user
		['GET', '/users', 'User#listUsers', 'users_list'],

		//modifier ajuter un w_user
		['GET|POST', '/register', 'User#register', 'register'],
		
		//admin ajout ou modif user
		['GET|POST', '/users-admin/edit', 'User#editUser', 'add_User'],
		['GET|POST', '/users-admin/edit/[i:id]', 'User#editUser', 'edit_User'],

		//admin supprimer un user
		['GET', '/users-admin/delete/[i:id]', 'User#deleteUser', 'delete_User'],


		// Route pour afficher la liste des commentaires
		['GET', '/comments/list', 'Comment#CommentsList', 'comments_list'],
		
		// Route pour ajouter les commentaires 
		['GET|POST', '/comments/edit', 'Comment#editComments', 'add_comment'],
		
		// Route pour modifier les commentaires
		['GET|POST', '/comments/edit/[i:id]', 'Comment#editComments', 'update_comment'],
		

		// Route pour supprimer un commentaire
		['GET|POST', '/comments/delete/[i:id]', 'Comment#deleteComment', 'delete_comment'],

		['GET', '/articles-admin', 'Articles#articlesList', 'articles_list'],
		
		['GET|POST', '/articles-admin/edit/[i:id]', 'Articles#editArticles', 'edit_articles'],
		['GET|POST', '/articles-admin/edit', 'Articles#editArticles', 'add_articles'],
		['GET', '/article/[i:id]', 'Articles#seeArticle', 'see_article'],
		['GET', '/suppression/article/[i:id]', 'Articles#deleteArticle', 'delete_article'],
		['GET', '/modification/article/[i:id]', 'Articles#updateArticle', 'update_article'],


		['GET', '/categorie', 'Categories#categoriesList', 'categories_list'],
		['GET', '/categorie/[i:id]', 'Categories#seeCategory', 'see_category']
		);
=======

		['GET|POST', '/articles-admin', 'Articles#articlesList', 'articles_list'],
		['GET', '/article/[i:id]', 'Articles#seeArticle', 'see_article'],
		['GET', '/suppression/article/[i:id]', 'Articles#deleteArticle', 'delete_article'],

		['GET', '/categories', 'Categories#categoriesList', 'categories_list'],
		['GET', '/categorie/[i:id]', 'Categories#seeCategory', 'see_category']
	);
>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
