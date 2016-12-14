<?php $this->layout('layout', ['title' => $this->e($category['name'])]) ?>

<?php $this->start('main_content');?>

<?php $this->insert('sidebar', ['articlesSidebar' => $articles]); ?>

	<section>
		<?php foreach ($articles as $article) : 
		$img = $this->assetUrl('uploads/articles/' . $article['image']); ?>
		    <article class="whiteShadow">
	                   
	            <p><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>"><?php echo $article['title'] ?></p>
	            <img src="<?php echo $img ;?>">
	            <p><?php echo (substr($article['content'], 0,500)) ; ?></p>

	            <p><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>" class="readMore">Lire la suite...</a></p>

	        </article>


		<?php endforeach; ?>

	</section>


		<section class="hidden">
		<?php foreach ($articlesList as $articles) : 
		$img = $this->assetUrl('uploads/articles/' . $articles['image']); ?>
		    <article class="whiteShadow">
	                   
	            <p><a href="<?php echo $this->url('see_article', array('id'=>$articles['id']))?>"><?php echo $articles['title'] ?></p>
	            <img src="<?php echo $img ;?>">
	            <p><?php echo (substr($articles['content'], 0,500)) ; ?></p>

	            <p><a href="<?php echo $this->url('see_article', array('id'=>$articles['id']))?>" class="readMore">Lire la suite...</a></p>

	        </article>

	        
		<?php endforeach; ?>
	</section>



	
<?php $this->stop('main_content');?>