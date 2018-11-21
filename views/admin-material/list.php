<h2>Список материалов</h2>

<?php 
use \yii\helpers\Html;
use \yii\grid\GridView;
?>

<?=Html::a('Новый материал',['admin-material/edit']);?>


<?=GridView::widget([
	'dataProvider'=>$p,
	'columns'=>[
		'id',['attribute'=>'name','content'=>function($model){return Html::a($model->name,['admin-material/edit','id'=>$model->id]);}],'created','status:activestatus',
	],
	]);?>