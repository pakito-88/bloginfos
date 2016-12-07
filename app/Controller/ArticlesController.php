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
		var_dump($articlesList);

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

	public function searchAllWithUserInfos($idArticle, $idComment=null) {
		$query = "SELECT comments.*, users.pseudo, users.avatar"
		." FROM $this->table"
		." JOIN articles on $this->table.id_article = articles.id"
		." JOIN users on $this->table.id_user = users.id"
		." WHERE articles.id = :id_article";


		$ifCommentExists = $idComment !== null && ctype_digit($idComment);
		if($ifCommentExists) {
			$query .= ' AND comments.id > :id_comment';
		}	

		$statement = $this->dbh->prepare($query);
		$statement -> bindParam(':id_article', $idArticle, \PDO::PARAM_INT); 


		if($ifCommentExists) {
			$statement->bindParam(':id_comment', $idComment, \PDO::PARAM_INT);
		}
				
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_ASSOC);
	}
	
}