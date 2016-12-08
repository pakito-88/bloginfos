<?php $this->layout('layout', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content');?>

<ul>
	<?php foreach ($categoriesList as $category) : ?>

	<li><a href="<?php echo $this->url('see_category', array('id'=>$category['id']))?>"><?php echo $category['name'] ?></li>

	<?php endforeach; ?>
</ul>


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


<?php 
foreach ($listUsers as $user) {
	$urlDel = $this->url('delete_article', array( 'id' => $user['id']));
	$urlModif = $this->url('update_article', array('id'=>$user['id']));
	$img = $this->assetUrl('uploads/' . $user['avatar']);

	echo '<tr>';
	echo '<td>' . $user['pseudo'] . '</td>';
	echo '<td>' . $user['email'] . '</td>';
	echo '<td>*************</td>';
	echo '<td>' . $user['sexe'] . '</td>';
	echo '<td>' . $user['status'] . '</td>';
	echo '<td><img src="'.$img.'"></td>';

	echo "<td><a href= \"$urlDel\">Supprimer</a></td>";
	echo "<td><a href= \"$urlModif\">Modifier</a></td>";
	
	echo '</tr>';
} 
?>


</table>

<?php $this->stop('main_content');?>