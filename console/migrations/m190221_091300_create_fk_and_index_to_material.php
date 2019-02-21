<?php

use yii\db\Migration;

/**
 * Class m190221_091300_create_fk_and_index_to_material
 */
class m190221_091300_create_fk_and_index_to_material extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-material-type_id',
            'material',
            'type_id'
        );

        $this->addForeignKey(
            'fk-material-type_id',
            'material',
            'type_id',
            'type',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-material-type_id',
            'material'
        );

        $this->dropIndex(
            'idx-material-type_id',
            'material'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_091300_create_fk_and_index_to_material cannot be reverted.\n";

        return false;
    }
    */
}
