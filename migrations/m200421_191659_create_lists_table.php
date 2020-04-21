<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lists}}`.
 */
class m200421_191659_create_lists_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lists}}', [
            'id' => $this->primaryKey(),
            'name'  => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lists}}');
    }
}
