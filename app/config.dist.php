<?php 

$w_config = [
   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
    'db_pass' => '',								//mot de passe de la bdd
    'db_name' => 'bloginfos',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
	'security_id_user_property' => 'id_user',					//nom de la colonne pour la clef primaire
	'security_pseudo_property' => 'pseudo',		//nom de la colonne pour le "pseudo"
	'security_mail_property' => 'mail',			//nom de la colonne pour l'"email"
	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
	'security_sexe_property' => 'sexe',			//nom de la colonne pour le "role"
	'security_status_property' => 'status',			//nom de la colonne pour le "role"
	'security_avatar_property' => 'avatar',			//nom de la colonne pour le "role"
	'security_registration_date_property' => 'registration_date',			//nom de la colonne pour le "role"

	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion

	// configuration globale
	'site_name'	=> '', 								// contiendra le nom du site
];

require('routes.php');

