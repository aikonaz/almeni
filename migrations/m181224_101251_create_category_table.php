<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m181224_101251_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(10)->notNull(),
            'name' => $this->varchar(255),
            'keywords' => $this->varchar(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
