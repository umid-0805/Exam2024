<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fanlar}}`.
 */
class m231127_160240_create_fanlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->createTable('{{%fanlar}}', [


            'id' => $this->primaryKey(),

            'name' => $this->string(),

            'update_at' =>   $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'create_at' =>   $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
           
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fanlar}}');
    }
}
