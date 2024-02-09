<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%option}}`.
 */
class m240115_152039_create_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%option}}', [
            'id' => $this->primaryKey(),
            'savol_id'=>$this->integer(),
            'name' => $this->string(),
            'option'=>$this->string(),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%option}}');
    }


}
