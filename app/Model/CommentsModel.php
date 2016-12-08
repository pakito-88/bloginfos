<?php

namespace Model;

use \W\Model\Model;

/**
 * Description de CommentsModel
 *
 * @author Admin
 */


class CommentsModel extends Model {
	public function searchAllWithUserInfos($idArticle, $idComment=null) {
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

	public function bindIdCommentWithIdArticle(){
		$query = "SELECT comments.*, users.pseudo, users.avatar, articles.title"
		." FROM $this->table"
		." JOIN articles on $this->table.id_article = articles.id"
		." JOIN users on $this->table.id_user = users.id";

		// "SELECT * FROM $this->table JOIN articles on $this->table.id_article=articles.id";
		
		$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_ASSOC);

		



	}

}
