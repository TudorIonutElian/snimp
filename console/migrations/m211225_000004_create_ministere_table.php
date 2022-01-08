<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%minister}}`.
 */
class m211225_000004_create_ministere_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%minister}}', [
            'id' => $this->primaryKey(),
            'minister_denumire' => $this->string(150),
            'minister_localitate' => $this->integer(11),
            'minister_adresa' => $this->string(255)->null(),
            'minister_created_at' => $this->integer(11)->defaultExpression('CURRENT_TIMESTAMP'),
            'minister_updated_at' => $this->integer(11)->defaultExpression('CURRENT_TIMESTAMP'),
            'minister_status' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        // add foreign key for table `localitate`
        $this->addForeignKey(
            'fk-minister-localitate-id',
            'minister',
            'minister_localitate',
            'localitate',
            'id',
            'RESTRICT',
            'CASCADE'
        );


        $this->insert('minister', ['minister_denumire'  => 'Ministerul Transporturilor și Infrastructurii']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Finanțelor']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Afacerilor Interne']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Afacerilor Externe']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Justiției']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Apărării Naționale']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Economiei']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Energiei']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Agriculturii și Dezvoltării Rurale']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Mediului, Apelor și Pădurilor']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Dezvoltării, Lucrărilor Publice și Administrației']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Investițiilor și Proiectelor Europene']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Muncii Și Solidarității Sociale']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Sănătății']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Educației']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Antreprenoriatului și Turismului']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Cercetării, Inovării și Digitalizării']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Familiei, Tineretului și Egalității de Șanse']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Culturii']);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Sportului']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-minister-localitate-id', 'minister');
        $this->dropTable('{{%ministere}}');
    }
}
