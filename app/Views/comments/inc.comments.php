<?php foreach ($comments as $comment): ?>
	<li data-id="<?php echo $comment['id']; ?>">
		<span class="avatar"><?php echo $this->e($comment['avatar']); ?> : </span>
		<span class="personne"><?php echo $this->e($comment['id_user']); ?> : </span>
		<span class="message"><?php echo $this->e($comment['content']); ?></span>
	</li>
<?php endforeach; 