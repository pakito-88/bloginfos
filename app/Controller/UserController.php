<?php

namespace Controller;

use W\Security\AuthentificationModel;
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

	public function login(){

		if(!empty($_POST)){

			if (empty($_POST['mot_de_passe'])) {
			$this->getFlashMessenger()->error('vous entrez un pseudo');
			}

			if (empty($_POST['pseudo'])) {
			$this->getFlashMessenger()->error('vous entrez un password');
			
			}
			$auth= new AuthentificationModel();

			if (! $this->getFlashMessenger()->hasErrors()){

				 $idUser = $auth->isValidLoginInfo($_POST['pseudo'],$_POST['mot_de_passe']);

				 if($idUser!==0){

				 	$UtilisateursModel= new UtilisateursModel ();
				 	$userInfos= $UtilisateursModel ->find($idUser);
				 	$auth->logUserIn($userInfos);

				 	$this->redirectToRoute('default_home');
				 }else{
				 	$this->getFlashMessenger()->error('vos infos sont incorrect');
				 }
			}
		}


		

		$this->show('users/login', array('datas'=> isset($_POST)? $_POST :array())); // adresse du dossier

	}


	public function logout(){
		$auth = new AuthentificationModel();
		$auth ->logUserOut();
		$this->redirectToRoute('login');
	}

	public function register(){
		$this->show('users/register');
	}
}