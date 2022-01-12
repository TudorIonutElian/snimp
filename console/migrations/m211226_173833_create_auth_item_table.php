<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_item}}`.
 */
class m211226_173833_create_auth_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(64),
            'type' => $this->integer()->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(64),
            'data' => $this->text(),
            'created_at' => $this->integer()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->integer()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('pk_aa_name', 'auth_item', 'name');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth_item}}');
    }
}
