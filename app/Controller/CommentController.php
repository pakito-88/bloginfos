<?php

namespace Controller; 

use \W\Controller\Controller;
use Model\CommentsModel;
use Model\ArticlesModel;
use \Plasticbrain\FlashMessages\FlashMessages; 
use \Respect\Validation\Validator as v;


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
			$commentsModel = new CommentsModel();
			$commentsList = $commentsModel->findAll();


			$commentBindArticles = $commentsModel->bindIdCommentWithIdArticle();
						
			$articlesModel = new ArticlesModel();
			$articlesList = $articlesModel -> findAll();

		
			$this->show('comments/list', 
				array(
					'commentsList' => $commentsList,
					'articlesList' => $articlesList,
					'commentBindArticles' => $commentBindArticles
				)
			);
		}

		/**
		 * Cette fonction permet de supprimer un commentaire
		 */

		public function deleteComment($id) {
			$commentsModel = new CommentsModel();
			$deletedComment = $commentsModel->delete($id);
			$this->redirectToRoute('comments_list');
			$this->show('comments/deleteComment', array('deleteComment' => $deleteComment));
		}

		/**
		 * Cette fonction permet de modifier et ajouter un commentaire
		 * @param  [int] $idComment [c'est l'id du commentaire qui est passé en argument. Il est optionnel car pas d'id à la création]. 
		 * 3 cas de figure : 
		 * - On fait une modification, l'id est donc connu et retrouvé via un find
		 * - On fait un ajout, l'id est donc inconnu
		 * - On fait un ajout ou une modification et il y a une erreur, les infos sont donc en POST et réinsérer dans le formulaire pour éviter de les retapper
		 */
		
		public function editComments($idComment = null){
			$commentsModel = new CommentsModel();
			$commentBindArticles = $commentsModel->bindIdCommentWithIdArticle();
							
			$articlesModel = new ArticlesModel();
			$articlesList = $articlesModel -> findAll();

			$datas = [];

			if (!empty($_POST)) {

				// on indique à RESPECT VALIDATION que nos règles de validation seront accessibles depuis le namespace Validation\Rules
				v::with("Validation\Rules");









				$datas = array(
					'id' => $_POST['id'], 
					'content' => $_POST['content'], 
					'id_user' => 1, 
					'id_article' => $_POST['id_article'], 
					'creation_date' => date('Y-m-d H:i:s'), 
					'modification_date'=> date('Y-m-d H:i:s')
				);	

				$idComment = $_POST['id'];

				if ($idComment != null) {
					$commentsModel->update($datas,$idComment);
					$this->getFlashMessenger()->success('Le commentaire a bien été mis à jour');
				}else{
					$comment = $commentsModel->insert($datas);
					$this->getFlashMessenger()->success('Votre commentaire a bien été inséré');
				}	

				 $this->redirectToRoute('comments_list');
			} else {
				if (isset($idComment)) {
					$comment = $commentsModel->find($idComment);

					$datas = array(
						'id' => $comment['id'],
						'content' => $comment['content'], 
						'id_user' => $comment['id_user'], 
						'id_article' => $comment['id_article'], 
						'creation_date' => $comment['creation_date'], 
						'modification_date'=> $comment['modification_date']
					);	

			}					
			$this->show('comments/edit', array('idComment'=>$idComment, 'datas' => $datas, 'commentBindArticles'=>$commentBindArticles));
			}
		}	























}