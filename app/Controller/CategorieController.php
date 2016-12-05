<?php

namespace Controller;

use Model\CategoriesModel;

class CategorieController extends BaseController
{
	/**
	 * Cette fonction sert à afficher la liste des utilisateurs
	 */
	public function listCategories() {
//		$usersList = array(
//			'Googleman', 'Pausewoman', 'Pauseman', 'Roland'
//		);
		
		/*
		 * Ici j'instancie depuis l'action du contrôleur un modèle d'utilisateurs
		 * pour pouvoir accéder à la liste des utilisateurs
		 */
		
		$this->allowTo(['admin', 'superuser']);
		
		$categoriesModel = new CategoriesModel();
		
		$categoriesModel = $categoriesModel->findAll();
		
		// la ligne suivante affiche la vue présente dans app/Views/users/list.php
		// et y injecte le tableau $usersList sous un nouveau nom $listUsers
		$this->show('categorie/list-categorie', array('categoriesModel' => $categoriesModel));
	}


}
