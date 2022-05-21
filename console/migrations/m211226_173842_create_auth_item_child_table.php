<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_item_child}}`.
 */
class m211226_173842_create_auth_item_child_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string(64)->notNull(),
            'child' => $this->string(64)->notNull(),
        ]);


        $this->addPrimaryKey('pk_parent_child', 'auth_item_child', ['parent', 'child']);
        $this->addForeignKey('fk_aac_parent', 'auth_item_child', 'parent', 'auth_item', 'name', 'RESTRICT', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth_item_child}}');
    }
}
