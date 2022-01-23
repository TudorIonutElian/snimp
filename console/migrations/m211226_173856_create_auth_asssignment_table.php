<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_asssignment}}`.
 */
class m211226_173856_create_auth_asssignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('pk_item_user', 'auth_assignment', ['item_name', 'user_id']);

        $this->addForeignKey(
            'fk_auth_user',
            'auth_assignment',
            'user_id',
            'user',
            'id',
            'RESTRICT',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_aa_item',
            'auth_assignment',
            'item_name',
            'auth_item',
            'name',
            'RESTRICT',
            'RESTRICT'
        );

        $this->insert('auth_assignment', [
           'item_name' => 'admin',
           'user_id' => 1
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 2
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 3
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 4
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 5
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 6
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 7
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 8
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 9
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 10
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 11
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 12
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 13
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 14
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 15
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 16
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 17
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 18
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 19
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 20
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 21
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_aa_item', 'auth_assignment');
        $this->dropForeignKey('fk_auth_user', 'auth_assignment');
        $this->dropTable('{{%auth_asssignment}}');
    }
}
