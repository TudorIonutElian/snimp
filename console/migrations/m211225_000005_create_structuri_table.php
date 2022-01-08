<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%structuri}}`.
 */
class m211225_000005_create_structuri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%structura}}', [
            'id' => $this->primaryKey(),
            'structura_nume' => $this->string(255),
            'structura_start_date' => $this->date()->defaultExpression('CURRENT_TIMESTAMP'),
            'structura_end_date' => $this->date()->null(),
            'structura_status' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        $this->insert('structura', ['structura_nume' => 'Învățământ']);
        $this->insert('structura', ['structura_nume' => 'Sănătate și asistență socială']);
        $this->insert('structura', ['structura_nume' => 'Cultură']);
        $this->insert('structura', ['structura_nume' => 'Diplomație']);
        $this->insert('structura', ['structura_nume' => 'Justiție']);
        $this->insert('structura', ['structura_nume' => 'Apărare, Ordine Publică și Siguranță Națională']);
        $this->insert('structura', ['structura_nume' => 'Administrație']);
        $this->insert('structura', ['structura_nume' => 'Financiar']);
        $this->insert('structura', ['structura_nume' => 'Taxe și impozite']);
        $this->insert('structura', ['structura_nume' => 'Evidența populației']);
        $this->insert('structura', ['structura_nume' => 'Evidența auto']);
        $this->insert('structura', ['structura_nume' => 'Stare civilă']);
        $this->insert('structura', ['structura_nume' => 'Agricultură']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%structura}}');
    }
}
