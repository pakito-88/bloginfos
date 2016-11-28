<?php

namespace Controller;


use \Model\UtilisateursModel;

class UserController extends BaseController
{
	/* Cette fx sert a affihcer la liste des utilisateurs*/
	public function listUsers(){
		$userList = array('Googleman','Pausewoman','Pauseman','Roland');

		// ici j instancie depuis l'action du controleur un modele d utilisateur pour avoir acces a la lsite des utilisateur
		
		$userModel = new UtilisateursModel();
		$userList = $userModel ->findAll();


		$this->show('users/list',array('listUsers'=>$userList)); // affiche la vue presente dans app/views/users/list.php et y injecte $userlist sous un nouveau nom $listUsers
	}
}