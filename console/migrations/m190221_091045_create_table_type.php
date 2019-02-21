<?php

use yii\db\Migration;

/**
 * Class m190221_091045_create_table_type
 */
class m190221_091045_create_table_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_091045_create_table_type cannot be reverted.\n";

        return false;
    }
    */
}
