<?php 
namespace Model;
use \PDO;
use W\Model\Model;

class MessagesModel extends Model{

	public function searchAllWithUserInfo($idSalon , $idMessage =null){

		$query ="SELECT * FROM $this->table JOIN utilisateurs ON $this->table.id_utilisateur=utilisateurs.id WHERE id_salon = :id_salon";

		$idMessageExists = $idMessage !== null && ctype_digit($idMessage);

		if($idMessageExists){
			$query .= ' AND messages.id > :id_message';
		}

		$query .= 'ORDER by messages.id ASC';

		$stmt=$this->dbh->prepare($query);
		$stmt->bindValue(':id_salon', $idSalon, PDO::PARAM_INT);

		if($idMessageExists){
			$stmt->bindValue(':id_message', $idMessage, PDO::PARAM_INT);
		}

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}