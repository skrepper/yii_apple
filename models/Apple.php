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
    public function getColorInfo()
	{
		$res = "";
		switch ($this->color) {
		case 0:
			$res = "BLACK";
			break;
		case 1:
			$res = "MISTYROSE";
			break;
		case 2:
			$res = "MIDNIGHTBLUE";
			break;
		case 3:
			$res = "AQUAMARINE";
			break;
		case 4:
			$res = "DARKSEAGREEN";
			break;
		case 5:
			$res = "PALEGREEN";
			break;
		case 6:
			$res = "DARKVIOLET";
			break;
		case 7:
			$res = "ORCHID";
			break;
		case 8:
			$res = "MOCCASIN";
			break;
		case 9:
			$res = "ORANGERED";
			break;
		case 10:
			$res = "HOTPINK";
			break;
		case 11:
			$res = "CRIMSON";
			break;
		case 12:
			$res = "LIGHTCORAL";
			break;
		case 13:
			$res = "KHAKI";
			break;
		case 14:
			$res = "MEDIUMPURPLE";
			break;
		case 15:
			$res = "LIGHTGREEN";
			break;
		case 16:
			$res = "DARKOLIVEGREEN";
			break;
		}
		return $res;
	}
}