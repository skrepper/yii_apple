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

    public function getTimeToDrop()
	{
		$coeff = 60;
		$maxdiff = 5*3600/$coeff;
		$diff =  time() - strtotime($this->creationDateTime);// - $maxdiff;
		$progressValue = (1 - $diff/$maxdiff)*100;
		if ($diff > $maxdiff) {
			return 0;
		} else {
			return $progressValue;
		}
	}
}