<?php

use yii\db\Migration;

/**
 * Class m240201_131004_add_option_colum_option_table
 */
class m240201_131004_add_option_colum_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('option','is_deleted', $this->integer(1)->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240201_131004_add_option_colum_option_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240201_131004_add_option_colum_option_table cannot be reverted.\n";

        return false;
    }
    */
}
