<?php

namespace Model;

use W\Model\Model;

class CategoriesModel extends Model
{

	/**
	* Cette fonction sélectionne tous les articles d'une catégorie
	* $idCategory est l'id de la catégorie dont on souhaite récupérer les articles
	* La fonction retourne la liste des articles
	*/

	public function searchArticlesWithCategory($idCategory) {

<<<<<<< HEAD
		$query = "SELECT articles.* FROM $this->table JOIN articles ON $this->table.id = articles.id_category WHERE articles.id_category = :id_category";
=======
		$query = "SELECT articles.title, articles.id FROM $this->table JOIN articles ON $this->table.id = articles.id_category WHERE articles.id_category = :id_category";
>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b


		$stmt = $this->dbh->prepare($query);

		$stmt->bindParam(':id_category', $idCategory);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);


	}

}