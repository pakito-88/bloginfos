<?php

namespace Controller;

use W\Controller\Controller;
use Model\ArticlesModel;
use Model\CategoriesModel;

class ArticlesController extends BaseController
{

	/**
	* Cette fonction sert à afficher la liste des articles
	*/
	public function articlesList() {

		$articlesModel = new ArticlesModel();
		$articlesList = $articlesModel->findAll();

		$categoriesArticle = $articlesModel->searchCategoryWithArticle();

		$this->show(
			'articles/list', 
			array(
				'categoriesArticle' => $categoriesArticle,
				'articlesList' => $articlesList
			)
		);
	}


	/**
	* Cette fonction sert à modifier ou insérer des articles
	* Elle prend en paramètre optionnel l'id de l'article à modifier, si il n'existe pas c'est de l'insertion
	*/

	public function editArticles($id = null) {

		// Affichage des catégories dans le menu déroulant du formulaire
		$categoriesModel = new CategoriesModel();
		$categoriesList = $categoriesModel->findAll();

		if(isset($id)) {

			$articlesModel = new ArticlesModel();
			$articleInfos = $articlesModel->find($id);

			$datas = array(
				'title' => $articleInfos['title'],
				'content' => $articleInfos['content'],
				'author' => $articleInfos['author'],
				'id_category' => $articleInfos['id_category'],
				'creation_date' => $articleInfos['creation_date'],
				'id_user' => $articleInfos['id_user']
				);

			$articleUpdated = $articlesModel->update($id, $datas);
		}


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

		$this->show('articles/update', array('categoriesList' => $categoriesList));

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


	public function updateArticle($id) {

		$ArticlesModel = new ArticlesModel();
		$article = $ArticlesModel->find($id);
		var_dump($article);

			$datas = array(
				'title' => $article['title'],
				'content' => $article['content'],
				'author' => $article['author'],
				'id_category' => $article['id_category'],
				'creation_date' => $article['creation_date'],
				'id_user' => $article['id_user'],
				);

		$updatedArticle = $ArticlesModel->update($datas, $id);

		

		$this->show('articles/updatedArticle', array('updatedArticle' => $updatedArticle));

		}

}