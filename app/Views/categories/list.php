<?php $this->layout('layout', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content');?>

<ul>
	<?php foreach ($categoriesList as $category) : ?>

	<li><a href="<?php echo $this->url('see_category', array('id'=>$category['id']))?>"><?php echo $category['name'] ?></li>

	<?php endforeach; ?>
</ul>

<?php $this->stop('main_content');?>