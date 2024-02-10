    <?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exam_user}}`.
 */
class m240130_103833_create_exam_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%exam_user}}', true) != null) {
            $this->dropTable('{{%exam_user}}');
        }

        $this->createTable('{{%exam_user}}', [

            'id' => $this->primaryKey(),

            'savollar_id' => $this->integer(11)->notNull(),
            'option_id' => $this->integer(11)->notNull(),

            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),

        ]);

        $this->addForeignKey(
            'exam_user_savollar_fk',
            'exam_user',
            'savollar_id',
            'savollar',
            'id'
        );

        $this->addForeignKey(
            'exam_user_option_fk',
            'exam_user',
            'option_id',
            'option',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exam_user}}');
    }
}
