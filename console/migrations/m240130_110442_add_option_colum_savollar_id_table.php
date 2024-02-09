<?php

use yii\db\Migration;

/**
 * Class m240130_110442_add_option_colum_savollar_id_table
 */
class m240130_110442_add_option_colum_savollar_id_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
          $this->addColumn('option', 'savollar_id',  $this->integer(11)->notNull()->after('name'));

          $this->addForeignKey(
              'option_savollar_fk',
              'option',
              'savollar_id',
              'savollar',
              'id'
          );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240130_110442_add_option_colum_savollar_id_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240130_110442_add_option_colum_savollar_id_table cannot be reverted.\n";

        return false;
    }
    */
}
