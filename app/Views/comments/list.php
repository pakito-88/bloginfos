<?php $this->layout('layoutBo', ['title' => 'La liste des commentaires']); ?>

<?php $this->start('main_content'); ?>

<section id="sectionnage"></section>


<table>
	
	<tr>
		<th> ID </th>
		<th> Contenu</th>
		<th> ID de l'utilisateur </th>
		<th> Nom de l'utilisateur </th>

		<th> ID Article </th>
		<th> Nom Article </th>
		<th> Date de création </th>
		<th> Date de modification </th>
		<th> Modifier </th>
		<th> Supprimer</th>
	</tr>

</table>


<?php 

 ?>

<table>

	<?php foreach ($commentBindArticles as $commentBindArticle) :?>
	<tr>
		<td><?php echo $commentBindArticle['id']; ?></td>
		<td><?php echo $commentBindArticle['content']; ?></td>
		<td><?php echo $commentBindArticle['id_user']; ?></td>
		<td><?php echo $commentBindArticle['pseudo']; ?></td>
		<td><?php echo $commentBindArticle['id_article']; ?></td>
		<td><?php echo $commentBindArticle['title']; ?></td>


		<td><?php echo $commentBindArticle['creation_date']; ?></td>
		<td><?php echo $commentBindArticle['modification_date']; ?></td>
		<td> <a href="<?php echo $this->url('update_comment', array('id'=>$commentBindArticle['id'])) ?>"> Modifier  </a></td>
		<td> <a href="<?php echo $this->url('delete_comment', array('id'=>$commentBindArticle['id'])) ?>"> Supprimer  </a> </td>
	</tr>
	<?php endforeach; ?>


</table>

<button> <a href="<?php echo $this->url('add_comment') ;?> "> Ajouter un nouveau commentaire </a> </button>


<?php $this->stop('main_content'); ?>