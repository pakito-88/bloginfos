<?php 

namespace Controller;

use W\Controller\Controller;
use Model\UserModel;

class UserController extends Controller
{
public function listUsers() {
		

		$usersModel = new UserModel();
		
		$usersList = $usersModel->findAll();
		
		// la ligne suivante affiche la vue présente dans app/Views/users/list.php
		// et y injecte le tableau $usersList sous un nouveau nom $listUsers
		$this->show('users/list', array('listUsers' => $usersList));
	}
}