

	<?php foreach($messages as $message): ?>
<!-- j ajoute l id message a tout mes message pour utiliser l id message du dernier poster -->
		<li data-id="<?php echo $message['id'];?>">

			<span class="avatar"><img src="<?php echo $this->assetUrl('upload/'.$message['avatar']);?>" alt=""></span>
			<span class="personne"><?php echo $this->e($message['pseudo']);?></span>
			<span class="message"><?php echo $this->e($message['corps']);?></span>
			
		</li>
	<?php endforeach; ?>