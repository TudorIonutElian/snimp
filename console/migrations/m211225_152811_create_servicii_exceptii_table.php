<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servicii_exceptii}}`.
 */
class m211225_152811_create_servicii_exceptii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%serviciu_exceptie}}', [
            'id' => $this->primaryKey(),
            'se_serviciu' => $this->integer(11)->notNull(),
            'se_exceptie' => $this->integer(11)->notNull(),
            'se_mesaj_public' => $this->text()->notNull(),
            'se_serviciu_start_exceptie' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'se_serviciu_end_exceptie' => $this->dateTime()->null(),
            'se_serviciu_added_by' => $this->integer(11),
            'se_serviciu_active' => $this->tinyInteger(1)->defaultValue(0),
        ]);

        // add foreign key for table `serviciu`
        $this->addForeignKey(
            'fk-se_serviciu_id',
            'serviciu_exceptie',
            'se_serviciu',
            'tipuri_serviciu',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `serviciu`
        $this->addForeignKey(
            'fk-se_exceptie_id',
            'serviciu_exceptie',
            'se_exceptie',
            'tipuri_exceptie',
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
        $this->dropForeignKey('fk-se_serviciu_id', 'serviciu_exceptie');
        $this->dropForeignKey('fk-se_exceptie_id', 'serviciu_exceptie');
        $this->dropTable('{{%serviciu_exceptie}}');
    }
}
