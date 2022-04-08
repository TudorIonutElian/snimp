<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%programari}}`.
 */
class m211225_153115_create_programari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%programare}}', [
            'id' => $this->primaryKey(),
            'programare_minister' => $this->integer(11)->notNull(),
            'programare_institutie' => $this->integer(11)->notNull(),
            'programare_serviciu' => $this->integer(11)->notNull(),
            'programare_localitate' => $this->integer(11)->notNull(),
            'programare_user' => $this->integer(11)->null(),
            'programare_datetime' => $this->dateTime()->notNull(),
            'programare_validata_de' => $this->integer(11)->null(),
            'programare_numar_unic' => $this->string(10)->null(),
            'programare_data_numar_unic' => $this->date()->null(),
            'programare_data_finalizare' => $this->tinyInteger(1)->defaultValue(0),
            'programare_document_solicitat' => $this->integer(11)->null(),
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

        // add foreign key for table `institutie_serviciu`
        $this->addForeignKey(
            'fk-programare_serviciu_id',
            'programare',
            'programare_serviciu',
            'institutii_servicii',
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
        $this->dropTable('{{%programare}}');
    }
}
