<?php

namespace Controller; 

use \W\Controller\Controller;
use Model\CommentsModel;


class CommentController extends Controller 
{

	public function seeComment($id){
		$commentsModel = new CommentsModel();
		$comment = $commentsModel->find($id);
		

		$this->show('comments/see', array('comment'=>$comment));

	}


	public function addComment(){
		// $this->allowTo('user','super user','admin');
		if (!empty($_POST['content'])) {
			$commentsModel = new CommentsModel();
			$datas = array('content' => $_POST['content']); 
			var_dump($datas);
			$article = $commentsModel->insert($datas);
		}

	}









}