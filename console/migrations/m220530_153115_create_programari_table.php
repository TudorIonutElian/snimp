<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%programari}}`.
 */
class m220530_153115_create_programari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%programare}}', [
            'id' => $this->primaryKey(),
            'programare_localitate' => $this->integer(11)->notNull(),
            'programare_minister' => $this->integer(11)->notNull(),
            'programare_institutie' => $this->integer(11)->notNull(),
            'programare_structura_subordonata' => $this->integer(11)->null(),
            'programare_serviciu' => $this->integer(11)->notNull(),
            'programare_prestare' => $this->integer(11)->notNull(),
            'programare_punct_lucru' => $this->integer(11)->null(),
            'programare_datetime' => $this->dateTime()->notNull(),
            'programare_email' => $this->string(255)->notNull(),
            'programare_nume' => $this->string(255)->notNull(),
            'programare_prenume' => $this->string(255)->notNull(),
            'programare_user' => $this->integer(11)->null(),
            'programare_validata_de' => $this->integer(11)->null(),
            'programare_numar_unic' => $this->string(10)->null(),
            'programare_data_numar_unic' => $this->date()->null(),
            'programare_data_finalizare' => $this->tinyInteger(1)->defaultValue(0),
            'programare_document_solicitat' => $this->integer(11)->null(),
            'programare_este_anulata' => $this->tinyInteger(1)->defaultValue(0),
            'programare_lucrator' => $this->integer(11)->null()
        ]);

        // add foreign key for table `minister`
        $this->addForeignKey(
            'fk-programare_minister_id',
            'programare',
            'programare_minister',
            'minister',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `institutie`
        $this->addForeignKey(
            'fk-programare_institutie_id',
            'programare',
            'programare_institutie',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `structura_subordonata`
        $this->addForeignKey(
            'fk-programare_structuraSubordonata_id',
            'programare',
            'programare_structura_subordonata',
            'institutii_structuri_subordonate',
            'id_iss',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `puncte lucru`
        $this->addForeignKey(
            'fk-programare_punctLucru_id',
            'programare',
            'programare_punct_lucru',
            'structuri_subordonate_puncte_lucru',
            'id_sspl',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `prestari`
        $this->addForeignKey(
            'fk-programare_prestari_id',
            'programare',
            'programare_prestare',
            'prestari',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `institutie_serviciu`
        $this->addForeignKey(
            'fk-programare_serviciu_id',
            'programare',
            'programare_serviciu',
            'tipuri_serviciu',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `institutie_serviciu`
        $this->addForeignKey(
            'fk-programare_localitate_id',
            'programare',
            'programare_localitate',
            'localitate',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `institutie_serviciu`
        $this->addForeignKey(
            'fk-programare_document',
            'programare',
            'programare_document_solicitat',
            'tipuri_document',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `programare_lucrator`
        $this->addForeignKey(
            'fk-programare_lucrator',
            'programare',
            'programare_lucrator',
            'user',
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
        $this->dropForeignKey('fk-programare_institutie_id', 'programare');
        $this->dropForeignKey('fk-programare_serviciu_id', 'programare');
        $this->dropForeignKey('fk-programare_localitate_id', 'programare');
        $this->dropForeignKey('fk-programare_document', 'programare');
        $this->dropForeignKey('fk-programare_lucrator', 'programare');
        $this->dropTable('{{%programare}}');
    }
}
