<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('@web/css/apple.css');

$this->title = 'fruits';

if (Yii::$app->user->isGuest) {
	echo "Please login to see this page:)";
	return;
}
?>


<div class="divTable">

<?php for ($i = 0; $i < count($apples); $i++): ?>
	<div class="divTableRow">
	<div class="divTableCell"> <?php echo $apples[$i]->name ?> </div>
	<div class="divTableCell">	
		<button class='btn btn-success' onclick='eatApple(<?=$i+1;?>,10);'>Eat. Now(<?=$apples[$i]->eatenPercent ?>)</button>
	</div>
	</div>
<?php endfor; ?>
	
</div>