<?php $this->layout('layout', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content');?>

<h2 class="title"> Vous lisez l'article <?php echo $this->e($article['title']); ?> : </h2>
<p class="content"><?php echo $this->e($article['content']); ?> </p>
<span class="content"><?php echo $this->e($article['author']); ?></span>
<br/>
<br/>
<span class="content"><?php echo $this->e($article['creation_date']); ?></span>



<?php foreach ($comment as $comment): ?>
	<li data-id="<?php echo $comment['id']; ?>">
		<span class="avatar"><?php echo $this->e($comment['avatar']); ?> : </span>
		<span class="personne"><?php echo $this->e($comment['pseudo']); ?> : </span>
		<span class="message"><?php echo $this->e($comment['content']); ?></span>
	</li>
<?php endforeach; ?>

<form action="<?php echo $this->url('add_comment', array($this->$article['id'])) ?>" method="post">
	<label for="content"> Nouveau commentaire : </label>
	<input type="text" name="content" id="content"/>
	<input type="submit" name="send" value="Envoyer"/>
</form>	

<?php $this->stop('main_content');?>