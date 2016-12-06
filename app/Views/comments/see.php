<?php $this->layout('layout', ['title' => 'Les commentaires']); ?>

<?php $this->start('main_content'); ?>

<li>  <?php echo $this->e($comment['content']); ?> </li>

<?php $this->stop('main_content'); ?>	