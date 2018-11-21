<?php 
use \yii\helpers\Html;
?>
<h4><?=Html::a(Html::encode($model->name),['material/view','alias'=>$model->alias]);?></h4>
<div><?=$model->anons;?></div>