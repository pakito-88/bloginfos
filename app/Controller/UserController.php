<?php

namespace Controller;

use Model\UtilisateursModel;
use W\Security\AuthentificationModel;
use \Respect\Validation\Validator as v;
use \Respect\Validation\Exceptions\NestedValidationException;

class UserController extends BaseController
{
	/**
	 * 	Cette fonction sert à afficher la liste des utilisateurs 
	 */
	public function listUsers()
	{
		/**
		 * J'instancie depuis l'action du controler un modele d'utilisateurs pour pouvoir accéder à la liste des utilisateurs
		 */
		this-> allowTo(['admin','superadmin']);

		$usersModel = new UtilisateursModel();
		$usersList = $usersModel -> findAll();


		//	$usersList = array('GoogleMan', 'Pausewoman','Yaké', 'Roland');
		/* Affiche la vue présente dans app/views/users/list.php et y injecte le tablaeu $usersList sous un nouveau nom $listUsers */
		$this -> show('users/list', array('listUsers' => $usersList));
	}
	
	public function login()	{
		// On va utiliser le modèle d'authentifaction et plus particulièrement la méthode isValidLoginInfos à laquelle on passera en paramètre le pseudo/email et le password envoyés en POST par l'utilisateur 
		// Une fois cette vérification faite, on récupère l'utilisateur en BDD on le connecte et on le redirige vers la page d'accueil 


		if (!empty($_POST)) {
			// 1) Je vérifie la non-vacuité du pseudo en POST 
			if (empty($_POST['pseudo'])) {
				$this->getFlashMessenger()->error('Veuillez entrer un pseudo');
			}
			// 1) Je vérifie la non-vacuité du mdp en POST
			if (empty($_POST['mot_de_passe'])) {
				$this->getFlashMessenger()->error('Veuillez entrer un mot de passe');
			}

			$authentifaction = new AuthentificationModel();

			if (! $this->getFlashMessenger()->hasErrors()) {
				//Vérification de l'existence de l'utilisateur
				$idUser = $authentifaction->isValidLoginInfo($_POST['pseudo'], $_POST['mot_de_passe']); 

				// Si l'utilisateur existe, on le connecte
				if ($idUser !== 0) {
					$utilisateurModel = new UtilisateursModel();

					//Je récupère les infos de l'utilisateur et je m'en sers pour le connecter au site à l'aide de $authentifaction->logUserIn($userInfos);
					$userInfos = $utilisateurModel -> find($idUser);
					$authentifaction -> logUserIn($userInfos);

					//Une fois que l'utilisateur est connec, je le redirige vers l'acceil 
					$this->redirectToRoute('default_home');
				}else{
					$this->getFlashMessenger()->error('Vos informations de connexion sont incorrectes');
				}
			}

		}

		$this->show('users/login', array('datas' => isset($_POST) ? $_POST : array()));
		// chemin à partir de Views : users/login.php
		// array('datas' => isset($_POST) ? $_POST : array() permet d'injecter des informations à la vue
	}


	public function logout(){
		$authentifaction = new AuthentificationModel();
		$authentifaction->logUserOut();
		$this->redirectToRoute('login');
	}

	public function register(){
		if (!empty($_POST)) {

			v::with("Validation\\Rules");

			$validators = array(
				"pseudo" => v::length(3,50)
				->alnum()
				->noWhiteSpace()
				->usernameNotExists()
				->setName('Nom d\'utilisateur'), 


				"email" => v::email()
				->setName('Email')
				->emailNotExists(),

				"mot_de_passe" => v::length(3,50)
				->noWhiteSpace()
				->alnum()
				->setName('Mot de passe'), 

				'sexe' => v::in(['Femme','Homme','Autre']),

				"avatar" => v::optional(
					v::image()->size('0','1MB')
					->uploaded()
				)
			);

			$datas = $_POST;

			//On ajoute le chemin vers le fichier d'avatar qui a été uploadé s'il y en a
			if (!empty($_FILES['avatar']['tmp_name'])) {
				// Je stocke en donnée à valider le chemin vers la localisation temporaire de l'avatar
				$datas['avatar'] = $_FILES['avatar']['tmp_name'];
			}else{
				//Sinon je laisse le champ vide
				$datas['avatar'] = '';
			}


			// Je parcours la liste de mes validators en récupérant aussi le nom du champ en clé 
			foreach ($validators as $field => $validator) {
				// La méthode assert renvoieune exception de type NestedValidationException qui nous permet de récupérer le(s) message(s) d'erreur en cas d'erreur
				try{
					// On essaye de valider la donnée. 
					//Si une exception se produit, c'est le bloc catch qui sera exécuté
					$validator->assert(isset($datas[$field]) ? $datas[$field] : '' );
				}
				// l'excetpion $ex sera du type NestedValidationException
				catch (NestedValidationException $ex){
					$fullMessage = $ex->getFullMessage();
					$this->getFlashMessenger()->error($fullMessage);
				}
			}
		

		if ( !$this->getFlashMessenger()->hasErrors()){
			//pas d erreurs on insert les données users
			/*avant insertion on doit 
			1) deplacer l'avatar du tmp vers le dossier avatars
			2) hacher le passwords*/

			$auth= new AuthentificationModel();

			$datas['mot_de_passe'] = $auth ->hashPassword($datas['mot_de_passe']);


			if(!empty($_FILES['avatar']['tmp_name']) ){

				$initalAvatarPath = $_FILES['avatar']['tmp_name'];
				$avatarNewName = md5(time().uniqid());

				$targetPath = realpath('assets/upload');

				move_uploaded_file($initalAvatarPath, $targetPath.'/'.$avatarNewName);

				// maj du nom de l avatar dans $datas

				$datas['avatar'] = $avatarNewName;
			}else{
				$datas['avatar'] = 'default.png';

			}

			

			$UtilisateursModel = new UtilisateursModel ();
			unset($datas['send']);

			$userInfos= $UtilisateursModel->insert($datas);

			$auth -> logUserIn($userInfos);

			$this->getFlashMessenger()-> success('vous etes inscrit a T-chat');
			$this->redirectToRoute('default_home');


		}
	}
		$this->show('users/register');
	}







}

