<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ministere_servicii}}`.
 */
class m220124_091702_create_ministere_servicii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ministere_servicii}}', [
            'id' => $this->primaryKey(),
            'minister_id' => $this->integer(11)->notNull(),
            'tip_serviciu_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'fk_minister_serviciu_mid',
            'ministere_servicii',
            'minister_id',
            'minister',
            'id',
            'RESTRICT',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_minister_serviciu_sid',
            'ministere_servicii',
            'tip_serviciu_id',
            'tipuri_serviciu',
            'id',
            'RESTRICT',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_minister_serviciu_mid', 'ministere_servicii');
        $this->dropForeignKey('fk_minister_serviciu_sid', 'ministere_servicii');
        $this->dropTable('{{%ministere_servicii}}');
    }
}
