<?php 

namespace app\models;

/**
 * моделька материала ... 
 * 
 * @property int $id  ключик
 * @property string $name Наименование материала ..
 * @property boolean $status Статус материала
 * @property date $created Дата создания материала
 * @property string $anons Описание
 * @property string $body Контент
 * @property string $alias Алиас ЧПУ
 * */
       

class MaterialModel extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'meterials';
	}

	public function init()
	{
		$this->status=true;
	}

	public function rules()
	{
		return [
			[['name','body','alias'],'required'],
			['id','integer'],
			['name','string','max'=>150],
			['alias','string','max'=>100],
			['status','boolean'],
			['anons','safe'],
			['alias','uniquealias'],

		];
	}

	/**
	 * уникальность алиасов ..
	 */
	public function uniquealias($attr,$params)
	{
		if (static::find()->where(['and',['=','alias',$this->alias],['!=','id',$this->id]])->count())
			$this->addError($attr,'Алиас уже есть в базе');
	}
	
	 
	public function attributeLabels()
	{
		return [
			'name'=>'Заголовок',
			'alias'=>'ЧПУ',
			'status'=>'Активен',
			'anons'=>'Краткое описание',
			'body'=>'Контент',
			'created'=>'Создан',
			'id'=>'№',
		];
	}

	public function beforeSave($ins)
	{
		if (!parent::beforeSave($ins))
			return false;

		if ($ins)
			$this->created=date('c');
		$this->alias=\URLify::filter($this->alias,100);


		return true;
	}

	/**
	 * сохранение содержимого ..
	 */
	public function saving($data)
	{
		if(!$this->load($data) || !$this->validate() || !$this->save())
			return false;

		return true;
	}

	/**
	 * список отображаемых материалов .. 
	 * 
	 */
	public static function list()
	{
		return static::find()->where(['status'=>true]);
	}

	/**
	 * поискать материал по алиасу .. 
	 */
	public static function findMaterialByAlias($alias)
	{
		return static::find()->where(['status'=>true,'alias'=>$alias])->limit(1)->one();
	}
}