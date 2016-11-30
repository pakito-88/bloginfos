<?php 

namespace Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException; 
use W\Model\UserModel;

class UsernameNotExistsException extends ValidationException {
	public static $defaultTemplates = array(
		self::MODE_DEFAULT =>[
			'le nom d utilisateur existe dejà'
		],
		self::MODE_NEGATIVE =>[
			'le nom d utilisateur existe dejà'
		],
	);
}