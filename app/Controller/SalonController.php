<?php

namespace Controller;

use Model\SalonsModel;
use Model\MessagesModel;
use \Respect\Validation\Validator as v;


class SalonController extends BaseController
{

//cette action permet de voir la listes des messages d'un salon

	public function seeSalon($id){

	/*ON instancie le modèle des salons de facon a recuperer les informations du salon dont j 'ai l id dans l url ($id)*/
		$salonsModel = new SalonsModel();
		$salon= $salonsModel ->find($id);

	// on instanccie le modeles des messages poure reucperer les messagfes du salon dont l'id est $id
		$messageModel = new MessagesModel;

		if(!empty($this->getUser())){
			if (!empty($_POST['message'])) {

				v::with("Validation\\Rules");

				$validators = array(
					"corps"=> v::notEmpty()
					);

				$datas = $_POST['message']; // contenu message
				$user =$this->getUser(); // getUser connecté
				$idSalon=$id; // id salon où ajouté le message
				$dateAjout=date('Y-m-d H:i:s');  //date ajout et de mise ajour
				$dateMaj=$dateAjout;

				$msgInsert=array(
					"corps"=>$datas,
					"id_utilisateur"=>$user['id'],
					"id_salon"=>$idSalon,
					"date_creation"=>$dateAjout,
					"date_modification"=>$dateMaj);
				$messageModel= new MessagesModel;
				$message = $messageModel->insert($msgInsert);

			}
		}

		/*j'utilise une methode propre au model message qui permet de recuperer les messages avec les infos utilisateurs associé*/
		$messages = $messageModel ->searchAllWithUserInfo($id);

		$this->show('salons/see',array('salon'=>$salon,'messages'=>$messages));

/*		valider le contenu de ce message 
		si contenu valide rajouter un nouveaux message en bdd avec messagesModel,
		iduser (session) idsalon(param) et date maj et insertion , contenu message(post).*/ 


	}
}