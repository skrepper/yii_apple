<?php
namespace backend\controllers;


use Yii;
use yii\web\Controller;
use backend\models\Apple;
use backend\models\CreateApplesForm;


class FruitController extends Controller
{

    public function actionIndex()
    {
	
	//на дереве и старее 5 минут
	$apples = Apple::find()->where('onTree = 1 and TIMESTAMPDIFF(SECOND, `creationDateTime`, now())>300')->all();
	foreach ($apples as $apple) {
    		$apple->onTree = 0;
		$apple->update(false);
	}
	$apple = null;


	$createApplesForm = new CreateApplesForm();
	if ($createApplesForm->load(YII::$app->request->post())){
		if ($createApplesForm->validate()) {
			for ($i=0; $i<$createApplesForm->numOfApples; ++$i) {
				$apple =  new Apple();
				$apple->name = 'Apple '.rand(0,16);
				$apple->onTree = true;
				//случайно в последние 5 минут
				$apple->creationDateTime = randomDate(date("Y-m-d H:i:s"), date("Y-m-d H:i:s", time() - 300)); 
			        $apple->fallDateTime = null;
				$apple->rotten = false;
			        $apple->color = rand(0,16);
			        $apple->eatenPercent = 0;
				$apple->save(); 
			        $this->redirect('index.php?r=fruit');
			}
		}
	}

	$apples =  Apple::find()->all();
	
        return $this->render('index', compact('apples', 'createApplesForm'));
    }


    public function actionEat()
    {
	$rq = Yii::$app->request->get();

	$apple = Apple::find()
		->where(['id' => $rq[id]])
        	->one();

	if (is_null($apple)) { 
		die(header("Id Not Found = ".$rq[id]));;
	}

	if ($apple->onTree == 1) { 
		return "On tree!";
	}

	if ($apple->eatenPercent>=90) {
		$apple->delete();
	}
	else
	{
		$apple->eat($rq[percent]);
		$apple->save();
	};
	return "Eat!"; 
    }		


}
