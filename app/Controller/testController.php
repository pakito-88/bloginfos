<?php

namespace Controller;



class testController extends BaseController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function monAction()
	{
		$this->show('test/index');
	}

}