<?php $this->layout('layout', ['title' => 'Les commentaires']); ?>

<?php $this->start('main_content'); ?>

<li>  <?php echo $this->e($comment['content']); ?> </li>

<form action="<?php echo $this->url('add_comment') ?>" method="post">
	<label for="content"> Nouveau commentaire : </label>
	<input type="text" name="content" id="content"/>
	<input type="submit" name="send" value="Ajouter"/>
</form>


<?php $this->stop('main_content'); ?>	