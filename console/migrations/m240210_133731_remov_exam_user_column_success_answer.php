<?php

use yii\db\Migration;

/**
 * Class m240210_133731_remov_exam_user_column_success_answer
 */
class m240210_133731_remov_exam_user_column_success_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('exam_user', 'success_answer');
        $this->addColumn('exam_user','is_deleted', $this->integer(1)->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('exam_user','success_answer', $this->integer(55)->after('status'));
        $this->dropColumn('exam_user', 'is_deleted');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240210_133731_remov_exam_user_column_success_answer cannot be reverted.\n";

        return false;
    }
    */
}
