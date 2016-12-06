<?php $this->layout('layout', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content');?>

<ul>
	<?php foreach ($articlesList as $article) : ?>

	<li><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>"><?php echo $article['title'] ?></li>

	<?php endforeach; ?>
</ul>


<?php $this->stop('main_content');?>