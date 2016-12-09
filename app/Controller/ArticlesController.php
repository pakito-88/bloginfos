<?php

namespace Controller;

use W\Controller\Controller;
use Model\ArticlesModel;
use Model\CategoriesModel;
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

					'id_category' => v::in(array('1', '2', '3', '4', '5', '6')),

				);

				$trads = array(
					'alnum' => '{{name}} ne doit contenir que des caractères alphanumériques',
					'length' => '{{name}} doit avoir une longueur minimum de {{minValue}} caractères',
					'noWhitespace' => '{{name}} ne doit pas contenir d\'espace vide',
					'in' => '{{name}} doit être compris dans {{haystack}}',
					// 'ArticleNotExists' => '{{name}} existe déjà'
				);

				// Je parcours la liste de mes validateurs  en récupérant aussi le nom du champ en clé
				foreach($validators as $field => $validator) {
					// La méthode assert renvoie une exception de type NestedValidationException qui nous permet de récupérer le ou les messages d'erreur en cas d'erreurs
					try {
						// On essaie de valider la donnée si une exception se produit, on exécute le bloc catch
						$validator->check(isset($_POST[$field]) ? $_POST[$field] : '');

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
						'id_user' => 1,
					);

				if(! $this->getFlashMessenger()->hasErrors()) {

					$idArticle = $_POST['id'];

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
		$articlesSidebar = $categoriesModel->searchArticlesWithCategory($article['id_category']);

		$this->show('articles/see', array('article' => $article, 'articlesSidebar' => $articlesSidebar));
	}



	public function deleteArticle($id) {

		$articlesModel = new ArticlesModel();

		$deletedArticle = $articlesModel->delete($id);

		$this->redirectToRoute('articles_list');
 
		$this->show('articles/deleteArticle', array('deletedArticle' => $deletedArticle));
	}


	public function updateArticle($id) {

		$ArticlesModel = new ArticlesModel();
		$article = $ArticlesModel->find($id);
		var_dump($article);

			$datas = array(
				'title' => $article['title'],
				'content' => $article['content'],
				'author' => $article['author'],
				'id_category' => $article['id_category'],
				'creation_date' => $article['creation_date'],
				'id_user' => $article['id_user'],
				);

		$updatedArticle = $ArticlesModel->update($datas, $id);

		

		$this->show('articles/updatedArticle', array('updatedArticle' => $updatedArticle));

		}

}