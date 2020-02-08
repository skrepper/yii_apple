<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('@web/css/apple.css');

$this->title = 'fruits';

if (Yii::$app->user->isGuest) {
	echo "Please login to see this page:)";
	return;
}

?>

<div class='createApplesForm'>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($createApplesForm, 'numOfApples')->label('Number of apples created') ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>

<div class="divTable">

<?php for ($i = 0; $i < count($apples); $i++): ?>
	<div class="divTableRow">
	<div class="divTableCell"> <?php echo $apples[$i]->name ?> </div>
	<div class="divTableCell">	
		<button class='btn btn-<?=getEatenColor($apples[$i]->eatenPercent) ?>' 
		onclick='eatApple(<?=$apples[$i]->id;?>,10);'>  
		Eat. Now(<?=$apples[$i]->eatenPercent ?>)
		</button>
	</div>
	</div>
<?php endfor; ?>
	
</div>