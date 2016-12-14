<?php

namespace Controller;

use W\Controller\Controller;
use Model\ArticlesModel;
use Model\CategoriesModel;
use Model\CommentsModel;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;

class ArticlesController extends BaseController
{

	/**
	* Cette fonction sert à afficher la liste des articles
	*/
	public function articlesList() {

		$articlesModel = new ArticlesModel();
		$articlesList = $articlesModel->findAll();

		$categoriesArticle = $articlesModel->searchCategoryWithArticle();

		if ($this->getUser()['status'] !='admin') {
			$this->redirectToRoute('default_home');
			}
			
		$this->show(
			'articles/list', 
			array(
				'categoriesArticle' => $categoriesArticle,
				'articlesList' => $articlesList
			)
		);
	}


	/**
	* Cette fonction sert à modifier ou insérer des articles
	* Elle prend en paramètre optionnel l'id de l'article à modifier, si il n'existe pas c'est de l'insertion
	*/

	public function editArticles($idArticle = null) {

			$CategoriesModel = new CategoriesModel();
			$categoriesList = $CategoriesModel->findAll();
			$articlesModel = new articlesModel();
			$datas = [];

		if (!empty($_POST)) {

			if(empty($_POST['title'])) {
				$this->getFlashMessenger()->error('Veuillez entrer un titre');
			}
			
			if(empty($_POST['content'])) {
				$this->getFlashMessenger()->error('Veuillez entrer un contenu');
			}

			if(empty($_POST['author'])) {
				$this->getFlashMessenger()->error('Veuillez entrer un auteur');
			}


				$validators = array(
					'title' => v::length(5,55)
						->setName('Titre de l\'article'),

					'content' => v::length(100, null)
						->setName('Contenu'),

					'author' => v::length(5,55)
						->alnum()
						->setName('Auteur'),


					'image' => v::optional(
						v::image()
						->size('0', '1MB')
						->uploaded()
					)
				);

			$datas = $_POST;

	
				$trads = array(
					'alnum' => '{{name}} ne doit contenir que des caractères alphanumériques',
					'length' => '{{name}} doit avoir une longueur minimum de {{minValue}} caractères',
					'size' => '{{name}} doit avoir une taille comprise entre {{minSize}} et {{maxSize}}',
					'upload' => '{{name}} n\'a pas été uploadé correctement',
					'image' => '{{name}} doit être une image',
					// 'ArticleNotExists' => '{{name}} existe déjà'
				);

				// Je parcours la liste de mes validateurs  en récupérant aussi le nom du champ en clé
				foreach($validators as $field => $validator) {
					// La méthode assert renvoie une exception de type NestedValidationException qui nous permet de récupérer le ou les messages d'erreur en cas d'erreurs
					try {
						// On essaie de valider la donnée si une exception se produit, on exécute le bloc catch
						$validator->check(isset($datas[$field]) ? $datas[$field] : '');

					} catch(ValidationException $ex) {
						// on récupère l'exception qui signifie qu'il y a eu une erreur et on ajoute un message d'erreur avec l'autre bibliotèque
						$ex->setTemplate($trads[$ex->getId()]);

						$mainMessage = $ex->getMainMessage();

						$this->getFlashMessenger()->error($mainMessage);

					}
				
				}

					$datas = array(
						'title' => $_POST['title'],
						'content' => $_POST['content'],
						'author' => $_POST['author'],
						'id_category' => $_POST['id_category'],
						'creation_date' => date('Y-m-d H:i:s'),
						'id_user' => 1
					);

				if(! $this->getFlashMessenger()->hasErrors()) {

					$idArticle = $_POST['id'];

					// on déplace l'image vers le dossier avatars

					if( !empty($_FILES['image']['tmp_name'])) {
				
						$datas['image'] = $_FILES['image']['tmp_name'];

					} else {
					
						$datas['image'] = '';
					}
				
					if( ! empty($_FILES['image']['tmp_name'])) {
						$initialImagePath = $_FILES['image']['tmp_name'];
						$imageNewName = md5(time() . uniqid());

						$targetPath = realpath('assets/uploads/articles/');
						
						move_uploaded_file($initialImagePath, $targetPath.'/'.$imageNewName);

						// on met à jour le nouveau nom de l'avatar dans $datas
						$datas['image'] = $imageNewName;
					}

					if ($idArticle != null) {

						$articlesModel->update($datas, $idArticle);

					} else{

						$articlesNew = $articlesModel->insert($datas);
						
					}

					$this->redirectToRoute('articles_list');
				}
			
		} else {
			
			if (isset($idArticle)) {
				
				$articleInfos = $articlesModel->find($idArticle);

				$datas = array(
				'title' => $articleInfos['title'],
				'content' => $articleInfos['content'],
				'author' => $articleInfos['author'],
				'id_category' => $articleInfos['id_category'],
				'creation_date' => $articleInfos['creation_date'],
				'id_user' => $articleInfos['id_user']
				);	
			}

		}

		if ($this->getUser()['status'] !='admin') {
			$this->redirectToRoute('default_home');
		}

		$this->show('articles/update', array('idArticle'=> $idArticle, 'datas' => $datas, 'categoriesList' => $categoriesList));

	}


