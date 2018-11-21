<?php 

namespace app\components;

class AppFormatter extends \yii\i18n\Formatter
{
	/**
	 * форматирование статуса активен/неактивен
	 * @param boolean $val форматируемое значение 
	 * @return string  строка отформаиированная 
	 */
	public function asActiveStatus($val)
	{
		return $val?'Активный':'Заблокирован';
	}
}
?>