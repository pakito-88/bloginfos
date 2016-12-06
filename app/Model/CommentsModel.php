<?php

namespace Model;

use \W\Model\Model;

/**
 * Description de CommentsModel
 *
 * @author Admin
 */


class CommentsModel extends Model {
	public function searchAllWithArticleInfos($idArticle, $idComment=null) {
		$query = "SELECT comments.*, users.pseudo, users.avatar"
		."FROM $this->table"
		."JOIN articles on $this->table.id_article = article.id"
		."WHERE id = :id_article";


		$idCommentExists = $idComment !== null && ctype_digit($idComment);
		if($idCommentExists) {
			$query .= ' AND comments.id > :id_comment';
		}	

		$statement = $this->dbh->prepare($query);
		$statement -> bindParam(':id_article', $idArticle, PDO::PARAM_INT); 
		var_dump($statement);

		if($idCommentExists) {
			$statement->bindParam(':id_comment', $idComment, PDO::PARAM_INT);
		}
		
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);

	}

}
