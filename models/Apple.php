<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Apple extends ActiveRecord
{
    public static function tableName()
    {
        return 'apples';
    }

    public function eat($percent)
	{
		$this->eatenPercent = $this->eatenPercent + $percent;
	}

}