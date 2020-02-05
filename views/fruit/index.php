<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);

$this->title = 'fruits';

if (Yii::$app->user->isGuest) {
	echo "Please login to see this page:)";
	return;
}
?>


<div>

<?php 
	for ($i = 0; $i < count($apples); $i++) {
		echo "<br>".$apples[$i]->name."<br>"."<button>Есть</button>";
	}
?>
	
</div>