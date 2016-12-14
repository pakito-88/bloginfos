<?php $this->layout('layout', ['title' => $this->e($article['title'])]) ?>

<?php $this->start('main_content');?>

<?php $this->insert('sidebar', ['articlesSidebar' => $articlesSidebar]); ?> 
<section id="rubrique">

 	<img  src="<?php echo ($article['image'] != null) ? $this->assetUrl('uploads/articles/') . $article['image'] : "";?> " class="photoCategorie"> 
	<p class="content"><?php echo $this->e($article['content']); ?> </p>
	<span class="content"><?php echo $this->e($article['author']); ?></span>
	<br/>
	<br/>
	<span class="content"><?php echo $this->e($article['creation_date']); ?></span>
</section>

<section id='comments'>

	<div class="comments">
		<?php $this->insert('articles/inc.comments', array('commentsList'=>$commentsList)) ; ?>	
	</div>	 

<!-- 
<?php 
//	foreach ($commentsList as $comment) :  ?>

	<div>
	<input type="hidden" value="<?php //echo $comment['id'] ?>">	
	<p id="commentPseudoCreationDate">	<?php //echo $comment['pseudo'], $comment['creation_date']  ;  ?>  </p>
	<p id="commentContent">	<?php //echo (substr($comment['content'], 0,500)); ?> </p>
	</div>

<?php //endforeach ; ?>	
-->



</section> 

<?php if($w_user) : ?>
<form class="form-message" action="" method="POST">
	<p><strong> Pour commenter l'article </strong></p>
	<input type="text" name="content"><input type="submit" class="button" name="send" value="Envoyer">
</form>

<?php else :  ?>
	<a href="<?php echo $this->url('login') ?>" title="Accès au formulaire de connexion"> Connectez-vous pour poster un message </a>
<?php endif ;  ?>

<script
	src="https://code.jquery.com/jquery-2.2.4.js"
	integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
	crossorigin="anonymous"></script>
<script type="text/javascript">
	
	if ( $('img').attr("src") == " " ) {

		$('img').css("display", "none");
	}

</script>

<script type="text/javascript">
	
$('textarea[name="content"]').focus();
$('.comments').scrollTop($('.comments').height());

var articleId = <?php echo $article['id'] ?>; 
var homeUrl = '<?php echo $this->url('default_home'); ?>';


$(function(){
//	setInterval(function(){
		var lastCommentId = $('.comments > div:first-of-type p:first-of-type').data('id') || 0;

		// Premier paramètre : l'url des datas que l'on veut récupérer
		// Deuxième paramètre [] : pas de data injecté car elles sont passées par la route 
		// Dernier paramètre : la fonction que l'on veut exécuter
		$.get(homeUrl+'newcomments/'+articleId+'/'+lastCommentId, [], function(data){
			$('.comments').append(data).scrollTop($('.comments').height());
		});
//	}, 50000000000);


}); // FIN DU DOM 	







</script>
<?php $this->stop('main_content');?>