<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\SalonsModel;

class BaseController extends Controller
{
	// ce champs va contenir $engine de \plates qui va serivr a afficher mes vues. 

	protected $engine;

	public function __construct(){

// je stocke dans la variable de class engine une instance de  league\plates\Engine alors que cette isntance etatit créé directmenet dnas la methode show() de Controller
		$this->engine = new \League\Plates\Engine(self::PATH_VIEWS);


		//charge nos extensions (nos fonctions personnalisées)
		$this->engine->loadExtension(new \W\View\Plates\PlatesExtensions());

		$app = getApp();
		$salonsModel=new SalonsModel;
		// Rend certaines données disponibles à tous les vues
		// accessible avec $w_user & $w_current_route dans les fichiers de vue
		$this->engine->addData(
			[
				'w_user' 		  => $this->getUser(),
				'w_current_route' => $app->getCurrentRoute(),
				'w_site_name'	  => $app->getConfig('site_name'),
				'salons'		  => $salonsModel->findAll(),
			]
		);
	}

	public function show($file, array $data = array())
	{
		// Retire l'éventuelle extension .php
		$file = str_replace('.php', '', $file);

		// Affiche le template
		echo $this->engine->render($file, $data);
		die();
	}

	public function addGlobalData(array $datas)
	 {
	 	$this->engine->addData($datas);
	 }
}