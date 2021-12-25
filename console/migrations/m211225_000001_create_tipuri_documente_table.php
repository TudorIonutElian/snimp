<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipuri_documente}}`.
 */
class m211225_000001_create_tipuri_documente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipuri_document}}', [
            'id' => $this->primaryKey(),
            'tip_document_denumire' => $this->string(255)->notNull(),
            'tip_document_adaugare' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'tip_document_radiere' => $this->dateTime()->null(),
            'tip_document_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_document}}');
    }
}
