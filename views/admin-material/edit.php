<h2><?=$m->id?'Редакирование':'Создание';?> материала </h2>

<?php 
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<?php $f=\yii\widgets\ActiveForm::begin();?>
<?=$f->field($m,'name');?>
<?=$f->field($m,'alias');?>
<?=$f->field($m,'status')->checkbox();?>
<?=$f->field($m,'anons')->textarea();?>
<?=$f->field($m,'body')->textarea(['rows'=>7]);?>
<?=Html::submitButton('Сохранить',['class'=>'btn btn-success']);?>
<?php \yii\widgets\ActiveForm::end();?>

