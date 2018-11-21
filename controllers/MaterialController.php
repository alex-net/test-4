<?php 

namespace app\controllers;


use app\models\MaterialModel;

class MaterialController extends \yii\web\Controller
{

	/**
	 * просмотр списка материалов .. 
	 * @return string ендер строка .. 
	 */
	public function actionList()
	{
		$p=new \yii\data\ActiveDataProvider([
			'query'=>MaterialModel::list(),
		]);
		return $this->render('list',['p'=>$p]);
	}

	/**
	 * просмотр одного материала 
	 */
	
	public function actionView($alias)
	{
		$m=MaterialModel::findMaterialByAlias($alias);
		if (!$m)
			throw new \yii\web\HttpException(404,'Страница не найдена');
		return $this->render('m-full',['m'=>$m]);
	}


}