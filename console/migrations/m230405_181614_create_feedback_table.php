<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 */
class m230405_181614_create_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'phone' => $this->string(15)->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback}}');
    }
}
