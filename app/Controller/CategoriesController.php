<?php

namespace Controller;

use \W\Controller\Controller;
use Model\CategoriesModel;

<<<<<<< HEAD
class CategoriesController extends BaseController
{
=======
class CategoriesController extends Controller
{

	/**
	* Cette fonction sert à afficher la liste des articles
	*/
>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
	public function categoriesList() {

		$categoriesModel = new CategoriesModel();

		$categoriesList = $categoriesModel->findAll();

		$this->show('categories/list', array('categoriesList' => $categoriesList));
	}

<<<<<<< HEAD
=======

>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
	/**
	* Cette méthode permet de voir le contenu d'un article
	* param : $id, l'id de l'article dont je cherche à voir le contenu
	*/
	public function seeCategory($id) {

<<<<<<< HEAD
=======
		/**
		* On instancie le modèle des articles de façon à récupérer les infos de l'article par son id ($id) passé en URL grace à la méthode find() du model dans W
		*/
>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
		$CategoriesModel = new CategoriesModel();
		$category = $CategoriesModel->find($id);
		$articles = $CategoriesModel->searchArticlesWithCategory($id);

		$this->show('categories/see', array('category' => $category, 'articles' => $articles));
	}

}