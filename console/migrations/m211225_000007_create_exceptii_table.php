<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exceptii}}`.
 */
class m211225_000007_create_exceptii_table extends Migration
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

        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Zi liberă']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Reorganizare']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Personal insuficient']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Personal dislocat']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Sistare temporară a a activității']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Vacanță instituțională']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Zonă carantinată']);
        $this->insert('tipuri_exceptie', ['te_exceptie_denumire' => 'Inventar instituțional']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_exceptie}}');
    }
}
