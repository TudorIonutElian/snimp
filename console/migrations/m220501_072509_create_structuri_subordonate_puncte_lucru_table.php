<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%structuri_subordonate_puncte_lucru}}`.
 */
class m220501_072509_create_structuri_subordonate_puncte_lucru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%structuri_subordonate_puncte_lucru}}', [
            'id_sspl' => $this->primaryKey(),
            'minister_id_sspl' => $this->integer(11)->notNull(),
            'institutie_id_sspl' => $this->integer(11)->notNull(),
            'structura_subordonata_id_sspl' => $this->integer(11)->notNull(),
            'localitate_id_sspl' => $this->integer(11)->notNull(),
        ]);

        // add foreign key for table `institutie`
        $this->addForeignKey(
            'fk-sspl_minister_id',
            'structuri_subordonate_puncte_lucru',
            'minister_id_sspl',
            'minister',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `institutie`
        $this->addForeignKey(
            'fk-sspl_institutie_id',
            'structuri_subordonate_puncte_lucru',
            'institutie_id_sspl',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `structura subordonata`
        $this->addForeignKey(
            'fk-sspl_structura_subordonata_id',
            'structuri_subordonate_puncte_lucru',
            'structura_subordonata_id_sspl',
            'institutii_structuri_subordonate',
            'id_iss',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `localitate`
        $this->addForeignKey(
            'fk-sspl_localitate_id',
            'structuri_subordonate_puncte_lucru',
            'localitate_id_sspl',
            'localitate',
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
        $this->dropForeignKey('fk-sspl_minister_id', 'structuri_subordonate_puncte_lucru');
        $this->dropForeignKey('fk-sspl_institutie_id', 'structuri_subordonate_puncte_lucru');
        $this->dropForeignKey('fk-sspl_structura_subordonata_id', 'structuri_subordonate_puncte_lucru');
        $this->dropForeignKey('fk-sspl_localitate_id', 'structuri_subordonate_puncte_lucru');
        $this->dropTable('{{%structuri_subordonate_puncte_lucru}}');
    }
}
