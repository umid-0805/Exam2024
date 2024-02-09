<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%testlar}}`.
 */
class m231127_160347_create_testlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testlar}}', [
            'id' => $this->primaryKey(),
            'fanlar_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'question_count'=> $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
           
        ]);
            $this->addForeignKey(
                'testlar_fk_fanlar_id',
                'testlar',
                'fanlar_id',
                'fanlar',
                'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('testlar_fk_fanlar_id','{{%testlar}}');
        $this->dropTable('{{%testlar}}');
    }
}
