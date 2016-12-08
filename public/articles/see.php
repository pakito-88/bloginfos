<?php $this->layout('layout', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content');?>

<h2 class="title"><?php echo $this->e($article['title']); ?> : </h2>
<p class="content"><?php echo $this->e($article['content']); ?> </p>
<span class="content"><?php echo $this->e($article['author']); ?></span>
<br/>
<br/>
<span class="content"><?php echo $this->e($article['creation_date']); ?></span>

<?php $this->stop('main_content');?>