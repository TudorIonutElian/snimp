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


        $this->insert('minister', ['minister_denumire'  => 'Ministerul Transporturilor și Infrastructurii', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Finanțelor', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Afacerilor Interne', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Afacerilor Externe', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Justiției', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Apărării Naționale', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Economiei', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Energiei', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Agriculturii și Dezvoltării Rurale', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Mediului, Apelor și Pădurilor', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Dezvoltării, Lucrărilor Publice și Administrației', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Investițiilor și Proiectelor Europene', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Muncii Și Solidarității Sociale', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Sănătății', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Educației', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Antreprenoriatului și Turismului', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Cercetării, Inovării și Digitalizării', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Familiei, Tineretului și Egalității de Șanse', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Culturii', 'minister_localitate' => 13802]);
        $this->insert('minister', ['minister_denumire'  => 'Ministerul Sportului', 'minister_localitate' => 13802]);

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
