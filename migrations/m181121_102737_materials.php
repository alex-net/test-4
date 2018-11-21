<?php

use yii\db\Migration;

/**
 * Class m181121_102737_materials
 */
class m181121_102737_materials extends Migration
{
   
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('meterials',[
            'id'=>$this->primaryKey()->comment('Ключик'),
            'name'=>$this->string(150)->comment('Наименование'),
            'status'=>$this->boolean()->comment('Статус'),
            'created'=>$this->dateTime()->comment('Дата создания'),
            'anons'=>$this->text()->comment('Описание'),
            'body'=>$this->text()->comment('Контент'),
            'alias'=>$this->string(100),
        ]);
    }

    public function down()
    {
        //echo "m181121_102737_materials cannot be reverted.\n";
        $this->dropTable('meterials');

        //return false;
    }
    
}
