<?php

use yii\db\Migration;

/**
 * Class m240130_110143_remove_option_colum_savol_id_table
 */
class m240130_110143_remove_option_colum_savol_id_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('option', 'savol_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240130_110143_remove_option_colum_savol_id_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240130_110143_remove_option_colum_savol_id_table cannot be reverted.\n";

        return false;
    }
    */
}
