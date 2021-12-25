<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%documente_emise}}`.
 */
class m211225_000002_create_documente_emise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document_emis}}', [
            'id' => $this->primaryKey(),
            'document_tip' => $this->integer('11')->notNull(),
            'document_user_id' => $this->integer('11')->notNull(),
            'document_daca_emitere' => $this->date()->defaultExpression('CURRENT_TIMESTAMP'),
            'document_data_expirare' => $this->date()->null(),
            'document_preluat' => $this->tinyInteger(1)->null()->defaultValue(0),
            'document_retras' => $this->tinyInteger(1)->null()->defaultValue(0),
            'document_status' => $this->tinyInteger(1)->null()->defaultValue(0),
        ]);

        // add foreign key for table `tipuri_documente`
        $this->addForeignKey(
            'fk-document-tip_id',
            'document_emis',
            'document_tip',
            'tipuri_document',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-document-tip_id', 'document_emis');
        $this->dropTable('{{%document_emis}}');
    }
}
