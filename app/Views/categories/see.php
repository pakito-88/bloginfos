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
<?php $this->stop('main_content');?>