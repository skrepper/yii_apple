<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Apple extends ActiveRecord
{
    public function __construct($color = null)
    {  
    	parent::__construct();
	$this->color = $color;
    }

    public static function tableName()
    {
        return 'apples';
    }

    public function eat($percent)
	{
		$this->eatenPercent = $this->eatenPercent + $percent;
	}

}