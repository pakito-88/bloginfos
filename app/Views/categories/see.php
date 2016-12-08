<?php $this->layout('layout', ['title' => 'Liste des articles d\'une catégorie']) ?>

<?php $this->start('main_content');?>

<h2 class="title"><?php echo $this->e($category['name']); ?> : </h2>

<ul>
	<?php foreach ($articles as $article) : ?>

	<li><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>"><?php echo $article['title'] ?></li>

	<?php endforeach; ?>
</ul>

<?php $this->stop('main_content');?>