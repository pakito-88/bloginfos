<?php $this->layout('layoutBo', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content');?>

<table>
	<tr>
		<th>Titre</th>
		<th>Contenu</th>
		<th>Auteur</th>
		<th>Catégorie</th>
		<th>Date création</th>
		<th>Utilisateur</th>
		<th>Actions</th>
	</tr>


	<?php foreach ($categoriesArticle as $category) :?>
	<tr>
		<td><?php echo $category['title'] ?></td>
		<td><a href="<?php echo $this->url('see_article', array('id'=>$category['id']))?>">Lire l'article</a></td>
		<td><?php echo $category['author'] ;?></td>
		<td><?php echo $category['id_category'] . '-' . $category['name'];;?></td>
		<td><?php echo $category['creation_date']; ?></td>
		<td>
			<?php if($category['id_user'] != null) { ?>
				<?php echo $category['id_user'] ?>
			<?php } else { echo 0; }?>
		</td>

		<td><a href="<?php echo $this->url('delete_article', array('id'=>$category['id'])) ?>">Supprimer</a></td>
		<td><a href="<?php echo $this->url('update_article', array('id'=>$category['id'])) ?>">Modifier</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<button><a href="<?php echo $this->url('add_articles')?>">Ajouter un article</a></button>


<?php $this->stop('main_content');?>