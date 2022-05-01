<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%structuri_subordonate_servicii}}`.
 */
class m220501_072049_create_structuri_subordonate_servicii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%structuri_subordonate_servicii}}', [
            'id_sss' => $this->primaryKey(),
            'institutie_id_sss' => $this->integer(11)->notNull(),
            'structura_subordonata_id_sss' => $this->integer(11)->notNull(),
            'serviciu_id_sss' => $this->integer(11)->notNull(),
            'localitate_id_sss' => $this->integer(11)->notNull(),
            'is_open_weekend_sss' => $this->tinyInteger(1)->defaultValue(0),
            'is_open_nonstop_sss' => $this->tinyInteger(1)->defaultValue(0),
            'is_active_sss' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        // add foreign key for table `institutie`
        $this->addForeignKey(
            'fk-sss_institutie_id',
            'structuri_subordonate_servicii',
            'institutie_id_sss',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `tipuri_serviciu`
        $this->addForeignKey(
            'fk-sss_serviciu_id',
            'structuri_subordonate_servicii',
            'serviciu_id_sss',
            'tipuri_serviciu',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `localitati`
        $this->addForeignKey(
            'fk-sss_localitate_id',
            'structuri_subordonate_servicii',
            'localitate_id_sss',
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
        $this->dropForeignKey('fk-sss_institutie_id', 'structuri_subordonate_servicii');
        $this->dropForeignKey('fk-sss_serviciu_id', 'structuri_subordonate_servicii');
        $this->dropForeignKey('fk-sss_localitate_id', 'structuri_subordonate_servicii');
        $this->dropTable('{{%structuri_subordonate_servicii}}');
    }
}
