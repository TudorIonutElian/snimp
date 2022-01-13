<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institutii_exceptii}}`.
 */
class m220112_163417_create_institutii_exceptii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institutii_exceptii}}', [
            'id' => $this->primaryKey(),
            'institutie_id' => $this->integer(11)->notNull(),
            'exceptie_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'fk_ie_institutie_exceptie',
            'institutii_exceptii',
            'institutie_id',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_ie_exceptie_id',
            'institutii_exceptii',
            'exceptie_id',
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
        $this->dropForeignKey('fk_ie_institutie_id', 'institutii_exceptii');
        $this->dropForeignKey('fk_ie_exceptie_id', 'institutii_exceptii');
        $this->dropTable('{{%institutii_exceptii}}');
    }
}
