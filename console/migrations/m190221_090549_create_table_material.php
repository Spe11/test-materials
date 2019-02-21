<?php

use yii\db\Migration;

/**
 * Class m190221_090549_create_table_material
 */
class m190221_090549_create_table_material extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%material}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'type_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%material}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_090549_create_table_material cannot be reverted.\n";

        return false;
    }
    */
}
