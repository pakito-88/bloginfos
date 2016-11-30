<?php $this->layout('layout',['title'=>'Contenu de mon Salon']); ?>

<?php $this->start ('main_content'); ?>

	<h2>Bienvenue dans le salon "<?php echo $this->e($salon['nom'])?>"</h2>

	<ol class="messages">
	<?php foreach($messages as $message): ?>
		<li> 
			<span class=""><?php echo $this->e($message['pseudo']);?></span>
			<span class="message"><?php echo $this->e($message['corps']);?></span>
		</li>
	<?php endforeach; ?>
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