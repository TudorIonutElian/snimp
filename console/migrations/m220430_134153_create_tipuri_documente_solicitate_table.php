<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipuri_documente_solicitate}}`.
 */
class m220430_134153_create_tipuri_documente_solicitate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipuri_documente_solicitate}}', [
            'id_tds'                    => $this->primaryKey(),
            'denumire_document_tds'     => $this->string(100),
        ]);

        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Carte identitate']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Certificat naștere']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Certificat căsătorie']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Certificat divorț']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Certificat fiscal']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Contract vânzare-cumpărare']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Contract închiriere']);
        $this->insert('tipuri_documente_solicitate', ['denumire_document_tds' => 'Dovada taxă document']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_documente_solicitate}}');
    }
}
