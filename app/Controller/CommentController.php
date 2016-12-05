<?php

namespace Controller;

use Model\SalonsModel;
use Model\MessagesModel;


class CommentController extends BaseController
{
	
	public function newComment($idArticle, $idComment) {
		$commentModel = new CommentModel();







		$messagesModel = new MessagesModel();
		
		$messages = $messagesModel->searchAllWithUserInfos($idSalon, $idMessage);
		
		$this->show('salons/newmessages', array('messages' => $messages));
	}
	
	public function addSalon() {
		$this->allowTo(['utilisateur','admin','superadmin']);
		if(!empty($_POST['nom'])) {
			$salonModel = new SalonsModel();
			$datas = array('nom' => $_POST['nom']);
			$salon = $salonModel->insert($datas);
			$this->redirectToRoute('see_salon', array('id'=> $salon['id']));
		} 
		
		$this->show('salons/add-salon');
	}

}