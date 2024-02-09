<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%savollar}}`.
 */
class m231127_160452_create_savollar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%savollar}}', [
            'id' => $this->primaryKey(),

            'question' => $this->string(),
            'success_answer'=> $this->tinyInteger(1)->notNull()->defaultValue(0),
            'fan_id'=> $this->integer(),


            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),

        ]);

        $this->addForeignKey(
            'savollar_fk_fan_id',
            'savollar',
            'fan_id',
            'fanlar',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('testlar_fk_fanlar_id','{{%savollar}}');
        $this->dropTable('{{%savollar}}');

        return false;
    }
}