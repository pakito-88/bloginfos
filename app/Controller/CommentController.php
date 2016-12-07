<?php

namespace Controller; 

use \W\Controller\Controller;
use Model\CommentsModel;
use Model\ArticlesModel;
use \Plasticbrain\FlashMessages\FlashMessages; 


class CommentController extends BaseController 
{

		/** 
		 * Cette fonction permet d'afficher la liste des commentaires 
		 */
		public function seeComments($id) {
			
			/*
			 * Ici j'instancie depuis l'action du contrôleur un modèle de commentaires
			 * pour pouvoir accéder à la liste des commentaires
			 */
			
			$commentsModel = new CommentsModel();
			
			$commentsList = $commentsModel->find($id);
			$commentsList = $commentsModel->searchAllWithUserInfos($id);
			var_dump($commentsList);

			$this->show('comments/see', array('commentsList' => $commentsList));
		}	


		/**
		 * Cette fonction permet d'ajouter un nouveau commentaire en BDD
		 */

		public function CommentsList() { 
			$commentModel = new CommentsModel();
			$commentsList = $commentModel->findAll();


			$commentBindArticles = $commentModel->bindIdCommentWithIdArticle();
						
			$articlesModel = new ArticlesModel();
			$articlesList = $articlesModel -> findAll();
			
			
			// $currentUser = $this->getUser();

			// S'il y a un utilisateur courant 
			// if ($currentUser){
				if (!empty($_POST)) {
					if (!empty($_POST['content'])) {
						$commentsModel = new CommentsModel();
						$datas = array(
							'content' => $_POST['content'], 
							'id_user' => 1, 
							'id_article' => $_POST['id_article'], 
							'creation_date' => date('Y-m-d H:i:s'), 
							'modification_date'=> date('Y-m-d H:i:s')
						);	
						
						$comment = $commentsModel->insert($datas);
						$this->redirectToRoute('comments_list');	
					}	
				}
			// }
			

		
			$this->show('comments/list', 
				array(
					'commentsList' => $commentsList,
					'articlesList' => $articlesList,
					'commentBindArticles' => $commentBindArticles
				)
			);


		}























}