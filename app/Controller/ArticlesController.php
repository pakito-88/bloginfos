<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ArticlesModel;

class ArticlesController extends Controller
{

	/**
	* Cette fonction sert à afficher la liste des articles
	*/
	public function articlesList() {

		$articlesModel = new ArticlesModel();

		$articlesList = $articlesModel->findAll();

		$this->show('articles/list', array('articlesList' => $articlesList));
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
}