<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exceptii}}`.
 */
class m211225_000006_create_exceptii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipuri_exceptie}}', [
            'id' => $this->primaryKey(),
            'te_exceptie_denumire' => $this->string(255)->notNull(),
            'te_exceptie_start' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'te_exceptie_end' => $this->dateTime()->null(),
            'te_exceptie_status' => $this->tinyInteger()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_exceptie}}');
    }
}
