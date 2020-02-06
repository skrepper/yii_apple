<?php
namespace backend\controllers;


use Yii;
use yii\web\Controller;
use backend\models\Apple;


class FruitController extends Controller
{

private function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}


    public function actionIndex()
    {
	$apples =  Apple::find()->all();
	
	/*$apple =  new Apple();
	$apple->name = 'Qiang';
	$apple->onTree = true;
	$apple->creationDateTime = $this->randomDate('2020-02-04 22:43:00', '2020-02-14 22:43:00');
        $apple->fallDateTime = null;
	$apple->rotten = false;
        $apple->color = rand(0,16);
        $apple->eatenPercent = 0;
	$apple->save(); */

	$apple = Apple::find()
		->where(['id' => 1])
        	->one();
	
	/*$apple->eat(10);
	$apple->save();*/

        return $this->render('index', compact('apples', 'apple'));
    }


    public function actionEat()
    {
	$rq = Yii::$app->request->get();
	$apple = Apple::find()
		->where(['id' => $rq[id]])
        	->one();
	$apple->eat($rq[percent]);
	$apple->save();
	return "Eat!";
    }		


}
