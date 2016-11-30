<?php 

namespace Validation\Rules;

use Respect\Validation\Rules\AbstractRule; 
use W\Model\UsersModel;

class emailNotExists extends AbstractRule{

	public function validate($email){
		$userModel = new UsersModel();
		return !$userModel -> emailExists($email);
	}

}