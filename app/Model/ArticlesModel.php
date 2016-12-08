<?php

namespace Model;

use W\Model\Model;

class ArticlesModel extends Model
{

	/**
	* Cette fonction sélectionne la catégorie qui correspond à l'article
	* $id est l'id de l'article dont on souhaite récupérer la catégorie
	* La fonction retourne les infos de la catégorie
	*/

	public function searchCategoryWithArticle() {

		$query = "SELECT categories.name, categories.id, articles.* FROM $this->table JOIN categories ON $this->table.id_category = categories.id";


		$stmt = $this->dbh->query($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}



}