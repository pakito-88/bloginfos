<?php $this->layout('layout', ['title' => 'La liste des commentaires']); ?>

<?php $this->start('main_content'); ?>

<style>
	th, td{
		width: 7rem;
		text-align: center;
	}
</style>

<table>
	<tr>
		<th> ID </th>
		<th> Contenu</th>
		<th> ID User </th>
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
		<td><?php echo $commentBindArticle['id_article']; ?></td>
		<td><?php echo $commentBindArticle['title']; ?></td>


		<td><?php echo $commentBindArticle['creation_date']; ?></td>
		<td><?php echo $commentBindArticle['modification_date']; ?></td>
		<td> <a href=""> Modifier  </a></td>
		<td> <a href=""> Supprimer  </a> </td>
	</tr>
	<?php endforeach; ?>
</table>



<form method="post">

	<label for="content"> Nouveau commentaire : </label>
	<textarea type="text" name="content" id="content"> </textarea>

	<label for="id_user"> Utilisateur : </label>
	<input type="text" name="id_user" id="id_user"/>

	<label for="id_article"> Article  : </label>
	<input type="text" name="id_article" id="id_article"/>

	<label for="creation_date"> Date de création : </label>
	<input type="date" name="creation_date" id="creation_date"/>


	<label for="modification_date"> Date de modification </label>
	<input type="date" name="modification_date" id="modification_date"/>
	
	
	
	<input type="submit" name="send" value="Ajouter"/>
</form>

<?php $this->stop('main_content'); ?>