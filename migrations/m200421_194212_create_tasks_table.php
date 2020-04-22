<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m200421_194212_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'listId' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'goal' => $this->integer()->notNull()->unsigned(),
        ]);

        $this->addForeignKey(
            'fk-tasks-listId',
            'tasks',
            'listId',
            'lists',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
