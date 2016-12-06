<?php

namespace Model;

use W\Model\Model;

class ArticlesModel extends Model
{

		/**
	* Cette fonction sélectionne tous les messages d'un salon en les associant avec les infos de leurs utilisateurs respectifs
	* $idSalon est l'id du salon dont on souhaite récupérer les messages
	* La fonction retourne la liste des messages avec les infos utilisateurs
	*/

	public function searchAllWithCategorieInfos($idCategorie, $idArticle = null) {

		$query = "SELECT articles.title, articles.content, articles.author, articles.creation_date, categories.id FROM $this->table JOIN utilisateurs ON $this->table.id_utilisateur = utilisateurs.id WHERE id_salon = :id_salon";

		$idMessageExists = $idMessage !== null && ctype_digit($idMessage);

		if($idMessageExists) {
			$query .= ' AND messages.id > :id_message';
		}

		$query .= ' ORDER BY messages.id ASC';

		$stmt = $this->dbh->prepare($query);

		$stmt->bindParam(':id_salon', $idSalon, PDO::PARAM_INT);

		if($idMessageExists) {
			$stmt->bindParam(':id_message', $idMessage, PDO::PARAM_INT);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}