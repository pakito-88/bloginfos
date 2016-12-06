<?php

namespace Controller; 

use \W\Controller\Controller;
use Model\CommentsModel;
use Model\ArticlesModel;


class CommentController extends Controller 
{

	public function seeComment($id){
		$articlesModel = new ArticlesModel();
		$article = $articlesModel->find($id);

		$commentsModel = new CommentsModel();
		if ($this->getUser()) {
			if (!empty($_POST['content'])) {
				$user = getUser();
				$datas = 
				[
					'id' => $id, 
					'content'=> $_POST['content'], 
					'id_user' => $user['id'],
					'id_article' =>  $article,
					'creation_date' => date('Y-m-d H:i:s'),
					'modification_date' => date('Y-m-d H:i:s')
				];
				$commentsModel->insert($datas);
			}
		}

		$comment = $commentsModel->searchAllWithUserInfos($article['id']);
		var_dump($comment);
		$this->show('articles/see', array('article' =>$article, 'comment'=>$comment));

	}


	public function addComment($idArticle){
		// $this->allowTo('user','super user','admin'); 

		$idUser = $this->getUser(); 

		if (!empty($_POST['content'])) {
			$commentsModel = new CommentsModel();
			$datas = array('content' => $_POST['content']); 
			var_dump($datas);
			$comment = $commentsModel->insert($datas);
	
			
		}


	}









}