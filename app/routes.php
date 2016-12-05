<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/articles', 'Articles#articlesList', 'articles_list'],
		['GET', '/article/[i:id]', 'Articles#seeArticle', 'see_article'],
	);
