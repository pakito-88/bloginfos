<<<<<<< HEAD
<?php $this->layout('layoutBo', ['title' => 'Liste des utilisateurs bloginfos']) ?>

<?php $this->start('main_content'); ?>

<section id="sectionnage"></section>

<h1> Liste des Utilisateurs de BlogInfos</h1>


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
	$urlDel = $this->url('delete_User', array( 'id' => $user['id']));
	$urlModif = $this->url('edit_User', array('id'=>$user['id']));
	$img = $this->assetUrl('uploads/' . $user['avatar']);

	$logodel='<i class="fa fa-trash" aria-hidden="true"></i>';
	$logomodif='<i class="fa fa-pencil" aria-hidden="true"></i>';

	echo '<tr>';
	echo '<td>' . $user['pseudo'] . '</td>';
	echo '<td>' . $user['email'] . '</td>';
	echo '<td>*************</td>';
	echo '<td>' . $user['sexe'] . '</td>';
	echo '<td>' . $user['status'] . '</td>';
	echo '<td><img id="imgavatar" src="'.$img.'"></td>';

	echo "<td><a href= \"$urlDel\">".$logodel."</a><span> / </span><a href= \"$urlModif\">".$logomodif."</a></td>";
	
	echo '</tr>';
} 
?>


</table>
</ul>
<?php $this->stop('main_content'); ?>
=======
<?php $this->layout('layout', ['title' => 'Liste des utilisateurs']) ?>

<?php $this->start('main_content');?>

blabla


<?php $this->stop('main_content');?>
>>>>>>> 40772e9cc8adcae8e9077d261d56ba443212e97b
