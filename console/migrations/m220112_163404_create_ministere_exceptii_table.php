<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ministere_exceptii}}`.
 */
class m220112_163404_create_ministere_exceptii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ministere_exceptii}}', [
            'id' => $this->primaryKey(),
            'minister_id' => $this->integer(11)->notNull(),
            'exceptie_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'fk_me_minister_exceptie',
            'ministere_exceptii',
            'minister_id',
            'minister',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_me_exceptie_id',
            'ministere_exceptii',
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
        $this->dropForeignKey('fk_me_exceptie_id', 'ministere_exceptii');
        $this->dropForeignKey('fk_me_minister_exceptie', 'ministere_exceptii');
        $this->dropTable('{{%ministere_exceptii}}');
    }
}
