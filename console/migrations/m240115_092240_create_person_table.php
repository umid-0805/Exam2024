<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%person}}`.
 */
class m240115_092240_create_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%person}}', [
            'id' => $this->primaryKey(),

            'user_id' => $this->integer(11)->notNull(),
            'lastName' => $this->string(255)->notNull(),
            'firstName' => $this->string(255)->notNull(),
            'phone' => $this->string(255)->null(),

            'update_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),

        ]);

        $this->addForeignKey(
            'personAndUser_frk',
            'person',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%person}}');
    }
}
