<?php

namespace Model;

use \W\Model\Model;

/**
 * Description de CommentsModel
 *
 * @author Admin
 */


class CommentsModel extends Model {
	public function searchArticleWithCommentInfos($idArticle, $idComment=null) {
		$query = "SELECT comments.*, users.pseudo, users.avatar, articles.title"
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

	/**
	 * permet d'aller récupérer les informations liées entre le commentaire et l'article correspondant
	 * @return [array] retourne les datas du commentaire et les datas liées à l'user
	 */
	public function bindCommentWithArticle(){
		$query = "SELECT comments.*, users.pseudo, users.avatar, articles.title"
		." FROM $this->table"
		." JOIN articles on $this->table.id_article = articles.id"
		." JOIN users on $this->table.id_user = users.id";
		
		$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_ASSOC);

	}

	
	/**
	 * [showCommentInArticle permet d'afficher les commentaires liés à l'article en question
	 * @param  [int] $idArticle [id de l'article selectionné ]
	 * @return [array]            [retourne les datas du commentaire liés à l'article]
	 */
	public function showCommentInArticle($idArticle){
	$query = "SELECT comments.*, users.pseudo, users.avatar, articles.title"
		." FROM $this->table"
		." JOIN articles on $this->table.id_article = articles.id"
		." JOIN users on $this->table.id_user = users.id"
		." WHERE $this->table.id_article = ".$idArticle;

	$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_ASSOC);	
	}

}
