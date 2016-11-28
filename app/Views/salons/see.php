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
	
	<form action="<?php $this->url('see_salon',array('id'=>$salon['id'])) ?>" method="POST" class="form-message">
		<input type="text" name="message"/>
		<input type="submit" value="Envoyer" class="button" />
	</form>


<?php $this->stop ('main_content'); ?>