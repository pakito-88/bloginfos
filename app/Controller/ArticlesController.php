<?php

namespace Controller;

use W\Controller\Controller;
use Model\ArticlesModel;
use Model\CategoriesModel;

class ArticlesController extends Controller
{

	/**
	* Cette fonction sert à afficher la liste des articles et la liste des catégories
	* Elle sert également à insérer un article en BDD
	*/
	public function articlesList() {

		$articlesModel = new ArticlesModel();
		$articlesList = $articlesModel->findAll();

		$categoriesModel = new CategoriesModel();
		$categoriesList = $categoriesModel->findAll();


		if(!empty($_POST)) {
			$articlesModel = new articlesModel();
			$datas = array(
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'author' => $_POST['author'],
				'id_category' => $_POST['id_category'],
				'creation_date' => date('Y-m-d H:i:s'),
				'id_user' => 1,
				);

			$article = $articlesModel->insert($datas);

			$this->redirectToRoute('articles_list');
		}


		$categoriesArticle = $articlesModel->searchCategoryWithArticle();


		$this->show(
			'articles/list', 
			array(
				'articlesList' => $articlesList,
				'categoriesList' => $categoriesList,
				'categoriesArticle' => $categoriesArticle
			)
		);
	}


	/**
	* Cette méthode permet de voir le contenu d'un article
	* param : $id, l'id de l'article dont je cherche à voir le contenu
	*/
	public function seeArticle($id) {

		/**
		* On instancie le modèle des articles de façon à récupérer les infos de l'article par son id ($id) passé en URL grace à la méthode find() du model dans W
		*/
		$ArticlesModel = new ArticlesModel();
		$article = $ArticlesModel->find($id);

		$this->show('articles/see', array('article' => $article));
	}



	public function deleteArticle($id) {

		$articlesModel = new ArticlesModel();

		$deletedArticle = $articlesModel->delete($id);

		$this->redirectToRoute('articles_list');

		$this->show('articles/deleteArticle', array('deletedArticle' => $deletedArticle));
	}


}