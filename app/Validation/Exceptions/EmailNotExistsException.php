<?php 

namespace Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException; 
use W\Model\UserModel;

class EmailNotExistsException extends ValidationException {
	public static $defaultTemplates = array(
		self::MODE_DEFAULT =>[
			'l email existe dejà'
		],
		self::MODE_NEGATIVE =>[
			'l email existe dejà'
		],
	);
}