<?php

use yii\db\Migration;

/**
 * Class m240213_065106_add_testlar_colum_date_and_start_time_and_end_time
 */
class m240213_065106_add_testlar_colum_date_and_start_time_and_end_time extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('testlar','question_count');
        $this->addColumn('testlar','date', $this->date()->after('name'));
        $this->addColumn('testlar','start_time', $this->time()->after('date'));
        $this->addColumn('testlar','end_time', $this->time()->after('start_time'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('testlar','question_count', $this->integer()->after('name'));
        $this->dropColumn('testlar', 'date');
        $this->dropColumn('testlar', 'start_time');
        $this->dropColumn('testlar', 'end_time');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240213_065106_add_testlar_colum_date_and_start_time_and_end_time cannot be reverted.\n";

        return false;
    }
    */
}
