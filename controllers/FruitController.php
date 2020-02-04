<?php
namespace backend\controllers;


use Yii;
use yii\web\Controller;
use backend\models\Apple;


class FruitController extends Controller
{


    public function actionIndex()
    {
	$apples =  Apple::find()->all();

        return $this->render('index', compact('apples'));
    }


}
