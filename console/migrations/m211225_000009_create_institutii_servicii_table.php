<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institutie_serviciu}}`.
 */
class m211225_000009_create_institutii_servicii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institutii_servicii}}', [
            'id' => $this->primaryKey(),
            'is_institutie' => $this->integer(11)->notNull(),
            'is_serviciu' => $this->integer(11)->notNull(),
            'is_localitate' => $this->integer(11)->notNull(),
            'is_open_weekend' => $this->tinyInteger(1)->defaultValue(0),
            'is_open_nonstop' => $this->tinyInteger(1)->defaultValue(0),
            'is_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        // add foreign key for table `institutie`
        $this->addForeignKey(
            'fk-is_institutie_id',
            'institutii_servicii',
            'is_institutie',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `tipuri_serviciu`
        $this->addForeignKey(
            'fk-is_serviciu_id',
            'institutii_servicii',
            'is_serviciu',
            'tipuri_serviciu',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `localitati`
        $this->addForeignKey(
            'fk-is_localitate_id',
            'institutii_servicii',
            'is_localitate',
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
        $this->dropForeignKey('fk-is_institutie_id', 'institutii_servicii');
        $this->dropForeignKey('fk-is_serviciu_id', 'tipuri_serviciu');
        $this->dropForeignKey('fk-is_localitate_id', 'tipuri_serviciu');
        $this->dropTable('{{%institutii_servicii}}');
    }
}
