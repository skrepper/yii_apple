<?php

namespace backend\models;

use yii\base\Model;

class CreateApplesForm extends Model {
	
	public $numOfApples;
		
	public function rules() {

		return [
	
			['numOfApples', 'required'],
			['numOfApples', 'number', 'max' => 10, 'message' => 'Number < 10 and not String type' ],
		
		];

	}

} 