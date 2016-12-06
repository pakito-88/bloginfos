<?php

namespace Controller; 

use \W\Controller\Controller;
use Model\CommentsModel;


class CommentController extends Controller 
{

	public function seeComment($id){
		$commentsModel = new CommentsModel();
		$comment = $commentsModel->find($id);
		var_dump($comment);

		$this->show('comments/see', array('comment'=>$comment));

	}







}