<?php $this->layout('layoutBo', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content');?>

<section id="sectionnage"></section>

<ul>
	<?php foreach ($categoriesList as $category) : ?>

	<li><a href="<?php echo $this->url('see_category', array('id'=>$category['id']))?>"><?php echo $category['name'] ?></li>

	<?php endforeach; ?>
</ul>

<section></section>


<h1>CATEGORIE</h1>
<table>

	<tr>
		<th>pseudo</th>
		<th>email</th>
		<th>password</th>
		<th>sexe</th>
		<th>status</th>
		<th>avatar</th>
		<th>Actions</th>
	</tr>



</table>

<?php $this->stop('main_content');?>