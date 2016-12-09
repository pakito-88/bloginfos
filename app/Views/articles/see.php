<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('main_content');?>

<?php $this->insert('sidebar', ['articlesSidebar' => $articlesSidebar]); ?> 
<section id="rubrique">
	<h2 class="titre"><?php echo $this->e($article['title']); ?> : </h2>

	<img  src="<?php echo $this->assetUrl('img/trois.jpg') ?> " class="photoCategorie">

	<p class="content"><?php echo $this->e($article['content']); ?> </p>
	<span class="content"><?php echo $this->e($article['author']); ?></span>
	<br/>
	<br/>
	<span class="content"><?php echo $this->e($article['creation_date']); ?></span>
</section>

<form class="form-message" action="" method="POST">
	<p><strong> Pour commenter l'article </strong></p>
	<input type="text" name="message"><input type="submit" class="button" name="send" value="Envoyer">
</form>

<?php $this->stop('main_content');?>