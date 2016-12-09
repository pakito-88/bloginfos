<?php

namespace Controller;

use \W\Controller\Controller;
use Model\CategoriesModel;

class CategoriesController extends BaseController
{


	/**
	* Cette méthode permet de voir le contenu d'un article
	* param : $id, l'id de l'article dont je cherche à voir le contenu
	*/
	public function seeCategory($id) {

		$CategoriesModel = new CategoriesModel();
		$category = $CategoriesModel->find($id);
		$articles = $CategoriesModel->searchArticlesWithCategory($id);

		$this->show('categories/see', array('category' => $category, 'articles' => $articles));
	}

}