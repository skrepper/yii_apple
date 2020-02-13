<?php

namespace backend\controllers;

use Yii;
use yii\rest\ActiveController;
use backend\models\Apple;

class AppleController extends ActiveController
{
	public $modelClass = 'backend\models\Apple';
}