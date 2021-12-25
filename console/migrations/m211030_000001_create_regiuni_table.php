<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regiuni}}`.
 */
class m211030_000001_create_regiuni_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regiune}}', [
            'id' => $this->primaryKey(),
            'regiune_nume' => $this->string('100')->unique(),
            'regiune_status' => $this->tinyInteger(1)->defaultExpression(1),
            'regiune_created' => $this->dateTime()->defaultExpression('current_timestamp'),
            'regiune_updated' => $this->dateTime()->defaultExpression('current_timestamp'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%regiune}}');
    }
}