	/**
	* Cette méthode permet de voir le contenu d'un article
	* param : $id, l'id de l'article dont je cherche à voir le contenu
	*/
	public function seeArticle($id) {

		/**
		* On instancie le modèle des articles de façon à récupérer les infos de l'article par son id ($id) passé en URL grace à la méthode find() du model dans W
		*/
		$ArticlesModel = new ArticlesModel();
		$article = $ArticlesModel->find($id);

		$categoriesModel = new CategoriesModel();
		$articlesSidebar = $categoriesModel->showLastSixArticlesInSidebar($article['id_category']);
		
			/**
		 * [$commentsModel Méthode qui permet d'afficher les commentaires d'un article ]
		 * @var CommentsModel on instancie un nouveau model
		 */
		$commentsModel = new CommentsModel();
		$commentsList = $commentsModel -> showCommentInArticle($id);

		$currentUser = $this->getUser();

		// On effectue les vérifications nécessaires pour insérer un commentaire à un article
		// 1) S'il y a un utilisateur connecté 
		if ($currentUser){

			if (!empty($_POST)) {
				$comment=$_POST['content'];			
				$datas = array(
					'content' => $comment, 
					'id_user' => $currentUser['id'], 
					'id_article' => $id, 
					'creation_date' => date('Y-m-d H:i:s'), 
					'modification_date'=> date('Y-m-d H:i:s')
				);	
				$comment=$commentsModel->insert($datas);

				$articleDatas = array(
					'title' => $_POST['title'],
					'content' => $_POST['content'],
					'author' => $_POST['author'],
					'id_category' => $_POST['id_category'],
					'creation_date' => date('Y-m-d H:i:s'),
					'id_user' => $currentUser['id'],
					'image' => $_FILES['image']
					);
				$newArticle = $ArticlesModel->insert($articleDatas);
			}

		}else{
			$this->getFlashMessenger()->error('Vous devez être connecté');
		}	
		unset($_POST);
		$this->show('articles/see', array('article' => $article, 'articlesSidebar' => $articlesSidebar, 'commentsList'=>$commentsList));
	}



	public function deleteArticle($id) {

		$articlesModel = new ArticlesModel();

		$deletedArticle = $articlesModel->delete($id);

		$this->redirectToRoute('articles_list');
 
		$this->show('articles/deleteArticle', array('deletedArticle' => $deletedArticle));
	}

	public function newComments($idArticle, $idComment){
		$commentsModel = new CommentsModel();
		$commentsList = $commentsModel -> searchArticleWithCommentInfos($idArticle, $idComment);

		$this->show('articles/newcomments', array('commentsList'=>$commentsList));

	}



}