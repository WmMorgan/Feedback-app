<?php

use yii\db\Migration;

/**
 * Class m230425_121929_add_rights_column_to_user
 */
class m230425_121929_add_rights_column_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'rights', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('{{%user}}', 'rights');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230425_121929_add_rights_column_to_user cannot be reverted.\n";

        return false;
    }
    */
}
