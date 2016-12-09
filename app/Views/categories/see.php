<<<<<<< HEAD
<?php $this->layout('layout', ['title' => $this->e($category['name'])]) ?>

<?php $this->start('main_content');?>

<?php $this->insert('sidebar', ['articlesSidebar' => $articles]); ?>
	<section>
		<?php foreach ($articles as $article) : ?>
		    <article class="whiteShadow">
	                   
	            <p><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>"><?php echo $article['title'] ?></p>
	            <img src="<?php echo $this->assetUrl('img/trois.jpg') ?>" alt="Photo d'une cabine">
	            <p><?php echo $article['content']?></p>
	            <p><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>" class="readMore">Lire la suite...</a></p>

	        </article>
		<?php endforeach; ?>
	</section>
=======
<?php $this->layout('layout', ['title' => 'Liste des articles d\'une catégorie']) ?>

<?php $this->start('main_content');?>

<h2 class="title"><?php echo $this->e($category['name']); ?> : </h2>

<ul>
	<?php foreach ($articles as $article) : ?>

	<li><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>"><?php echo $article['title'] ?></li>

	<?php endforeach; ?>
</ul>

>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
<?php $this->stop('main_content');?>