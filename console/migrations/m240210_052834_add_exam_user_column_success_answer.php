<?php

use yii\db\Migration;

/**
 * Class m240210_052834_add_exam_user_column_success_answer
 */
class m240210_052834_add_exam_user_column_success_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('exam_user','success_answer', $this->integer(55)->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('exam_user', 'success_answer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240210_052834_add_exam_user_column_success_answer cannot be reverted.\n";

        return false;
    }
    */
}
