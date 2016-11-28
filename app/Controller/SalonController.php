<?php

namespace Controller;

use Model\SalonsModel;
use Model\MessagesModel;

class SalonController extends BaseController
{

//cette action permet de voir la listes des messages d'un salon
	public function seeSalon($id){

	/*ON instancie le modèle des salons de facon a recuperer les informations du salon dont j 'ai l id dans l url ($id)*/
		$salonsModel = new SalonsModel();
		$salon= $salonsModel ->find($id);

	// on instanccie le modeles des messages poure reucperer les messagfes du salon dont l'id est $id

		$messageModel = new messagesModel;
	/*j'utilise une methode propre au model message qui permet de recuperer les messages avec les infos utilisateurs associé*/
		$messages = $messageModel ->searchAllWithUserInfo($id);



		$this->show('salons/see',array('salon'=>$salon,'messages'=>$messages));

	}

}