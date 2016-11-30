<?php $this->layout('layout',['title'=>'Contenu de mon Salon']); ?>

<?php $this->start ('main_content'); ?>

	<h2>Bienvenue dans le salon "<?php echo $this->e($salon['nom'])?>"</h2>

	<ol class="messages">

		<?php $this->insert('salons/inc.messages',['messages'=>$messages])  // messages vient du controler saloncontroller?>

	</ol>
	<!-- on affiche le formulaire que si l'utilisateurs est connecté -->

	<?php if($w_user): ?>
	<form action="<?php $this->url('see_salon',array('id'=>$salon['id'])) ?>" method="POST" class="form-message">
		<input type="text" name="message"/>
		<input type="submit" value="Envoyer" class="button" />
	</form>
	<?php else: ?>
		<a href="<?php echo $this->url('login') ?>" title="acces formulaire de connextion" >Connectez-vous pour poster un message</a>
	<?php endif ?>
<?php $this->stop ('main_content'); ?>


<?php $this->start ('javascripts'); ?>
<script type="text/javascript" src="<?php echo $this->assetUrl('js/prepare-chat.js');  ?>"></script>
<script type="text/javascript">
	
var salonId = <?php echo $salon['id']; ?>;
var homeUrl = <?php echo $this->url('see_salon'); ?>;
	$(document).ready(function(){
		// je fais repeter la requete ajax tout les 500 ms
		setInterval(function(){
			var lastMessageId= $('.messages > li:last-child').data('id');
			.get(homeUrl+'newmessages/'+salonId+'/'+lastMessageId, [],function(data){
				$('messages').append(data).scrollTop(('.messages').height());
			});
		},500);
	});
</script>
<?php $this->stop ('javascripts'); ?>
