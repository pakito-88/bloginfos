<<<<<<< HEAD
<?php $this->layout('layoutBo', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content');?>

<section id="sectionnage"></section>

=======
<?php $this->layout('layout', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content');?>

>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
<ul>
	<?php foreach ($categoriesList as $category) : ?>

	<li><a href="<?php echo $this->url('see_category', array('id'=>$category['id']))?>"><?php echo $category['name'] ?></li>

	<?php endforeach; ?>
</ul>

<<<<<<< HEAD
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

=======
>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
<?php $this->stop('main_content');?>