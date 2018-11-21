<?php 

namespace app\controllers;

use Yii;
use \app\models\MaterialModel;

/**
 * отвечает за администрирование материалов... 
 */
class AdminMaterialController extends \yii\web\Controller
{
	public function behaviors()
	{
		return [
			'access'=>[
				'class'=>\yii\filters\AccessControl::class,
				'rules'=>[
					['roles'=>['@'],'allow'=>true],
				],
			],
		];
	}
	/**
	 * список материалов ..  
	 * @return Response  ответ от сервера ... 
	 */
	public function actionList()
	{
		$p=new \yii\data\ActiveDataProvider([
			'query'=>MaterialModel::find(),
			'sort'=>[
				'defaultOrder'=>['status'=>SORT_DESC],
			],
		]);
		return $this->render('list',['p'=>$p]);
	}

	/**
	 * добавить/редактировать материал ..
	 *
	 * @param integer $id ключик сущности
	 */
	public function actionEdit($id=0)
	{
		$m=MaterialModel::findOne($id);
		if (!$m)
			$m=new MaterialModel();

		if (Yii::$app->request->isPost && $m->saving(Yii::$app->request->post()))
			return $this->redirect(['admin-material/list']);

		return $this->render('edit',['m'=>$m]);
	}
}